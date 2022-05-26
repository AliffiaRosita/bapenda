<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];


    public function dataArticle()
    {
        return $this->hasOne(DataArticle::class, 'data_id', 'id');
    }

    public function dataFiles()
    {
        return $this->hasMany(DataFile::class, 'data_id', 'id');
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
