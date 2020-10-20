<?php

namespace App\Entity\User;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $birth_date
 * @property int $gender
 * @property string $address
 * @property string $fullName
 * @property string $avatar
 *
 * @property User $user
 * @mixin Eloquent
 */
class Profile extends Model
{
    const FEMALE = 1;
    const MALE = 2;   
    
    protected $table = 'profiles';
    protected $primaryKey = 'user_id';
    public $timestamps = false; 
    
    protected $fillable = [
        'first_name', 'last_name', 'birth_date', 'gender', 'address', 'avatar',
    ];

    protected $casts = [
        'birth_date' => 'datetime',
    ];

    public function edit($firstName, $lastName, $birthDate, $gender = null, $address = null, $avatar = null)
    {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->birth_date = $birthDate;
        $this->gender = $gender ?? $this->gender;
        $this->about_uz = $address ?? $this->address;
        $this->about_ru = $avatar ?? $this->avatar;
    }

    public function getImageAttribute(): string
    {
        return $this->avatar;
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
