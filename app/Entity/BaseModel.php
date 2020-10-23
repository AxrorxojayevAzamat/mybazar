<?php


namespace App\Entity;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Rennokki\QueryCache\Traits\QueryCacheable;

class BaseModel extends Model
{
    use QueryCacheable;

    public $cacheFor = 3600;

    public static function boot()
    {
        parent::boot();

        if ($user = Auth::user()) {
            static::creating(function ($model) use ($user) {
                $model->created_by = $user->id;
                $model->updated_by = $user->id;
            });

            static::updating(function ($model) use ($user) {
                $model->updated_by = $user->id;
                $model->updated_at = Carbon::now();
            });

            static::saving(function ($model) use ($user) {
                $model->updated_by = $user->id;
                $model->updated_at = Carbon::now();
            });
        }
    }

}
