<?php

namespace App\Providers;

use App\Entity\Brand;
use App\Entity\Category;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use function foo\func;

class ModelsEventServiceProvider extends ServiceProvider
{
    private $classes = [
        Brand::class,
        Category::class,
    ];
    public function boot()
    {
        if ($user = Auth::user()) {
            /* @var Model $class */
            foreach ($this->classes as $class) {
                $class::creating(function ($model) use ($user) {
                    $model->created_by = $user->id;
                    $model->updated_by = $user->id;
                });
                $class::updating(function ($model) use ($user) {
                    $model->updated_by = $user->id;
                });
            }
        }
    }
}
