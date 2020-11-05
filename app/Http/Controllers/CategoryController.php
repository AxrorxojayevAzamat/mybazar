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
use App\Services\Manage\FilterService;

class CategoryController extends Controller
{

    private $filterService;

    public function __construct(FilterService $filterService) {
//        $this->middleware('auth');
        $this->filterService = $filterService;
    }

    public function index() {
        $rootCategories = Category::where(['parent_id' => null])->get();

        $brands = Brand::all();
        $stores = Store::all();


        return view('catalog.catalog-section', compact('rootCategories', 'brands', 'stores'));
    }

    public function show(Request $request, ProductsPath $path) {

        $category = $path->category;
        if (!$category->children->isEmpty()) {
            return $this->childCategoryShow($request, $category);
        }

        return $this->parentCategoryShow($request, $category);
    }

    private function parentCategoryShow(Request $request, Category $category) {
        $children = $category->children()->get()->toTree();

        $posts   = Post::where('category_id', $category->id)->published()->orderByDesc('updated_by')->get();
        $banners = Banner::where('category_id', $category->id)->published()->orderByDesc('updated_by')->get();
        $banner  = $banners->isNotEmpty() ? $banners->random() : null;
        unset($banners);

        return view('catalog.catalog-section', compact('category', 'children', 'posts', 'banner'));
    }

    private function childCategoryShow(Request $request, Category $category) {
        $categoryIds = array_merge($category->descendants()->pluck('id')->toArray(), [$category->id]);

        $brands             = $this->filterService->brandByCategoryId($categoryIds);
        $stores             = $this->filterService->storeByCategoryId($categoryIds);
        $groupModifications = $this->filterService->groupModificationByCategoryId($categoryIds);

        $query = $this->filterService->productByCategoryId($categoryIds, $request);

        $products  = $query->paginate(20);
        $min_price = Product::select('price_uzs')->min('price_uzs');
        $max_price = Product::select('price_uzs')->max('price_uzs');

        return view('catalog.catalog', compact('category', 'products', 'brands', 'stores', 'groupModifications', 'min_price', 'max_price'));
    }

}
