<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    public function Campus()
    {
        return $this->belongsTo(Campus::class,'campus_id','id');
    }

    public function SubCampus()
    {
        return $this->belongsTo(SubCampus::class,'sub_campus_id','id');
    }

    public function Test()
    {
        return $this->belongsTo(test::class,'test','id');
    }
}
