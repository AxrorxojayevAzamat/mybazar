<?php

namespace App\Models;

use App\Helpers\LanguageHelper;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_category';
    protected $fillable = ['name_ru','name_en','name_uz',];

    protected static function boot()
    {
        parent::boot();
    }

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    public function news()
    {
        return $this->hasMany(News::class,'category_id');
    }
}
