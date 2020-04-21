<?php

namespace App\Entity\Shop;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @property integer $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $slug
 * @property string $meta_json
 * @property integer $left
 * @property integer $right
 * @property integer|null $parent_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property int $depth
 * @property Category $parent
 * @property Category[] $children
 */
class Category extends Model
{
    use NodeTrait;

    protected $table = 'shop_categories';

    protected $fillable = ['name_uz', 'name_ru', 'name_en', 'description_uz', 'description_ru', 'description_en', 'slug', 'parent_id'];


    public function getLftName()
    {
        return 'left';
    }

    public function getRgtName()
    {
        return 'right';
    }
}
