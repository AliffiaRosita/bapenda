<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidArticle extends Model
{
    use HasFactory;
    protected $guarded=['id'];


    public function ppid()
    {
        return $this->belongsTo(Ppid::class, 'ppid_id');
    }
}
