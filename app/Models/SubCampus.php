<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCampus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Campus()
    {
        return $this->belongsTo(Campus::class,'campus_id','id');
    }
}
