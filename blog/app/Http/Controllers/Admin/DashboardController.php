<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserYSelected;
use App\Exports\UserMSelected;
use App\Exports\UsersExport;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('Backend.users.addUser');
    }
    public function store(Request $request){
        if($request->isMethod('post')) {
            $data = request()->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required',
                'user_type'=>'required',
            ]);

            $data = $request->all();
            //dd($data);
            $users = new User;
            $users->first_name = $data['first_name'];
            $users->last_name = $data['last_name'];
            $users->email = $data['email'];
            $users->password = bcrypt($data['password']);
            $users->user_type = $data['role'];
            $users->save();
            return redirect('/user_management')->with('status','User added successfully');
        }
       
        
    }
    public function registered()
    {
        $users = User::all();
        return view('Backend.users.user_management')->with('users',$users);
    }
    public function registeredit(Request $request, $id){
        $users = User::findorfail($id);
        return view('Backend.users.form')->with('users',$users);
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
    public function updateStatus(Request $request, $id=null){
        $data = $request->all();
        User::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
    public function export(Request $request){
        return Excel::download(new UsersExport($request->date), 'UserDateWise_'.$request->date.'.xlsx');
    }
    public function export_byMonth(Request $request){
        return Excel::download(new UserMSelected($request->month, $request->year), 'UserMonthly_'.$request->month.'_'.$request->year.'.xlsx');
    }
    public function export_byYear(Request $request){
        return Excel::download(new UserYSelected($request->year), 'UserYearly_'.$request->year.'.xlsx');
    }
}
