<?php

namespace App\Http\Controllers;

use App\Models\Academic_year;
use App\Models\Classe;
use App\Models\Fee_structure;
use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
    public function fee_str_add(){
        $classes = Classe::all();
        $academicyears = Academic_year::all();
        $feeheads = FeeHead::all();
        return view('admin.fee-structure.fee_structure_add',[
            'classes'=>$classes,
            'academicyears'=>$academicyears,
            'feeheads'=>$feeheads,
        ]);
    }
    public function fee_str_store(Request $request){
       $request->validate([
            'class_id'=>'required',
            'academic_id'=>'required',
            'fee_head_id'=>'required',
       ]);
       Fee_structure::insert([
        'class_id'=>$request->class_id,
        'academic_id'=>$request->academic_id,
        'fee_head_id'=>$request->fee_head_id,
        'april'=>$request->april,
        'may'=>$request->may,
        'june'=>$request->june,
        'july'=>$request->july,
        'august'=>$request->august,
        'september'=>$request->september,
        'october'=>$request->october,
        'november'=>$request->april,
        'december'=>$request->december,
        'january'=>$request->january,
        'february'=>$request->february,
        'march'=>$request->march,
       ]);
       return back()->with('success','Fee Structure Added');
    }
    public function fee_str_list(){
        $classes = Classe::all();
        $academicyears = Academic_year::all();
        $fee_structures = Fee_structure::all();
        return view('admin.fee-structure.fee_structure_list',[
            'fee_structures'=>$fee_structures,
            'classes'=>$classes,
            'academicyears'=>$academicyears,
        ]);
    }
    public function fee_str_edit($id){
        $fee_structures = Fee_structure::find($id);
        $classes = Classe::all();
        $academicyears = Academic_year::all();
        $feeheads = FeeHead::all();
        return view('admin.fee-structure.fee_structure_edit',[
            'fee_structures'=>$fee_structures,
            'classes'=>$classes,
            'academicyears'=>$academicyears,
            'feeheads'=>$feeheads,
        ]);
    }
    public function fee_str_update(Request $request,$id){
        Fee_structure::find($id)->update([
            'class_id'=>$request->class_id,
            'academic_id'=>$request->academic_id,
            'fee_head_id'=>$request->fee_head_id,
            'april'=>$request->april,
            'may'=>$request->may,
            'june'=>$request->june,
            'july'=>$request->july,
            'august'=>$request->august,
            'september'=>$request->september,
            'october'=>$request->october,
            'november'=>$request->april,
            'december'=>$request->december,
            'january'=>$request->january,
            'february'=>$request->february,
            'march'=>$request->march,
        ]);
        return back()->with('update','Fee Structure Updated Successfully');
    }
    public function fee_str_delete($id){
        Fee_structure::find($id)->delete();
        return back()->with('delete','Fee Structure Deleted Successfully');
    }
}
