<?php

namespace App\Http\Controllers;

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
        $categoryIds = array_merge($category->descendants()->pluck('id')->toArray(), [$category->id]);
        $brandIds = CategoryBrand::whereIn('category_id', $categoryIds)->pluck('brand_id')->toArray();
        $storeIds = StoreCategory::whereIn('category_id', $categoryIds)->pluck('store_id')->toArray();
        $characteristicIds = CharacteristicCategory::whereIn('category_id', $categoryIds)
            ->distinct()->pluck('characteristic_id')->toArray();

        $price = $request->get('by-price');
        $rating = $request->get('by-rating');
        $newItems = $request->get('new-items');

        $brands = Brand::whereIn('id', $brandIds)->get();
        $stores = Store::whereIn('id', $storeIds)->get();
        $modifications = Modification::select(['shop_modifications.*', 'c.name_' . LanguageHelper::getCurrentLanguagePrefix()])
            ->leftJoin('shop_characteristics as c', 'shop_modifications.characteristic_id', '=', 'c.id')
            ->whereNotNull('shop_modifications.characteristic_id')
            ->whereIn('c.id', $characteristicIds)->where('c.hide_in_filters', false)
            ->groupBy('shop_modifications.characteristic_id', 'shop_modifications.value',
                'shop_modifications.id', 'c.name_' . LanguageHelper::getCurrentLanguagePrefix())
            ->distinct()->orderBy('shop_modifications.value')->get();

//        if ($modifications->isNotEmpty()) {
//            $tempModifications = [];
//            $modId = $modifications[0]->id;
//            foreach ($modifications as $modification) {
//                if () {
//
//                }
//            }
//        }

        $query = Product::where(['status' => Product::STATUS_ACTIVE])->whereIn('main_category_id', $categoryIds);
//        $products = ProductCategory::whereIn('category_id', $categoryIds)->pluck('product_id')->toArray();
//        $query->whereIn('id', $products);

        if (!empty($value = $request->get('brands'))) {
            $value = explode(',', $value);
            $brandIds = Brand::whereIn('slug', $value)->pluck('id')->toArray();
            $query->whereIn('brand_id', $brandIds);
        }

        if (!empty($value = $request->get('stores'))) {
            $value = explode(',', $value);
            $storeIds = Store::whereIn('slug', $value)->pluck('id')->toArray();
            $query->whereIn('store_id', $storeIds);
        }

        if (!empty($value = $request->get('min_price'))) {
            $query->where('price_uzs', '>=', $value);
        }

        if (!empty($value = $request->get('max_price'))) {
            $query->where('price_uzs', '<=', $value);
        }

        if (empty($price) && empty($rating) && empty($newItems)) {
            $query->orderByDesc('updated_at');
        }

        if (!empty($price)) {
            $query->orderBy('price_uzs');
        }

        if (!empty($rating)) {
            $query->orderByDesc('rating');
        }

        if (!empty($newItems)) {
            $query->orderByDesc('new');
        }

        $products = $query->paginate(20);

        return view('catalog.catalog', compact('category', 'products', 'brands', 'stores', 'modifications'));
    }
}
