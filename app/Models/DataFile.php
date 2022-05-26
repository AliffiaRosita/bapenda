<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataFile extends Model
{
    use HasFactory;
    protected $guarded=['id'];


    public function data()
    {
        return $this->belongsTo(Data::class, 'data_id');
    }
}
