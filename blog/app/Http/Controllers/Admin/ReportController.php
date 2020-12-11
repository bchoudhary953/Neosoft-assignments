<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\User;
use App\Models\Coupons;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportController extends Controller
{
    public function index(){
        return view('Backend.report.search');
    }
    public function checkReport(Request $request){
        if ($request->date){
            $data = $request->all();
           // dd($data['date']);
            $date =date('d-m-Y',strtotime($data['date']));
            $orders = Orders::where('created_at',$data['date'])->get();
            $sum = Orders::where('created_at',$data['date'])->sum('grand_total');
            return view('Backend.report.sales_result')->with(compact('sum','orders','date'));
        }elseif ($request->month && $request->year){
            $month  = $request->month;
            $year = $request->year ;
           // $orders = Orders::where('id',1)->first();
            $orders = Orders::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)->get();
            $sum = Orders::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month) ->sum('grand_total');
            return view('Backend.report.sales_result')->with(compact('sum','orders','year','month'));

        }else{
            $year = $request->year ;
            // $orders = Orders::where('id',1)->first();
            $orders = Orders::whereYear('created_at', '=', $year)->get();
            $sum = Orders::whereYear('created_at', '=', $year)->sum('grand_total');
            return view('Backend.report.sales_result')->with(compact('sum','orders','year'));

        }
    }
    public function searchRegisteredUser(){
        return view('Backend.report.search_registeredUser');
    }
   
    public function checkRegisteredUserReport(Request $request){
        if ($request->date){
            $data = $request->all();
           // dd($data['date']);
            $date =date('d-m-Y',strtotime($data['date']));
            $users = User::where('created_at',$data['date'])->get();
           // $sum = User::where('created_at',$data['date'])->sum('grand_total');
            return view('Backend.report.customerRegistered_result')->with(compact('users','date'));
        }elseif ($request->month && $request->year){
            $month  = $request->month;
            $year = $request->year ;
            // $orders = Orders::where('id',1)->first();
            $users = User::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)->get();
          //  $sum = Orders::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month) ->sum('grand_total');
            return view('Backend.report.customerRegistered_result')->with(compact('users','year','month'));

        }else{
            $year = $request->year ;
            // $orders = Orders::where('id',1)->first();
            $users = User::whereYear('created_at', '=', $year)->get();
          //  $sum = Orders::whereYear('created_at', '=', $year)->sum('grand_total');
            return view('Backend.report.customerRegistered_result')->with(compact('users','year'));

        }
    }
    public function searchUsedCoupon(){
        return view('Backend.report.search_usedCoupon');
    }
    public function checkUsedCoupon(Request $request){
        if ($request->date){
            $data = $request->all();
            // dd($data['date']);
            $date =date('d-m-Y',strtotime($data['date']));
            $coupons = Coupons::where(['created_at'=>$data['date'],'used'=>"USED"])->get();
            // $sum = User::where('created_at',$data['date'])->sum('grand_total');
            return view('Backend.report.couponUsed_result')->with(compact('coupons','date'));
        }elseif ($request->month && $request->year){
            $month  = $request->month;
            $year = $request->year ;
            // $orders = Orders::where('id',1)->first();
            $coupons = Coupons::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)->where(['used'=>"USED"])->get();
            //  $sum = Orders::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month) ->sum('grand_total');
            return view('Backend.report.couponUsed_result')->with(compact('coupons','year','month'));

        }else{
            $year = $request->year ;
            // $orders = Orders::where('id',1)->first();
            $coupons = Coupons::whereYear('created_at', '=', $year)->where(['used'=>"USED"])->get();
            //  $sum = Orders::whereYear('created_at', '=', $year)->sum('grand_total');
            return view('Backend.report.couponUsed_result')->with(compact('coupons','year'));

        }
    }
}
