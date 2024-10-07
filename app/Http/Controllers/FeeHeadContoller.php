<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FeeHeadContoller extends Controller
{
    public function feehead_add(){
        return view('admin.FeeHead.FeeHead_add');
    }
    public function feehead_store(Request $request){
        $request->validate([
            'feehead_name'=>'required',
        ]);
        FeeHead::insert([
            'feehead_name'=>$request->feehead_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Fee Head Added Successfully');
    }
    public function feehead_list(){
        $fees =FeeHead::all();
        return view('admin.FeeHead.FeeHead_list',[
            'fees'=>$fees,
        ]);
    }
    public function feehead_edit($id){
        $fees = FeeHead::find($id);
        return view('admin.FeeHead.FeeHead_edit',[
           'fees'=>$fees,
        ]);
    }
    public function feehead_update(Request $request,$id){
        $request->validate([
            'feehead_name'=>'required',
        ]);
        FeeHead::find($id)->update([
            'feehead_name'=>$request->feehead_name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Fee Updated Successfully');
    }
    public function feehead_delete($id){
        FeeHead::find($id)->delete();
        return back()->with('success','Fee Deleted Successfully');
    }
}
