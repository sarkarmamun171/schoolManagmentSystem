<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubjectToClass extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function rel_to_class(){
        return $this->belongsTo(Classe::class,'class_id');
    }
}
