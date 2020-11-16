<?php

namespace App\Entity;

use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @property integer $id
 * @property string $title_uz
 * @property string $title_ru
 * @property string $title_en
 * @property string $menu_title_uz
 * @property string $menu_title_ru
 * @property string $menu_title_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $slug
 * @property integer $left
 * @property integer $right
 * @property integer|null $parent_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property int $depth
 * @property Page $parent
 * @property Page[] $children
 * @property string $title
 * @property string $menuTitle
 * @property string $description
 * @property string $body
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @mixin Eloquent
 */
class Page extends BaseModel
{
    use NodeTrait;

    public $cacheFor = 0;

    protected $table = 'pages';

    protected $guarded = [];

    protected $fillable = [
        'title_uz', 'title_ru', 'title_en', 'menu_title_uz', 'menu_title_ru', 'menu_title_en', 'slug',
        'description_uz', 'description_ru', 'description_en', 'body_uz', 'body_ru', 'body_en', 'parent_id',
    ];

    protected function getCacheBaseTags(): array
    {
        return [
            'pages',
        ];
    }

    public function getPath(): string
    {
        return implode('/', array_merge($this->ancestors()->defaultOrder()->pluck('slug')->toArray(), [$this->slug]));
    }

    public function getMenuTitle(): string
    {
        return $this->menuTitle ?: $this->title;
    }


    ########################################### Mutators

    public function getTitleAttribute(): string
    {
        return LanguageHelper::getTitle($this);
    }

    public function getMenuTitleAttribute(): string
    {
        return LanguageHelper::getMenuTitle($this);
    }

    public function getDescriptionAttribute(): string
    {
        return LanguageHelper::getDescription($this);
    }

    public function getBodyAttribute(): string
    {
        return LanguageHelper::getBody($this);
    }

    ###########################################


    ########################################### For Nested Set

    public function getLftName(): string
    {
        return 'left';
    }

    public function getRgtName(): string
    {
        return 'right';
    }

    ###########################################


    ########################################### Relations

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
