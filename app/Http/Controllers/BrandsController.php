<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Helpers\BrandHelper;
use Illuminate\Http\Request;
use App\Entity\Brand;
use App\Entity\Shop\Product;

class BrandsController extends Controller
{
    public function brands(Request $request)
    {
        $brands = Brand::orderBy('name_en', 'asc');
        if ($value = $request->get('brand') == null) {
            $brands->get();
        }

        if (!empty($value = $request->get('brand-latin'))) {
            $brands->where(function ($query) use ($value) {
                $query->where('name_en', 'LIKE', $value . '%')
                    ->orWhere('name_uz', 'LIKE',$value . '%');
            });
        }

        if (!empty($value = $request->get('brand-cyrill'))) {
            $brands->where(function ($query) use ($value) {
                $query->where('name_ru', 'LIKE', $value . '%');
            });
        }

        $groupsEn = $brands->get()->reduce(function ($carry, $brand) {

            $first_letter = $brand['name_en'][0];

            if (!isset($carry[$first_letter])) {
                $carry[$first_letter] = [];
            }

            $carry[$first_letter][] = $brand;

            return $carry;
        }, []);

        $groupsRu = $brands->get()->reduce(function ($carry, $brand) {

            $first_letter = substr($brand['name_ru'],0,2);

            if (!isset($carry[$first_letter])) {
                $carry[$first_letter] = [];
            }

            $carry[$first_letter][] = $brand;

            return $carry;
        }, []);
        return view('brand.brands', compact('groupsEn','groupsRu'));
    }

    public function show(Brand $brand, Request $request, Category $category)
    {
        $query = Product::orderByDesc('created_at')->where('brand_id', $brand->id);
        if ($request->categoryName and $request->categoryName !== 'all'){
            $query = $query->where('main_category_id', $request->categoryName);
        }
        $product = $query->paginate(12); //paginate() {{$products->links()}} render qlish uchun kere.
        $products = $query->paginate(12); // boshqa payt, get() ni ishlatsayam boladi
        $productIds = $query->pluck('main_category_id')->toArray();



        $min_price = 0;
        $max_price = 1;

        $ratings = [];
        foreach ($products as $i => $product) {
            if ($min_price === 0) {
                $min_price = $product->price_uzs;
            } elseif ($min_price > $product->price_uzs) {
                $min_price = $product->price_uzs;
            } elseif ($max_price < $product->price_uzs) {
                $max_price = $product->price_uzs;
            }
            $ratings[$i] = [
                'id' => $product->id,
                'rating' => $product->rating,
            ];
        }
        $rootCategoryShow = true;
        $parentCategory = $category->parent()->get()->toTree();
        $categories = Category::whereIn('id', $productIds)->get();

        return view('brand.show', compact('product', 'products', 'ratings', 'min_price', 'max_price', 'brand', 'rootCategoryShow', 'parentCategory', 'categories'));
    }
}
