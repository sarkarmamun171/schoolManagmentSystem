<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function add_class(){
        return view('admin.class.class_add');
    }
    public function store_class(Request $request){
        $request->validate([
            'class_name'=>'required',
        ]);
        Classe::insert([
            'class_name'=>$request->class_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('added','Classes Added Successfully');
    }
    public function class_list(){
        $classes = Classe::all();
        return view('admin.class.class_list',[
            'classes'=>$classes,
        ]);
    }
    public function class_edit($id){
        $classes = Classe::find($id);
        return view('admin.class.class_edit',[
            'classes'=>$classes,
        ]);

    }
    public function class_update(Request $request,$id){
        $request->validate([
            'class_name'=>'required',
        ]);
        Classe::find($id)->update([
            'class_name'=>$request->class_name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Classes Updated Successfully');
    }
    public function class_delete($id){
        Classe::find($id)->delete();
        return back()->with('success','Classes Deleted Successfully');
    }
}
