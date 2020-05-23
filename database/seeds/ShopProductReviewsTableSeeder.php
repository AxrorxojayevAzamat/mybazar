<?php

use App\Entity\Shop\Product;
use App\Entity\Shop\ProductReview;
use Illuminate\Database\Seeder;

class ShopProductReviewsTableSeeder extends Seeder
{
    public function run()
    {
        Product::chunk(100, function ($products) {
            /* @var $product Product */
            foreach ($products as $product) {
                $reviewsNumber = $product->number_of_reviews;
                $ratingSum = ($product->rating ?? 0) * $reviewsNumber;

                $product->reviews()->saveMany(factory(ProductReview::class, 25)->make()->unique('user_id')
                    ->each(function (ProductReview $review) use (&$reviewsNumber, &$ratingSum) {
                        $ratingSum += $review->rating;
                        $reviewsNumber++;
                    })
                );

                $totalRating = $ratingSum / $reviewsNumber;
                $product->update(['rating' => $totalRating, 'number_of_reviews' => $reviewsNumber]);
            }
        });
    }
}
