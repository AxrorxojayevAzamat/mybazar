<?php

namespace App\Entity\Shop;

use App\Entity\BaseModel;
use App\Entity\User\User;
use App\Helpers\ImageHelper;
use Carbon\Carbon;
use Eloquent;

/**
 * @property int $id
 * @property int $product_id
 * @property string $file
 * @property int $sort
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string $fileThumbnail
 * @property string $fileOriginal
 *
 * @property Product $product
 * @property User $createdBy
 * @property User $updatedBy
 * @mixin Eloquent
 */
class Photo extends BaseModel
{
    protected $table = 'shop_photos';

    protected $fillable = [
        'product_id', 'file', 'sort',
    ];

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }

    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }


    ########################################### Mutators

    public function getFileThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PRODUCTS . '/' . $this->product_id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->file;
    }

    public function getFileOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PRODUCTS . '/' . $this->product_id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->file;
    }

    ###########################################


    ########################################### Relations

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
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
