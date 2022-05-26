<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFile extends Model
{
    use HasFactory;
    protected $guarded=['id'];


    public function serviceList()
    {
        return $this->belongsTo(ServiceList::class, 'service_list_id');
    }
}
