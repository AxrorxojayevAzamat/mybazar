<?php

namespace App\Entity\User;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ImageHelper;

/**
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $birth_date
 * @property int $gender
 * @property int $region
 * @property string $address
 * @property string $fullName
 * @property string $avatar
 * @property string $passport
 *
 * @property string $avatarThumbnail
 * @property string $avatarOriginal
 *
 * @property User $user
 * @mixin Eloquent
 */
class Profile extends Model
{

    const GENDER_EMPTY = 0;
    const FEMALE = 1;
    const MALE = 2;

    const REGION_EMPTY = 0;
    const TASHKENT_CITY = 1;
    const KARAKALPAK = 2;
    const ANDIJAN = 3;
    const BUKHARA = 4;
    const DJIZZAKH = 5;
    const KASHKADARYA = 6;
    const NAVOIY = 7;
    const NAMANGAN = 8;
    const SAMARKAND = 9;
    const SURKHANDARYA = 10;
    const TASHKENT = 11;
    const FERGANA = 12;
    const KHORAZEM = 13;
    const SIRDARYA = 14;

    protected $table = 'profiles';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'birth_date', 'gender', 'address', 'avatar', 'region', 'passport'
    ];
    protected $casts = [
        'birth_date' => 'datetime',
    ];

    public static function new($userId, $firstName = null, $lastName = null, $birthDate = null, $gender = null, $address = null, $avatar = null, $region = null,$passport = null): self
    {
        return static::create([
            'user_id' => $userId,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'birth_date' => $birthDate,
            'gender' => $gender,
            'address' => $address,
            'avatar' => $avatar,
            'region' => $region,
            'passport' => $passport
        ]);
    }

    public function edit($firstName = null, $lastName = null, $birthDate = null, $gender = null, $address = null, $avatar = null , $region = null,$passport = null)
    {
        $this->update([
            'first_name' => $firstName ?? $this->first_name,
            'last_name' => $lastName ?? $this->last_name,
            'birth_date' => $birthDate ?? $this->birth_date,
            'gender' => $gender ?? $this->gender,
            'address' => $address ?? $this->address,
            'avatar' => $avatar ?? $this->avatar,
            'region' => $region ?? $this->region,
            'passport' => $passport ?? $this->passport,
        ]);
    }

    public static function gendersList(): array
    {
        return [
            self::GENDER_EMPTY => '',
            self::FEMALE => trans('adminlte.female'),
            self::MALE => trans('adminlte.male'),
        ];
    }

    public static function regionsList(): array
    {
        return [
            self::REGION_EMPTY => '',
            self::TASHKENT_CITY => trans('adminlte.regions.tashkent_city'),
            self::KARAKALPAK => trans('adminlte.regions.karakalpak'),
            self::ANDIJAN => trans('adminlte.regions.andijan'),
            self::BUKHARA => trans('adminlte.regions.bukhara'),
            self::DJIZZAKH => trans('adminlte.regions.djizzakh'),
            self::KASHKADARYA => trans('adminlte.regions.kashkadarya'),
            self::NAVOIY => trans('adminlte.regions.navoiy'),
            self::NAMANGAN => trans('adminlte.regions.namangan'),
            self::SAMARKAND => trans('adminlte.regions.samarkand'),
            self::SURKHANDARYA => trans('adminlte.regions.surkhandarya'),
            self::TASHKENT => trans('adminlte.regions.tashkent'),
            self::FERGANA => trans('adminlte.regions.fergana'),
            self::KHORAZEM => trans('adminlte.regions.khorezm'),
            self::SIRDARYA => trans('adminlte.regions.sirdarya'),
        ];
    }

    public function genderName(): string
    {
        return self::gendersList()[$this->gender];
    }

    public function getRegionName($name = null)
    {
        foreach (self::regionsList() as $i => $region){
            if ($i === $name)
            {
                return $region;
            }
        }

    }

    public function regionName(): string
    {
        return self::regionsList()[$this->region];
    }

    public function getAvatarThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PROFILES . '/' . $this->user_id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->avatar;
    }

    public function getAvatarOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PROFILES . '/' . $this->user_id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->avatar;
    }

    public function getPassportThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PASSPORT . '/' . $this->user_id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->passport;
    }

    public function getPassportriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PASSPORT . '/' . $this->user_id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->passport;
    }

    public function getFullNameAttribute(): string
    {
        return "$this->last_name $this->first_name";
    }

    ########################################### Relations

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    ###########################################
}
