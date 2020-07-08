<?php

namespace App\Models;

use App\Helpers\LanguageHelper;
use Illuminate\Database\Eloquent\Model;

class VideosCategory extends Model
{
    protected $table = 'videos_category';
    protected $fillable = ['name_ru','name_en','name_uz',];

    protected static function boot()
    {
        parent::boot();
    }

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    public function videos()
    {
        return $this->hasMany(Videos::class,'category_id');
    }
}
