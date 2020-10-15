<?php

namespace App\Entity;

use App\Entity\BaseModel;
use App\Entity\User\User;
use App\Entity\Category;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use App\Http\Requests\Admin\Discounts\CreateRequest;
use App\Http\Requests\Admin\Discounts\UpdateRequest;
use Carbon\Carbon;
use Eloquent;

/**
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property int $category_id
 * @property bool $common
 * @property int $status
 * @property string $photo
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Category $category
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @property string $description
 * @property string $photoThumbnail
 * @property string $photoOriginal
 * @mixin Eloquent
 */
class Discount extends BaseModel {

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    protected $table = 'discounts';
    protected $fillable = [
        'id', 'name_ru', 'name_en', 'name_uz', 'description_uz', 'description_en', 'description_ru',
        'start_date', 'end_date', 'category_id', 'common', 'status', 'photo'
    ];
    
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public static function add(int $id, CreateRequest $request, int $categoryId, string $photoName): self {
        return static::create([
                    'id' => $id,
                    'name_uz' => $request->name_uz,
                    'name_ru' => $request->name_ru,
                    'name_en' => $request->name_en,
                    'description_uz' => $request->description_uz,
                    'description_ru' => $request->description_ru,
                    'description_en' => $request->description_en,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'category_id' => $categoryId,
                    'common' => $request->common,
                    'status' => $request->status,
                    'photo' => $photoName
        ]);
    }

    public function edit(UpdateRequest $request, int $categoryId, string $photoName = null): void {
        $this->update([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'category_id' => $categoryId,
            'common' => $request->common,
            'status' => $request->status,
            'photo' => $photoName ?: $this->photo,
        ]);
    }

    public function common(): void {
        $this->common = true;
    }

    public function rared(): void {
        $this->common = false;
    }

    public static function statusesList(): array {
        return [
            self::STATUS_INACTIVE => trans('adminlte.inactive'),
            self::STATUS_ACTIVE => trans('adminlte.active'),
        ];
    }

    public static function getStatusLabel($status): string {
        switch ($status) {
            case self::STATUS_INACTIVE:
                return '<span class="badge badge-secondary">' . trans('adminlte.inactive') . '</span>';
                break;
            case self::STATUS_ACTIVE:
                return '<span class="badge badge-primary">' . trans('adminlte.active') . '</span>';
                break;
            default:
                return '<span class="badge badge-danger">Default</span>';
                break;
        }
    }

    ########################################### Mutators

    public function getNameAttribute(): string {
        return LanguageHelper::getName($this);
    }

    public function getDescriptionAttribute(): string {
        return LanguageHelper::getDescription($this);
    }

    public function getCommonedAttribute() {
        return ($this->common) ? trans('adminlte.yes') : trans('adminlte.no');
    }

    public function getPhotoThumbnailAttribute(): string {
        return '/storage/files/' . ImageHelper::FOLDER_DISCOUNTS . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->photo;
    }

    public function getPhotoOriginalAttribute(): string {
        return '/storage/files/' . ImageHelper::FOLDER_DISCOUNTS . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->photo;
    }

    ###########################################
    ########################################### Scopes

    public function scopeCommoned($query) {
        return $query->where('common', true);
    }

    public function scopeRared($query) {
        return $query->where('common', false);
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
