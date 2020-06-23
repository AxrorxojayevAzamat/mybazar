<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_category';
    protected $fillable = ['name_ru','name_en','name_uz',];

    protected static function boot()
    {
        parent::boot();
    }

    public function news()
    {
        return $this->hasMany(News::class,'category_id');
    }
}
