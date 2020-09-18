<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = ['sort', 'url', 'file'];

    protected static function boot()
    {
        parent::boot();
    }

}
