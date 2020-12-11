<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\config;

class ConfigController extends Controller
{
    
    public function configs(){
        $config = config::get();
        return view('Backend.config.configs')->with(compact('config'));
    }
    public function index(){
        return view('Backend.config.addConfigs');
    }
    public  function store(Request $request){
        if($request->isMethod('post')){
            $data= request()->validate([
                'admin_email' => 'required|email',
                'notification_email' => 'required|email',
            ]);
            $data =$request->all();
            $config = new config;
            $config->admin_email = $data['admin_email'];
            $config->notification_email = $data['notification_email'];
            $config->save();
            return redirect('/config_management')->with('status','Configuration has been updated successfully!!');
        }
    }
    public function deleteConfigs($id){
        config::where(['id'=>$id])->delete();
        return redirect()->back()->with('status','Configuration Deleted');
    }
    public function editConfigs(Request $request, $id){
        if ($request->isMethod('post')){
            $data = $request->all();
            config::where('id',$id)->update([
                'admin_email'=>$data['admin_email'],
                'notification_email'=>$data['notification_email'],
                ]);
            return redirect('/config_management')->with('status','Configuration has been edited successful');
        }

        $config = config::where(['id'=>$id])->first();
        return view('Backend.config.editConfigs')->with(compact('config'));
    }
  
}
