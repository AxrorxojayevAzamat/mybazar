<?php

namespace App\Entity\Shop;

use App\Entity\BasePivot;
use App\Entity\Brand;
use App\Entity\Category;
use Eloquent;
use Rennokki\QueryCache\Traits\QueryCacheable;

/**
 * @property int $category_id
 * @property int $brand_id
 *
 * @property Category $category
 * @property Brand $brand
 * @mixin Eloquent
 */
class CategoryBrand extends BasePivot
{
//    use QueryCacheable;

    protected $table = 'shop_category_brands';

    protected $fillable = [
        'category_id', 'brand_id'
    ];

    protected function getCacheBaseTags(): array
    {
        return [
            'shop_category_brands',
        ];
    }


    ########################################### Relations

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    ###########################################
}
