<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Profile extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded=['id'];

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source' =>'title'
            ]
            ];
    }
}
