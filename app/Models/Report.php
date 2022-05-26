<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];


    public function reportArticle()
    {
        return $this->hasOne(ReportArticle::class, 'report_id', 'id');
    }

    public function reportFiles()
    {
        return $this->hasMany(ReportFile::class, 'report_id', 'id');
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
