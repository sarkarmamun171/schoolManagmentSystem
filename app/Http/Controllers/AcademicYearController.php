<?php

namespace App\Http\Controllers;

use App\Models\Academic_year;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index(){
        return view('admin.academic-year.index');
    }
    public function store(Request $request){
       $request->validate([
        'name'=>'required',
       ]);
       Academic_year::insert([
        'name'=>$request->name,
        'created_at'=>Carbon::now(),
       ]);
       return back()->with('success','Data Inserted');
    }
    public function list(){
        $academicyears = Academic_year::all();
        return view('admin.academic-year.academic_list',[
            'academicyears'=>$academicyears,
        ]);
    }
    public function edit($id){
        $academics = Academic_year::find($id);
        return view('admin.academic-year.academic_edit',[
            'academics'=>$academics,
        ]);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
        ]);
        Academic_year::find($id)->update([
            'name'=>$request->name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Academic Year Updated Successfully');

    }
}
