<?php

namespace App\Providers;

use App\Entity\Brand;
use App\Entity\Shop\Category;
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
        /* @var Model $class */
        foreach ($this->classes as $class) {
            $class::creating(function ($model) {
                $model->created_by = Carbon::now();
                $model->updated_by = Carbon::now();
            });
            $class::updating(function ($model) {
                $model->updated_by = Carbon::now();
            });
        }
    }
}
