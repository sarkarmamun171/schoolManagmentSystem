<?php

namespace App\Http\Controllers;

use App\Models\Academic_year;
use App\Models\Announcement;
use App\Models\Classe;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function student_login(){
        return view('admin.student.login');
    }
    public function student_authenticate(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role != 'student') {
                Auth::logout();
                return redirect()->route('student.login')->with('error', 'Unautherise User.Access Denied');
            }
            return redirect()->route('student.dashboard');
        }else{
            return redirect()->route('student.login')->with('fail', 'Something Wrong');
        }
    }
    public function student_dashboard(){
        $announcements = Announcement::where('type','student')->latest()->limit(1)->get();
        // dd( $announcements);
        return view('admin.student.student_dashboard',[
            'announcements'=>$announcements,
        ]);
    }
    public function student_logout(){
        Auth::logout();
        return back();
    }
    public function student_changepassword(){
        return view('admin.student.changepassword');
    }
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
