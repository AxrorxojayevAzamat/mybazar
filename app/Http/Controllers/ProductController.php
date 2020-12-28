<?php

namespace App\Http\Controllers;


use App\Entity\Category;
use App\Entity\Shop\Product;
use App\Entity\Shop\Value;
use App\Http\Requests\Products\ReviewRequest;
use App\Services\Manage\Shop\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $sessionProduct = ProductService::addProductToSession($product->id);
        $user = $product->createdBy;
        $otherProducts = Product::with(['mainPhoto', 'store'])->where('created_by', $user->id)->active()
            ->orderByDesc('created_at')->limit(10)->get();

        $similarProducts = Product::with(['mainPhoto', 'store'])->where('main_category_id', $product->main_category_id)->active()->limit(10)->get();
        $watchedProduct = Product::whereIn('id', $sessionProduct)->paginate(10);

        $shopProducts = Product::where(['store_id' => $product->store_id])->limit(8)->get();
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

        return view('products.show', compact('product', 'otherProducts', 'similarProducts', 'interestingProducts', 'watchedProduct', 'shopProducts'));
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
//            dd($e->getMessage());
            return back()->with('error', trans('validation.add_rating_twice_in_product_comment'));
        }
    }

    public function compare(Product $product, Product $comparingProduct)
    {
        if ($product->id === $comparingProduct->id || $product->main_category_id !== $comparingProduct->main_category_id) {
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

    public function newProducts(Request $request,Category $category)
    {
        $newProducts = Product::where('new', true);
        if ($request->categoryName and $request->categoryName !== 'all'){
            $newProducts = $newProducts->where('main_category_id', $request->categoryName);
        }

        $ratings = [];
        $min_price = 0;
        $max_price = 1;

        $newProducts = $newProducts->paginate(12);
        $newProductIds = $newProducts->pluck('main_category_id')->toArray();

        foreach ($newProducts as $i => $product) {
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
        $categories = Category::whereIn('id', $newProductIds)->get();

        $parentCategory =  $category->parent()->get()->toTree();
        $rootCategoryShow = true;

        return view('products.new-products', compact('newProducts', 'ratings', 'min_price', 'max_price', 'parentCategory', 'categories', 'rootCategoryShow'));
    }
}
