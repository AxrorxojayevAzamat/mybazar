<?php

namespace App\Entity;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $slug
 * @property string $meta_json
 * @property integer $created_by
 * @property integer $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Brand extends Model
{

    protected $table = 'brands';

    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'slug',
    ];
}
