<?php

namespace App\Http\Controllers;

use App\Models\Academic_year;
use App\Models\Classe;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function store_student(Request $request){
        $request->validate([
            'class_id'=>'required',
            'academic_id'=>'required',
            'name'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'admission_date'=>'required',
            'dob'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'password'=>'required',

        ]);
        Student::insert([
            'class_id'=>$request->class_id,
            'academic_id'=>$request->academic_id,
            'name'=>$request->name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'admission_date'=>$request->admission_date,
            'dob'=>$request->dob,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Student Record Successfully');
    }
    public function list_student(){
        $students = Student::all();
        return view('admin.student.student_list',[
            'students'=>$students,
        ]);
    }
    public function edit_student($id){
        $classes=Classe::all();
        $academicyears= Academic_year::all();
        $students = Student::find($id);
        return view('admin.student.student_edit',[
            'classes'=>$classes,
            'academicyears'=>$academicyears,
            'students'=>$students,
        ]);
    }
    public function update_student(Request $request,$id){
        Student::find($id)->update([
            'class_id'=>$request->class_id,
            'academic_id'=>$request->academic_id,
            'name'=>$request->name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'admission_date'=>$request->admission_date,
            'dob'=>$request->dob,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Student Updated Successfully');
    }
    public function delete_student($id)
    {
        Student::find($id)->delete();
        return back()->with('delete','Student Deleted Successfully');
    }
}
