<?php


namespace App\Entity;

use App\Entity\User\User;
use Eloquent;

/**
 * @property int $store_id
 * @property int $user_id
 * @property string $role
 *
 * @property Store $store
 * @property User $user
 * @mixin Eloquent
 */
class StoreUser extends BasePivot
{
    protected $table = 'store_users';

    protected $fillable = ['store_id', 'user_id', 'role'];


    public static function rolesList(): array
    {
        return [
            User::ROLE_DEALER => trans('adminlte.user.role_dealer'),
            User::ROLE_MODERATOR => trans('adminlte.user.role_moderator'),
            User::ROLE_MANAGER => trans('adminlte.user.role_manager'),
            User::ROLE_ADMIN => trans('adminlte.user.role_administrator'),
        ];
    }

    public function roleName(): string
    {
        return self::rolesList()[$this->role];
    }

    ########################################### Relations

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    ###########################################


}
