<?php

namespace App\Http\Controllers;

use App\Entity\Shop\Cart;
use App\Entity\Shop\Product;
use App\Helpers\ImageHelper;
use App\Http\Resources\Shop\CartResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CartController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();
        if ($user == null) {
//            dd($request->product_id);
            $products_id = preg_split("/\,/", $request->product_id);
            $products = Product::whereIn('id', $products_id)->get();
            $cart_product_count = count($products);
            $cart_product_weight = 0;
            $cart_product_discount = 0;
            $cart_product_total = 0;

            foreach ($products as $i => $product) {
                $cart_product_weight += $product->weight;
                $cart_product_total += $product->price_uzs;
                $cart_product_discount += $product->discount;
            }

            $cart_product_discount_amount = $cart_product_total * $cart_product_discount;
            $cart_product_total = $cart_product_total - $cart_product_discount_amount;

            return view('cart.cart', compact('products', 'cart_product_total',
                'cart_product_count', 'cart_product_weight', 'cart_product_discount', 'cart_product_discount_amount',
                'cart_product_id'));
        } else {

            $cart_product = Cart::where('user_id', $user->id)->get();

            $cart_product_id = [];
            foreach ($cart_product as $i => $product_id) {
                $cart_product_id[$i] = $product_id->product_id;
            }

            $products = Product::whereIn('id', $cart_product_id)->get();

            $cart_product_count = count($products);
            $cart_product_weight = 0;
            $cart_product_discount = 0;
            $cart_product_total = 0;

            foreach ($products as $i => $product) {
//            dd($product);
                $cart_product_weight += $product->weight;
                $cart_product_total += $product->price_uzs;
                $cart_product_discount += $product->discount;
            }

            $cart_product_discount_amount = $cart_product_total * $cart_product_discount;
            $cart_product_total = $cart_product_total - $cart_product_discount_amount;
//        dd($cart_product_id);

            return view('cart.cart', compact('products', 'cart_product_total',
                'cart_product_count', 'cart_product_weight', 'cart_product_discount', 'cart_product_discount_amount',
                'cart_product_id'));
        }
    }


    public function add(Request $request)
    {
        $user = Auth::user();
        if ($request->has('product_id') and $user !== null) {

            if (gettype($request->product_id) !== 'array') {
                $is_exsit = Cart::where('product_id', $request->product_id)->where('user_id', $user->id)->first();
                if ($is_exsit) {
                    return ['message' => 'exists'];
                } else {
                    $cart = $user->carts()->create([
                        'product_id' => $request->product_id,
                        'quantity' => $request->quantity ?? 1,
                    ]);
                }
            } else {
                $is_exsit = Cart::whereIn('product_id', $request->product_id)->where('user_id', $user->id)->first();
                if ($is_exsit) {
                    return ['message' => 'exists'];
                } else {
                    foreach ($request->product_id as $i => $product_id) {
                        $cart = $user->carts()->create([
                            'product_id' => $request->product_id[$i],
                            'quantity' => $request->quantity ?? 1,
                        ]);
                    }
                }
            }


            return ['message' => 'success'];;
        } else {
            return ['message' => 'error'];
        }

    }

    public function remove(Request $request)
    {
        $user = Auth::user();
        if ($request->has('product_id') and $user !== null) {
            if (gettype($request->product_id) !== 'array') {
                $cart_delete = Cart::where('product_id', $request->product_id)->where('user_id', $user->id)->delete();
                return ['data' => 'success'];
            } else {
                $cart_delete = Cart::whereIn('product_id', $request->product_id)->where('user_id', $user->id)->delete();
                return ['data' => 'success'];
            }
        } else {
            return ['data' => 'error'];
        }
    }


    public function showHeader(Request $request)
    {
        if ($user = Auth::user()) {
            $cartProducts = Cart::where('user_id', $user->id)->get();
            $productIds = [];

            foreach ($cartProducts as $i => $product_id) {
                $productIds[$i] = $product_id->product_id;
            };

            if (empty($productIds)) {
                return ['data' => 'error'];
            }

            return CartResource::collection(Product::whereIn('id', $productIds)->get());
        }

        if ($request->has('product_id')) {
            return CartResource::collection(Product::whereIn('id', $request->product_id)->get());
        }

        return ['data' => 'error'];
    }


}
