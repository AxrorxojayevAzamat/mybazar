<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\DeliveryMethod;
use App\Entity\Shop\Product;
use App\Entity\Shop\ProductReview;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryMethods\CreateRequest;
use App\Http\Requests\Admin\DeliveryMethods\UpdateRequest;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{

    public function index(Product $product)
    {
        $reviews = $product->reviews()->orderByDesc('updated_at')->paginate(20);

        return view('admin.shop.products.reviews.index', compact('reviews'));
    }

    public function show(Product $product, ProductReview $review)
    {
        return view('admin.shop.products.reviews.show', compact('product', 'review'));
    }

    public function destroy(Product $product, ProductReview $review)
    {
        $review->delete();

        return redirect()->route('admin.shop.products.reviews.index', $product);
    }
}
