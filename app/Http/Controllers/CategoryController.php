<?php

namespace App\Http\Controllers;

use App\Entity\Banner;
use App\Entity\Blog\Post;
use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Shop\CategoryBrand;
use App\Entity\Shop\Characteristic;
use App\Entity\Shop\CharacteristicCategory;
use App\Entity\Shop\Modification;
use App\Entity\Shop\Product;
use App\Entity\Shop\ProductCategory;
use App\Entity\Store;
use App\Entity\StoreCategory;
use App\Helpers\LanguageHelper;
use App\Http\Router\ProductsPath;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $rootCategories = Category::where(['parent_id' => null])->get();

        $brands = Brand::all();
        $stores = Store::all();


        return view('catalog.catalog-section', compact('rootCategories', 'brands', 'stores'));
    }

    public function show(Request $request, ProductsPath $path)
    {
        $category = $path->category;

        if (!$category->children) {
            return $this->childCategoryShow($request, $category);
        }

        return $this->parentCategoryShow($request, $category);
    }

    private function parentCategoryShow(Request $request, Category $category)
    {
        $children = $category->children()->get()->toTree();

        $posts = Post::where('category_id', $category->id)->published()->orderByDesc('updated_by')->get();
        $banners = Banner::where('category_id', $category->id)->published()->orderByDesc('updated_by')->get();
        $banner = $banners->isNotEmpty() ? $banners->random() : null;
        unset($banners);

        return view('catalog.catalog-section', compact('category', 'children', 'posts', 'banner'));
    }

    private function childCategoryShow(Request $request, Category $category)
    {
        $categoryIds = array_merge($category->descendants()->pluck('id')->toArray(), [$category->id]);
        $brandIds = CategoryBrand::whereIn('category_id', $categoryIds)->get()->pluck('brand_id')->toArray();
        $storeIds = StoreCategory::whereIn('category_id', $categoryIds)->get()->pluck('store_id')->toArray();
        $characteristicIds = CharacteristicCategory::whereIn('category_id', $categoryIds)
            ->distinct()->get()->pluck('characteristic_id')->toArray();

        $brands = Brand::whereIn('id', $brandIds)->get();
        $stores = Store::whereIn('id', $storeIds)->get();
        $modifications = Modification::with(['characteristic'])->select(['shop_modifications.*', 'c.*'])
            ->leftJoin('shop_characteristics as c', 'shop_modifications.characteristic_id', '=', 'c.id')
            ->whereNotNull('shop_modifications.characteristic_id')
            ->whereIn('c.id', $characteristicIds)->where('c.hide_in_filters', false)
            ->orderBy('shop_modifications.characteristic_id')->orderBy('shop_modifications.value')->get();

        if ($modifications->isNotEmpty()) {
            $tempModifications = [];
            $modId = $modifications[0]->characteristic_id;
            $i = 0;
            foreach ($modifications as $modification) {
                if ($modId === $modification->characteristic_id) {
                    $tempModifications[$i][] = $modification;
                } else {
                    $modId = $modification->characteristic_id;
                    $tempModifications[++$i][] = $modification;
                }
            }
            $groupModifications = $tempModifications;
            unset($tempModifications);
        } else {
            $groupModifications = null;
        }
        unset($modifications);

        $query = Product::with(['mainValues'])->where(['status' => Product::STATUS_ACTIVE])->whereIn('main_category_id', $categoryIds);

        if (!empty($value = $request->get('brands'))) {
            $value = explode(',', $value);
            $brandIds = Brand::whereIn('slug', $value)->get()->pluck('id')->toArray();
            $query->whereIn('brand_id', $brandIds);
        }

        if (!empty($value = $request->get('stores'))) {
            $value = explode(',', $value);
            $storeIds = Store::whereIn('slug', $value)->get()->pluck('id')->toArray();
            $query->whereIn('store_id', $storeIds);
        }

        if (!empty($value = $request->get('min_price'))) {
            $query->where('price_uzs', '>=', $value);
        }

        if (!empty($value = $request->get('max_price'))) {
            $query->where('price_uzs', '<=', $value);
        }

        if (!empty($values = $request->get('modification'))) {
            $productIds = [];
            foreach ($values as $i => $value) {
                $value = explode(',', $value);
                $productIds = array_merge($productIds, Modification::where('characteristic_id', $i)->whereIn('value', $value)->get()->pluck('product_id')->toArray());
            }
            $productIds = array_unique($productIds);
            if (!empty($productIds)) { $query->whereIn('id', $productIds); }
        }

        $price = $request->get('by-price');
        $rating = $request->get('by-rating');
        $newItems = $request->get('new-items');

        if (empty($price) && empty($rating) && empty($newItems)) {
            $query->orderByDesc('updated_at');
        }

        if (!empty($price)) {
            $sign = substr($price, 0);
            if ($sign === '+') {
                $query->orderBy('price_uzs');
            } else {
                $query->orderByDesc('price_uzs');
            }
        }

        if (!empty($rating)) {
            $sign = substr($rating, 0);
            if ($sign === '+') {
                $query->orderBy('rating');
            } else {
                $query->orderByDesc('rating');
            }
        }

        if (!empty($newItems)) {
            $query->orderByDesc('new');
        }

        $products = $query->paginate(20);

        return view('catalog.catalog', compact('category', 'products', 'brands', 'stores', 'groupModifications'));
    }
}
