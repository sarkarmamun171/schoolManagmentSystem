<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.announcement.index');
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
            'message'=>'required',
            'type'=>'required',
        ]);
        Announcement::insert([
            'message'=>$request->message,
            'type'=>$request->type,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Announcement Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        $announcements = Announcement::all();
        return view('admin.announcement.show',[
            'announcements'=>$announcements,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $announcements = Announcement::find($id);
        return view('admin.announcement.edit',[
            'announcements'=>$announcements,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'message'=>'required',
            'type'=>'required',
        ]);
        Announcement::find($id)->update([
            'message'=>$request->message,
            'type'=>$request->type,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Announcement Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Announcement::find($id)->delete();
        // return back()-with('delete','Announcement Deleted Successfully');
    }
}
