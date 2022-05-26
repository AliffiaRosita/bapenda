<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProgram extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded=['id'];

    public function serviceLists()
    {
        return $this->hasMany(ServiceList::class, 'service_program_id', 'id');
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
