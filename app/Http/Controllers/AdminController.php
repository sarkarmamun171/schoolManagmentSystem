<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('admin')->user()->role != 'admin') {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'Unautherise User.Access Denied');
            }
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Something Wrong');
        }
    }
    public function register()
    {
        $user = new User();
        $user->name = 'Student';
        $user->email = 'student@gmail.com';
        $user->role = 'student';
        $user->password = Hash::make('student');
        $user->save();

        return redirect()->route('admin.login')->with('success', 'User created Successfully');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out Successfully');
    }
    public function dashboard()
    {
        return view('admin.dsahboard');
    }
    public function form()
    {
        return view('admin.form');
    }
    public function table()
    {
        return view('admin.table');
    }
}
