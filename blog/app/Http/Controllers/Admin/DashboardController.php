<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function registered()
    {
        $users = User::all();
        return view('Backend.user_management')->with('users',$users);
    }
    public function registeredit(Request $request, $id){
        $users = User::findorfail($id);
        return view('Backend.form')->with('users',$users);
    }
    public function registerupdate(Request $request, $id){
        $users = User::find($id);
        $users->first_name = $request->input('first_name');
        $users->last_name = $request->input('last_name');
        $users->user_type = $request->input('role');
        $users->status = $request->input('status');
        $users->update();
        return redirect('/user_management')->with('status','Your data is updated');
    }
    public function registerdelete($id){
        $users = User::findorfail($id);
        $users->delete();
        return redirect('/user_management')->with('status','Your data is deleted');
    }
    public function updateStatus(Request $request, $id){
        $data = $request->all();
        User::where('id',$id)->update(['status'=>$data['status']]);
    }
}
