<?php

namespace App\Entity;

use App\Entity\User\User;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Sliders\CreateRequest;
use App\Http\Requests\Admin\Sliders\UpdateRequest;

/**
 * @property int $id
 * @property string $url
 * @property int $sort
 * @property string $file
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $fileThumbnail
 * @property string $fileOriginal
 * @mixin Eloquent
 */
class Slider extends BaseModel {

    protected $table = 'sliders';
    protected $fillable = ['url', 'sort', 'file'];

    public static function add(int $id, CreateRequest $request, string $fileName): self {
        return static::create([
                    'id' => $id,
                    'sort' => $request->sort,
                    'url' => $request->url,
                    'file' => $fileName,
        ]);
    }

    public function edit(UpdateRequest $request, string $fileName = null): void {
        $this->update([
            'sort' => $request->sort,
            'url' => $request->url,
            'file' => $fileName ?: $this->file,
        ]);
    }

    public function setSort($sort): void {
        $this->sort = $sort;
    }

    public function isIdEqualTo($id): bool {
        return $this->id == $id;
    }

    ########################################### Mutators

    public function getFileThumbnailAttribute(): string {
        return '/storage/images/' . ImageHelper::FOLDER_BANNERS . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->file;
    }

    public function getFileOriginalAttribute(): string {
        return '/storage/images/' . ImageHelper::FOLDER_BANNERS . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->file;
    }

    ###########################################
    ########################################### Relations

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

}
