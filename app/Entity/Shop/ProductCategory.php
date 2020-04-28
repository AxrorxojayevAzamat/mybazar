<?php

namespace App\Entity\Shop;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $product_id
 * @property int $category_id
 *
 * @property Product $product
 * @property Category $category
 */
class ProductCategory extends Model
{
    protected $table = 'shop_product_categories';

    protected $fillable = [
        'product_id', 'category_id'
    ];


    ########################################### Relations

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    ###########################################


}
