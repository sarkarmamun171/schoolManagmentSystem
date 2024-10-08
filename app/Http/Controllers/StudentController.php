<?php

namespace App\Http\Controllers;

use App\Models\Academic_year;
use App\Models\Classe;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function add_student(){
        $classes=Classe::all();
        $academicyears= Academic_year::all();
        return view('admin.student.student_add',[
            'classes'=>$classes,
            'academicyears'=>$academicyears,
        ]);
    }
}
