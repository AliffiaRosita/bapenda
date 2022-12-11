<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ['slug','name'];

    public function news()
    {
        return $this->belongsToMany(News::class);
    }
    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source' =>'name'
            ]
            ];
    }
}
