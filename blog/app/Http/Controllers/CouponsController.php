<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CouponsExport;
use App\Exports\CouponMSelected;
use App\Exports\CouponYSelected;


class CouponsController extends Controller
{
    public function index(){
        return view('Backend.coupon.addCoupon');
    }
    public function store(Request $request){
        if($request->isMethod('post')) {
            $data = request()->validate([
                'coupon_code'=>'required',
                'amount'=>'required',
                'amount_type'=>'required',
                'expiry_date'=>'required',
                
            ]);
            $data = $request->all();
            $coupon = new Coupons;
            $coupon->coupon_code = $data['coupon_code'];
            $coupon->amount = $data['amount'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->save();
            return  redirect('/admin/view-coupons');
        }
        
    }
    public function viewCoupons(){
        $coupons = Coupons::get();
        return view('Backend.coupon.coupons')->with(compact('coupons'));
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
            return redirect('/admin/view-coupons')->with('status','Coupon has base64_encode(data)en edited successful');
        }

        $coupons = Coupons::where(['id'=>$id])->first();
        return view('Backend.coupon.editCoupon')->with(compact('coupons'));
    }
    public function updateStatus(Request $request, $id=null){
        $data = $request->all();
        // echo "<pre>";print_r($data);die();
        Coupons::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
    public function export(Request $request){
        return Excel::download(new CouponsExport($request->date), 'CouponDateWise_'.$request->date.'.xlsx');
    }
    public function export_byMonth(Request $request){
        return Excel::download(new CouponMSelected($request->month, $request->year), 'CouponMonthly_'.$request->month.'_'.$request->year.'.xlsx');
    }
    public function export_byYear(Request $request){
        return Excel::download(new CouponYSelected($request->year), 'CouponYearly_'.$request->year.'.xlsx');
    }
}
