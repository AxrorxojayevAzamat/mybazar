<?php

namespace App\Http\Controllers;


use App\Entity\Shop\Product;
use App\Entity\Shop\Value;
use App\Http\Requests\Products\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class ProductController extends Controller
{

    private $times = [
        7 * 24 * 3600,
        15 * 24 * 3600,
        30 * 24 * 3600,
    ];

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function show(Product $product)
    {
        $user = $product->createdBy;

        $otherProducts = Product::where('created_by', $user->id)->active()
            ->orderByDesc('created_at')->limit(10)->get();

        $similarProducts = Product::where('main_category_id', $product->main_category_id)->active()
            ->limit(10)->get();

        $index = 0;
        $length = count($this->times);
        $interestingProducts = null;
        while ($index < $length) {
            $query = Product::where('created_at', '>=', date('Y-m-d H:i:s', time() - $this->times[$index]));
            if ($query->exists()) {
                $interestingProducts = $query->active()->orderByDesc('rating')->orderByDesc('created_at')->limit(10)->get();
                break;
            }
            $index++;
        }

        return view('products.show', compact('product', 'otherProducts', 'similarProducts', 'interestingProducts'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');
//        dd($product->mainPhoto->file);

        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price_uzs,
                    "photo" => $product->mainPhoto->file
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price_uzs,
            "photo" => $product->mainPhoto->file
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function addReview(ReviewRequest $request, Product $product)
    {
        $numberOfReviews = $product->number_of_reviews;
        $ratingSum = ($product->rating ?? 0) * $numberOfReviews;
        $ratingSum += $request->rating;
        $numberOfReviews++;
        $totalRating = $ratingSum / $numberOfReviews;

        DB::beginTransaction();
        try {
            $product->reviews()->create([
                'rating' => $request->rating,
                'advantages' => $request->advantages,
                'disadvantages' => $request->disadvantages,
                'comment' => $request->comment,
            ]);

            $product->update([
                'rating' => $totalRating,
                'number_of_reviews' => $numberOfReviews,
            ]);

            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function compare(Product $product, Product $comparingProduct)
    {
        if ($product->main_category_id !== $comparingProduct->main_category_id) {
            abort(404);
            throw new \Exception('Products are not the same type!!!');
        }

        $values = Value::select(['shop_values.*', 'c.*', 'cg.*'])
            ->leftJoin('shop_characteristics as c', 'shop_values.characteristic_id', '=', 'c.id')
            ->leftJoin('shop_characteristic_groups as cg', 'c.group_id', '=', 'cg.id')
            ->where('shop_values.product_id', $product->id)
            ->orderBy('cg.order')->orderBy('shop_values.sort')->get();

        if ($values->isNotEmpty()) {
            $tempValues = [];
            $comparingTempValues = [];
            $groupId = $values[0]->characteristic->group_id;
            $i = 0;
            foreach ($values as $value) {
                if ($groupId === $value->group_id) {
                    $tempValues[$i][] = $value;
                } else {
                    $groupId = $value->characteristic->group_id;
                    $tempValues[++$i][] = $value;
                }
                $comparingTempValues[$i][] = $comparingProduct->values()->where('characteristic_id', $value->characteristic_id)->first() ?? null;
            }
            $groupValues = $tempValues;
            $comparingGroupValues = $comparingTempValues;
            unset($tempValues, $comparingTempValues);
        } else {
            $groupValues = null;
            $comparingGroupValues = null;
        }

        return view('compare.compare', compact('product', 'comparingProduct', 'groupValues', 'comparingGroupValues'));
    }
}
