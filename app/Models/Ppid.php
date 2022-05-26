<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppid extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];


    public function ppidArticle()
    {
        return $this->hasOne(PpidArticle::class, 'ppid_id', 'id');
    }

    public function ppidFiles()
    {
        return $this->hasMany(PpidFile::class, 'ppid_id', 'id');
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
