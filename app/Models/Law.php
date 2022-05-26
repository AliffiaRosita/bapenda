<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];


    public function lawArticle()
    {
        return $this->hasOne(LawArticle::class, 'law_id', 'id');
    }

    public function lawFiles()
    {
        return $this->hasMany(LawFile::class, 'law_id', 'id');
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
