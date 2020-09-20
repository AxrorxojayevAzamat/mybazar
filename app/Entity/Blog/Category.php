<?php

namespace App\Entity\Blog;

use App\Entity\BaseModel;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;

/**
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property int $type
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Post[] $posts
 * @property News[] $news
 * @property Video[] $videos
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @mixin Eloquent
 */
class Category extends BaseModel
{
    const NEWS = 1;
    const POSTS = 2;
    const VIDEOS = 3;

    protected $table = 'blog_categories';

    protected $fillable = ['name_uz', 'name_ru', 'name_en', 'type'];

    public static function typeList(): array
    {
        return [
            self::NEWS => trans('menu.news'),
            self::POSTS => trans('menu.posts'),
            self::VIDEOS => trans('menu.videos'),
        ];
    }

    public function typeName(): string
    {
        return self::typeList()[$this->type];
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    ###########################################


    ########################################### Relations

    public function posts()
    {
        return $this->hasMany(Post::class, 'created_by', 'id');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'created_by', 'id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'created_by', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    ###########################################

}
