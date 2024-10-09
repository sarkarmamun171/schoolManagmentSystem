<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function rel_to_class(){
        return $this->belongsTo(Classe::class,'class_id');
    }
    public function rel_to_academicYear(){
        return $this->belongsTo(Academic_year::class,'academic_id');
    }
}
