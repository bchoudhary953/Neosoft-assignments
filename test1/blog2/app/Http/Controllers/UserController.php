<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class UserController extends Controller
{
	public function index(Request $request){
		return view('addUser');
	}
   public function store(Request $request){
    	if($request->isMethod('post')){
           
            $data = request()->validate([
            	'first_name'=>'required',
            	'last_name'=>'required',
            	'email'=>'required|unique:tests|email',
            	'mobile_no'=>'required|unique:tests|max:14',
            	'city'=>'required',
            	'gender'=>'required',
            	'profile_photo'=>'required|image|mimes:png,jpg|max:2048',
            ]);

            
            //dd($data);
            $user = new Test;
            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->mobile_no = $data['mobile_no'];
            $user->city = $data['city'];
            $user->gender = $data['gender'];
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = rand(111,99999).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/user/');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $user->profile_photo = $name;
            }
            $user->save();
            return redirect('/view-users')->with('status','User has been added successfully!!');
        }
        

    }
     public function viewUsers(Request $request){
     	$user = Test::get();
    	return view('user_list')->with(compact('user'));
    }
    public function editUser(Request $request, $id){
    	 if ($request->isMethod('post')){
            $data = $request->all();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = rand(111, 99999) . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/upload/user/');
                $imagePath = $destinationPath . "/" . $name;
                $image->move($destinationPath, $name);
            }
            else if(!empty($data['current_image'])){
                $fileName= $data['current_image'];
            }
            else{
                $fileName="";
            }
            Test::where('id',$id)->update([
                'first_name'=>$data['first_name'],
                'last_name'=>$data['last_name'],
                'email'=>$data['email'],
                'gender'=>$data['gender'],
                'city'=>$data['city'],
                'mobile_no'=>$data['mobile_no'],
              
                'profile_photo'=>$fileName,
                ]);
            return redirect('/view-users')->with('status','User has been edited successful');
        }

        $user = Test::where(['id'=>$id])->first();
        return view('edit_user')->with(compact('user'));
    }
    public function updateStatus(Request $request, $id=null){
        $data = $request->all();
      // echo "<pre>";print_r($data);die();
        Test::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
    
}
