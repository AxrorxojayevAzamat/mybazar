<?php

namespace App\Entity;

use App\Entity\User\User;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

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
class Slider extends BaseModel
{
    protected $table = 'sliders';

    protected $fillable = ['url', 'sort', 'file'];

}
