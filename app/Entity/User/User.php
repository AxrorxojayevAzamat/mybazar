<?php

namespace App\Entity\User;

use App\Entity\Shop\OrderItem;
use App\Entity\Store;
use App\Entity\StoreUser;
use App\Http\Requests\Admin\Users\UpdateRequest;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property bool $phone_verified
 * @property string $password
 * @property integer $balance
 * @property string $verify_token
 * @property string $phone_verify_token
 * @property Carbon $phone_verify_token_expire
 * @property boolean $phone_auth
 * @property string $role
 * @property string $status
 *
 * @property StoreUser $storeWorker
 * @property Store $store
 *
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    public const STATUS_WAIT = 0;
    public const STATUS_ACTIVE = 9;

    const ROLE_USER = 'user';
    const ROLE_DEALER = 'diller';
    const ROLE_MODERATOR = 'moderator';
    const ROLE_ADMIN = 'administrator';
    const ROLE_MANAGER = 'manager';

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'verify_token', 'status', 'balance', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'phone_verified' => 'boolean',
        'phone_verify_token_expire' => 'datetime',
        'phone_auth' => 'boolean',
    ];

    public static function register(string $name, string $email, string $password): self
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'verify_token' => Str::uuid(),
            'role' => self::ROLE_USER,
            'status' => self::STATUS_WAIT,
        ]);
    }

    public static function new($name, $email, $role, $password): self
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => $role,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public function edit($name, $email, $role, $status, $password = null): void
    {
        $attributes = array_merge([
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'status' => $status,
        ], $password ? ['password' => bcrypt($password)] : []);

        $this->update($attributes);
    }

    public static function rolesList(): array
    {
        return [
            self::ROLE_USER => trans('adminlte.user.role_user'),
            self::ROLE_DEALER => trans('adminlte.user.role_dealer'),
            self::ROLE_MODERATOR => trans('adminlte.user.role_moderator'),
            self::ROLE_ADMIN => trans('adminlte.user.role_administrator'),
            self::ROLE_MANAGER => trans('adminlte.user.role_manager'),
        ];
    }

    public function roleName(): string
    {
        return self::rolesList()[$this->role];
    }

    public static function statusesList(): array
    {
        return [
            self::STATUS_WAIT => trans('adminlte.user.waiting'),
            self::STATUS_ACTIVE => trans('adminlte.user.active'),
        ];
    }


    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isModerator(): bool
    {
        return $this->role === self::ROLE_MODERATOR;
    }

    public function isDealer(): bool
    {
        return $this->role === self::ROLE_DEALER;
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isManager(): bool
    {
        return $this->role === self::ROLE_MANAGER;
    }

    public function isPhoneVerified(): bool
    {
        return $this->phone_verified;
    }

    public function isPhoneAuthEnabled(): bool
    {
        return (bool)$this->phone_auth;
    }

    public function haveBoughtProduct(int $productId): bool
    {
        return OrderItem::select('shop_order_items.*')
            ->leftJoin('shop_orders as o', 'shop_order_items.order_id', '=', 'o.id')
            ->where('shop_order_items.id', $productId)->where('o.user_id', $this->id)->exists();
    }


    ########################################### Relations

    public function storeWorker()
    {
        return $this->hasOne(StoreUser::class, 'user_id', 'id');
    }

    public function store()
    {
        return $this->hasOneThrough(Store::class, StoreUser::class, 'user_id', 'store_id', 'id', 'id');
    }

    ###########################################
}
