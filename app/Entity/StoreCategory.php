<?php


namespace App\Entity;

use App\Entity\Shop\Category;
use Eloquent;

/**
 * @property int $store_id
 * @property int $category_id
 *
 * @property Store $store
 * @property Category $category
 * @mixin Eloquent
 */
class StoreCategory extends BasePivot
{
    protected $table = 'store_categories';

    protected $fillable = ['store_id', 'category_id'];


    ########################################### Relations

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    ###########################################
}
