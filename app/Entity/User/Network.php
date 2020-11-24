<?php

namespace App\Entity\User;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property string $network
 * @property string $identity
 * @property array $emails_json
 * @property array $phones_json
 * @mixin Eloquent
 */
class Network extends Model
{
    protected $table = 'user_networks';

    public $timestamps = false;

    public $incrementing = false;

//    protected $primaryKey

    protected $fillable = ['network', 'identity', 'emails_json', 'phones_json'];

    protected $casts = [
        'emails_json' => 'array',
        'phones_json' => 'array',
    ];
}
