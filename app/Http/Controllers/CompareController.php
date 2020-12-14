<?php

namespace App\Http\Controllers;

use App\Entity\Shop\Product;
use App\Http\Resources\Shop\CompareResource;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function check($id, $compare)
    {
        $compareProduct = Product::findOrFail($compare);
        $product = Product::findOrFail($id);
        if ($compareProduct->main_category_id === $product->main_category_id) {
            return "success";
        } else {
            return "error";
        }
    }

    public function show(Request $request)
    {
        if ($request->has('data')) {
            $data = explode(',', $request->get('data'));
            array_pop($data);
            return CompareResource::collection(Product::whereIn('id', $data)->get());
        }
        return false;
    }

    public function compare(Request $request)
    {

        if ($request->has('data') && !empty($request->get('data'))) {
            $data = explode(',', $request->get('data'));
            array_pop($data);
            if (count($data) > 1 && count($data) <=3 ){
                $products = Product::whereIn('id', $data)->get();
                foreach ($products as $i => $product) {
                    $ratings[$i] = [
                        'id' => $product->id,
                        'rating' => $product->rating,
                    ];
                }
                return view('compare.compare', compact('products', 'ratings'));
            }else{
                return redirect('/');
            }

        }
        return redirect('/');
    }

}
