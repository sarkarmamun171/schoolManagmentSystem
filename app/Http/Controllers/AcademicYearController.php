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
        return view('admin.academic-year.academic_list');
    }
}
