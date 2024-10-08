<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee_structure extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function classes(){
        return $this->belongsTo(Classe::class,'class_id');
    }
    public function academincs(){
        return $this->belongsTo(Academic_year::class,'academic_id');
    }
    public function feeheads(){
        return $this->belongsTo(FeeHead::class,'fee_head_id');
    }
}
