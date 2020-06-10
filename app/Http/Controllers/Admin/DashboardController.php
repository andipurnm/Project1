<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registered()
    {
        $users = User::all();
        return view('admin.register')->with('user',$users);
    }

    public function registeredit(request $request,$id)
    {
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users',$users);
    }

    public function registerupdate(request $request,$id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->update();

        return redirect('/role-register')->with('status','Data telah  terupdated');
    }

    public function registerdelete($id)
    {
        $users =User::findOrFail($id);
        $users->delete();

        return redirect('/role-register')->with('status','Data telah  terhapus');
    }
}
