<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];


    public function infoArticle()
    {
        return $this->hasOne(InfoArticle::class, 'information_id', 'id');
    }

    public function infoFiles()
    {
        return $this->hasMany(InfoFile::class, 'information_id', 'id');
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
