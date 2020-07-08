<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
        'sort',
        'url',
        'file',
    ];

    protected static function boot()
    {
        parent::boot();
    }

}
