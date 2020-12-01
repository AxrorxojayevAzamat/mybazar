<?php

namespace App\Entity;

use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use App\Http\Requests\Admin\Banners\CreateRequest;
use App\Http\Requests\Admin\Banners\UpdateRequest;
use Illuminate\Database\Eloquent\Builder;

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
 * @property int $status
 * @property int $type
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
 * @property string $fileCustom
 * @property string $fileOriginal
 * @method Builder published()
 * @method Builder drafted()
 * @mixin Eloquent
 */
class Banner extends BaseModel
{
    const DRAFT = 1;
    const PUBLISHED = 3;

    const TYPE_SHORT = 1;
    const TYPE_LONG = 3;

    protected $table = 'banners';

    protected $fillable = [
        'id', 'title_uz', 'title_ru', 'title_en', 'description_uz', 'description_ru', 'description_en', 'category_id',
        'status', 'type', 'slug', 'url', 'file',
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
            'url' => $request->url,
            'slug' => $request->slug,
            'category_id' => $categoryId,
            'status' => $request->status,
            'type' => $request->type,
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
            'url' => $request->url,
            'slug' => $request->slug,
            'category_id' => $categoryId,
            'status' => $request->status,
            'type' => $request->type,
            'file' => $fileName ?: $this->file,
        ]);
    }

    public static function statusList(): array
    {
        return [
            self::DRAFT => trans('adminlte.draft'),
            self::PUBLISHED => trans('adminlte.published'),
        ];
    }

    public function statusName(): string
    {
        return self::statusList()[$this->status];
    }

    public function statusLabel(): string
    {
        switch ($this->status) {
            case self::DRAFT:
                return '<span class="badge badge-secondary">'. trans('adminlte.draft') . '</span>';
            case self::PUBLISHED:
                return '<span class="badge badge-success">'. trans('adminlte.published') . '</span>';
            default:
                return '<span class="badge badge-secondary">Default</span>';
        }
    }

    public static function typeList(): array
    {
        return [
            self::TYPE_SHORT => trans('adminlte.brand.short'),
            self::TYPE_LONG => trans('adminlte.brand.long'),
        ];
    }

    public function typeName(): string
    {
        return self::typeList()[$this->type];
    }

    public function publish(): void
    {
        if ($this->status === self::PUBLISHED) {
            throw new \DomainException('Banner is already published.');
        }
        $this->update([
            'status' => self::PUBLISHED,
        ]);
    }

    public function discard(): void
    {
        if ($this->status === self::DRAFT) {
            throw new \DomainException('Banner is already drafted.');
        }
        $this->update([
            'status' => self::DRAFT,
        ]);
    }

    public function isPublished(): bool
    {
        return $this->status === self::PUBLISHED;
    }

    ########################################### Mutators

    public function getPublishedAttribute()
    {
        return $this->status === self::PUBLISHED ? trans('adminlte.yes') : trans('adminlte.no');
    }

    public function getTitleAttribute(): string
    {
        return LanguageHelper::getTitle($this);
    }

    public function getDescriptionAttribute(): string
    {
        return LanguageHelper::getDescription($this);
    }

    public function getFileThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_BANNERS . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->file;
    }

    public function getFileCustomAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_BANNERS . '/' . $this->id . '/' . ImageHelper::TYPE_CUSTOM . '/' . $this->file;
    }

    public function getFileOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_BANNERS . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->file;
    }

    ###########################################


    ########################################### Scopes

    public function scopePublished($query)
    {
        return $query->where('status', self::PUBLISHED);
    }

    public function scopeDrafted($query)
    {
        return $query->where('status', self::DRAFT);
    }

    ###########################################


    ########################################### Relations

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
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
