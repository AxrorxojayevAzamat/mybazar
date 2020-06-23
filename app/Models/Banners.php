<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table = 'banners';
    protected $fillable = [
        'title_ru',
        'title_en',
        'title_uz',
        'body_en',
        'body_ru',
        'body_uz',
        'description_uz',
        'description_en',
        'description_ru',
        'is_published',
        'slug',
        'url',
        'file',
    ];

    protected static function boot()
    {
        parent::boot();
    }
    public function getPublishedAttribute()
    {
        return ($this->is_published) ? 'Yes' : 'No';
    }

}
