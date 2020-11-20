<?php

namespace App\Entity\User;

use App\Helpers\UserHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Entity\Shop\OrderItem;
use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Entity\StoreUser;
use App\Entity\UserFavorite;
use App\Http\Requests\Admin\Users\UpdateRequest;
use Carbon\Carbon;
use Config;
use Eloquent;

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
 * @property UserFavorite[] $userFavorites
 * @property Product[] $favorites
 * @property Profile $profile
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
        'name', 'email', 'phone', 'password', 'verify_token', 'status', 'balance', 'role', 'phone_verified',
        'phone_verify_token', 'phone_verify_token_expire',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'phone_verified' => 'boolean',
        'phone_verify_token_expire' => 'datetime',
        'phone_auth' => 'boolean',
    ];

    public static function register(string $name, string $emailOrPhone, string $password): self
    {
        $user = static::make([
            'name' => $name,
            'password' => bcrypt($password),
            'role' => self::ROLE_USER,
            'status' => self::STATUS_WAIT,
        ]);

        if (UserHelper::isEmail($emailOrPhone)) {
            $user->email = $emailOrPhone;
            $user->verify_token = Str::uuid();
        } else if (UserHelper::isPhoneNumber($emailOrPhone)) {
            $phone = trim($emailOrPhone,'+');
            $user->phone = $phone;
            $user->phone_verify_token = (string)random_int(10000, 99999);
            $user->phone_verify_token_expire = Carbon::now()->copy()->addSeconds(config('sms.phone_verify_token_expire'));
        }

        $user->save();

        return $user;
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

    public function resendEmail(): void
    {
        $this->update(['verify_token' => Str::uuid()]);
    }

    public function resendPhone(): void
    {
        $this->verify_token = Str::uuid();
        $this->save();
    }

    public function unverifyPhone(): void
    {
        $this->phone_verified = false;
        $this->phone_verify_token = null;
        $this->phone_verify_token_expire = null;
        $this->phone_auth = false;
        $this->saveOrFail();
    }

    public function requestPhoneVerification(Carbon $now, string $phone): string
    {
        if (empty($phone)) {
            throw new \DomainException('Phone number is empty.');
        }
        if (!empty($this->phone_verify_token) && $this->phone_verify_token_expire && $this->phone_verify_token_expire->gt($now)) {
            throw new \DomainException('Token is already requested.');
        }

        $this->phone_verified = false;
        $this->phone_verify_token = (string)random_int(10000, 99999);
        $this->phone_verify_token_expire = $now->copy()->addSeconds(config('sms.phone_verify_token_expire'));
        $this->saveOrFail();

        return $this->phone_verify_token;
    }

    public function verifyPhone(): void
    {
        if (!$this->isWait()) {
            throw new \DomainException('User is already verified.');
        }

        $this->update([
            'status' => self::STATUS_ACTIVE,
            'phone_verified' => true,
            'phone_verify_token' => null,
            'phone_verify_token_expire' => null,
        ]);
    }

    public function verifyMail(): void
    {
        if (!$this->isWait()) {
            throw new \DomainException('User is already verified.');
        }

        if ($this->isPhoneVerified()) {
            throw new \DomainException('Phone is already verified.');
        }

        $this->update([
            'status' => self::STATUS_ACTIVE,
            'verify_token' => null,
        ]);
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

    public function isUser(): bool
    {
        return $this->role === self::ROLE_USER;
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

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function storeWorker()
    {
        return $this->hasOne(StoreUser::class, 'user_id', 'id');
    }

    public function store()
    {
        return $this->hasOneThrough(Store::class, StoreUser::class, 'user_id', 'store_id', 'id', 'id');
    }

    public function userFavorites()
    {
        return $this->hasMany(UserFavorite::class, 'user_id', 'id');
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'user_favorites', 'user_id', 'product_id');
    }

    ###########################################
}
