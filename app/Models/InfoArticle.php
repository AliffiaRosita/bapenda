<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoArticle extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function information()
    {
        return $this->belongsTo(Information::class, 'information_id');
    }
}
