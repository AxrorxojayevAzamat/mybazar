<?php

namespace App\Entity\Shop;

use App\Entity\BasePivot;
use App\Entity\Brand;
use Eloquent;

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
    protected $table = 'shop_category_brands';

    protected $fillable = [
        'category_id', 'brand_id'
    ];


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
