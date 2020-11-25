<?php

namespace App\Http\Controllers;

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

    public function show(Brand $brand)
    {
        $query = Product::orderByDesc('created_at')->where('brand_id', $brand->id);
        $product = $query->paginate(12); //paginate() {{$products->links()}} render qlish uchun kere.
        $products = $query->paginate(12); // boshqa payt, get() ni ishlatsayam boladi

        $ratings = [];
        foreach ($products as $i => $product) {
            $ratings[$i] = [
                'id' => $product->id,
                'rating' => $product->rating,
            ];
        }

        return view('brand.show', compact('product', 'products', 'ratings'));
    }
}
