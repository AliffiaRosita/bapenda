<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];

    /**
     * Get all of the newsGalleries for the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsGalleries()
    {
        return $this->hasMany(NewsGallery::class, 'news_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source' =>'title'
            ]
            ];
    }
}
