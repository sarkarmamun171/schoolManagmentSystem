<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subject.subject_index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject'=>'required',
            'type'=>'required'
        ]);
        Subject::insert([
             'subject'=>$request->subject,
            'type'=>$request->type,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Subject added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        $subjects = Subject::all();
        return view('admin.subject.subject_list',[
            'subjects'=>$subjects,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subjects = Subject::find($id);
        return view('admin.subject.subject_edit',[
            'subjects'=>$subjects,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject'=>'required',
            'type'=>'required'
        ]);
        Subject::find($id)->update([
             'subject'=>$request->subject,
            'type'=>$request->type,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Subject updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Subject::find($id)->delete();
        return back()->with('delete','Subject deleted Successfully');
    }
}
