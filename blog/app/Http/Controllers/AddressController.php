<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function addAddress(Request $request, $id){
        $user= User::with('addresses')->where(['id'=>$id])->first();
        if($request->isMethod('post')) {
            $data = $request->all();
            /*echo "<pre>";
            print_r($data);
            die;*/
            foreach ($data['address1'] as $key=>$val){
                if (!empty($val)){
                    //prevent duplicate SKU record, $id=null
                    $addrCountAddress1 = Addresses::where('address1',$val)->count();
                    if($addrCountAddress1>0){
                        return redirect('/add-address/'.$id)->with('status','Address1 is already exist please select another sku');
                    }
                    //prevent duplicate SIZE record
                    $addrCountAddress2 = Addresses::where(['user_id'=>$id,'address2'=>$data['address2'][$key]])->count();
                    if($addrCountAddress2>0) {
                        return redirect('/add-address/'.$id)->with('status',''.$data['address2'][$key].'Address2 already exist please select another size');
                    }
                    $address = new Addresses();
                    $address->address1 = $val;
                    $address->address2 = $data['address2'][$key];
                    $address->pin_code = $data['pin_code'][$key];
                    $address->state = $data['state'][$key];
                    $address->country = $data['country'][$key];
                    $address->save();
                }
            }
            return redirect('/add-address/'.$id)->with('status','Address added successfully');
        }
        return view('Frontend.users.address')->with(compact('user'));
    }
    public function deleteAddress($id){
        Addresses::where(['id'=>$id])->delete();
        return redirect()->back()->with('status','Address is deleted!!!');
    }
    public function editAddress(Request $request, $id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            foreach($data['addr'] as $key=>$addr){
                Addresses::where(['id'=>$data['addr'][$key]])->update(['address1'=>$data['address1'][$key],'address2'=>$data['address2'][$key],
                    'pin_code'=>$data['pin_code'][$key],'state'=>$data['state'][$key],'country'=>$data['country'][$key]]);
            }
            return redirect()->back()->with('status','Address Updated');
        }
    }
}

