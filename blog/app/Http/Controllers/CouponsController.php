<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function addCoupon(Request $request){
        if($request->isMethod('post')) {
            $data = $request->all();
            $coupon = new Coupons;
            $coupon->coupon_code = $data['coupon_code'];
            $coupon->amount = $data['amount'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->save();
            return  redirect('/admin/view-coupons');
        }
        return view('Backend.coupon.addCoupon');
    }
    public function viewCoupons(){
        $coupons = Coupons::get();
        return view('Backend.coupon.coupons')->with(compact('coupons'));
    }
    public function updateStatus(Request $request,$id){
        $data=$request->all();
        Coupons::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
    public function deleteCoupon($id){
        Coupons::where(['id'=>$id])->delete();
        return redirect()->back()->with('status','Coupon Deleted');
    }
    public function editCoupon(Request $request, $id){
        if ($request->isMethod('post')){
            $data = $request->all();
            Coupons::where('id',$id)->update([
                'coupon_code'=>$data['coupon_code'],
                'amount'=>$data['amount'],
                'amount_type'=>$data['amount_type'],
                'expiry_date'=>$data['expiry_date'],
            ]);
            return redirect('/admin/view-coupons')->with('status','Coupon has been edited successful');
        }

        $coupons = Coupons::where(['id'=>$id])->first();
        return view('Backend.coupon.editCoupon')->with(compact('coupons'));
    }
}
