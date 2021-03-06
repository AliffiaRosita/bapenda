<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportArticle extends Model
{
    use HasFactory;
    protected $guarded=['id'];


    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
