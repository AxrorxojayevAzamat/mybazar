<?php

namespace App\Entity\Blog;

use App\Entity\BaseModel;
use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use App\Http\Requests\Admin\Blog\News\CreateRequest;
use App\Http\Requests\Admin\Blog\News\UpdateRequest;
use Carbon\Carbon;
use Eloquent;

/**
 * @property int $id
 * @property string $title_uz
 * @property string $title_ru
 * @property string $title_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $body_uz
 * @property string $body_ru
 * @property string $body_en
 * @property int $category_id
 * @property bool $is_published
 * @property string $file
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Category $category
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $title
 * @property string $description
 * @property string $body
 * @property string $published
 * @property string $fileThumbnail
 * @property string $fileOriginal
 * @mixin Eloquent
 */
class News extends BaseModel
{
    protected $table = 'blog_news';

    protected $fillable = [
        'id', 'title_uz', 'title_ru', 'title_en', 'description_uz', 'description_ru', 'description_en', 'body_uz', 'body_ru',
        'body_en', 'category_id', 'is_published', 'file',
    ];

    public static function add(int $id, CreateRequest $request, int $categoryId, string $fileName): self
    {
        return static::create([
            'id' => $id,
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'body_uz' => $request->body_uz,
            'body_ru' => $request->body_ru,
            'body_en' => $request->body_en,
            'category_id' => $categoryId,
            'is_published' => $request->is_published,
            'file' => $fileName,
        ]);
    }

    public function edit(UpdateRequest $request, int $categoryId, string $fileName = null): void
    {
        $this->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'body_uz' => $request->body_uz,
            'body_ru' => $request->body_ru,
            'body_en' => $request->body_en,
            'category_id' => $categoryId,
            'is_published' => $request->is_published,
            'file' => $fileName ?: $this->file,
        ]);
    }

    public function publish(): void
    {
        $this->is_published = true;
    }

    public function discard(): void
    {
        $this->is_published = false;
    }


    ########################################### Mutators

    public function getTitleAttribute(): string
    {
        return LanguageHelper::getTitle($this);
    }

    public function getDescriptionAttribute(): string
    {
        return LanguageHelper::getDescription($this);
    }

    public function getBodyAttribute(): string
    {
        return LanguageHelper::getBody($this);
    }

    public function getPublishedAttribute()
    {
        return ($this->is_published) ? trans('adminlte.yes') : trans('adminlte.no');
    }

    public function getFileThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_NEWS . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->file;
    }

    public function getFileOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_NEWS . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->file;
    }

    ###########################################


    ########################################### Scopes

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeDrafted($query)
    {
        return $query->where('is_published', false);
    }

    ###########################################


    ########################################### Relations

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
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
