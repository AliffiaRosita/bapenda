<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceList extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];


    public function serviceProgram()
    {
        return $this->belongsTo(ServiceProgram::class, 'service_program_id');
    }

    public function serviceArticle()
    {
        return $this->hasOne(ServiceArticle::class, 'service_list_id', 'id');
    }

    public function serviceFiles()
    {
        return $this->hasMany(ServiceFile::class, 'service_list_id', 'id');
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
