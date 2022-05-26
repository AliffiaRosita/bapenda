<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawFile extends Model
{
    use HasFactory;
    protected $guarded=['id'];


    public function law()
    {
        return $this->belongsTo(Law::class, 'law_id');
    }
}
