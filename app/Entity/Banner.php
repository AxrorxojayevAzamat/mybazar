<?php

namespace App\Entity;

use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;

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
class   Banner extends BaseModel {

    protected $table = 'banners';
    protected $fillable = [
        'title_uz', 'title_ru', 'title_en', 'description_uz', 'description_ru',
        'description_en', 'is_published', 'slug', 'url', 'file',
    ];


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

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    ###########################################
}
