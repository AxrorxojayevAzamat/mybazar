<?php

namespace App\Entity;

use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use App\Http\Requests\Admin\Banners\CreateRequest;
use App\Http\Requests\Admin\Banners\UpdateRequest;

/**
 * @property int $id
 * @property string $title_uz
 * @property string $title_ru
 * @property string $title_en
 * @property string $url
 * @property string $slug
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property int $category_id
 * @property bool $is_published
 * @property string $file
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $title
 * @property string $description
 * @property string $fileThumbnail
 * @property string $fileOriginal
 * @mixin Eloquent
 */
class Banner extends BaseModel {

    protected $table = 'banners';
    protected $fillable = [
        'title_uz', 'title_ru', 'title_en', 'description_uz', 'description_ru',
        'description_en', 'category_id', 'is_published', 'slug', 'url', 'file',
    ];

    public static function add(int $id, CreateRequest $request, int $categoryId, string $fileName): self {
        return static::create([
                    'id' => $id,
                    'title_uz' => $request->title_uz,
                    'title_ru' => $request->title_ru,
                    'title_en' => $request->title_en,
                    'description_uz' => $request->description_uz,
                    'description_ru' => $request->description_ru,
                    'description_en' => $request->description_en,
                    'url' => $request->url,
                    'slug' => $request->slug,
                    'category_id' => $request->categoryId,
                    'is_published' => $request->is_published,
                    'file' => $fileName,
        ]);
    }

    public function edit(UpdateRequest $request, int $categoryId, string $fileName = null): void {
        $this->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'url' => $request->url,
            'slug' => $request->slug,
            'category_id' => $request->categoryId,
            'is_published' => $request->is_published,
            'file' => $fileName ?: $this->file,
        ]);
    }

    public function publish(): void {
        $this->is_published = true;
    }

    public function discard(): void {
        $this->is_published = false;
    }

    ########################################### Mutators

    public function getPublishedAttribute() {
        return ($this->is_published) ? trans('adminlte.yes') : trans('adminlte.no');
    }

    public function getTitleAttribute(): string {
        return LanguageHelper::getTitle($this);
    }

    public function getDescriptionAttribute(): string {
        return LanguageHelper::getDescription($this);
    }

    public function getFileThumbnailAttribute(): string {
        return '/storage/images/' . ImageHelper::FOLDER_BANNERS . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->file;
    }

    public function getFileOriginalAttribute(): string {
        return '/storage/images/' . ImageHelper::FOLDER_BANNERS . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->file;
    }

    ###########################################
    ########################################### Scopes

    public function scopePublished($query) {
        return $query->where('is_published', true);
    }

    public function scopeDrafted($query) {
        return $query->where('is_published', false);
    }

    ###########################################
    ########################################### Relations

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    ###########################################
}
