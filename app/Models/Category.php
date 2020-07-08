<?php

namespace App\Models;

use App\Helpers\LanguageHelper;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_ru','name_en','name_uz',];

    protected static function boot()
    {
        parent::boot();
    }
    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
