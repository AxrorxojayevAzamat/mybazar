<?php

namespace App\Models;

use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
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
        'user_id',
        'category_id',
        'is_published',
        'poster',
        'video',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if(is_null($post->user_id)) {
                $post->user_id = auth()->user()->id;
            }
        });
    }

    public function getTitleAttribute(): string
    {
        return LanguageHelper::getTitle($this);
    }

    public function getDescriptionAttribute(): string
    {
        return LanguageHelper::getDescription($this);
    }

    public function getBodyAttribute(): string
    {
        return LanguageHelper::getBody($this);
    }

    public function category()
    {
        return $this->belongsTo(VideosCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeDrafted($query)
    {
        return $query->where('is_published', false);
    }

    public function getPublishedAttribute()
    {
        return ($this->is_published) ? 'Yes' : 'No';
    }
}
