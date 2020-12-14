<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddresses;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\OrdersExport;
use App\Exports\OrderMSelected;
use App\Exports\OrderYSelected;

class OrderController extends Controller
{
    //admin order
    public function viewOrders(Request $request){
        $orders = Orders::with('orders')->where('order_status','new')->get();
        return view('Backend.order_management')->with(compact('orders'));
    }
    public function pendingOrders(Request $request){
        $orders = Orders::with('orders')->where('order_status','pending')->get();
        return view('Backend.order_management')->with(compact('orders'));
    }
    public function deliveredOrders(Request $request){
        $orders = Orders::with('orders')->where('order_status','delivered')->get();
        return view('Backend.order_management')->with(compact('orders'));
    }
    public function completedOrders(Request $request){
        $orders = Orders::with('orders')->where('order_status','completed')->get();
        return view('Backend.order_management')->with(compact('orders'));
    }
    public function updateOrderStatus(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            Orders::where('id',$id)->Update([
                'order_status'=>$data['status'],
            ]);

            $orders= Orders::where('id',$id)->first();
            $user_id = $orders->user_id;
            $userDetail = User::where('id',$user_id)->first();
            $userDetail = json_decode(json_encode($userDetail),true);
            $shippingDetails= DeliveryAddresses::where('user_id',$user_id)->first();
            $shippingDetails = json_decode(json_encode($shippingDetails),true);
            $email = $orders->user_email;
            $messageData = [
                'email'=>$email,
                'orders'=>$orders,
                'userDetail'=>$userDetail,
                'shippingDetail'=>$shippingDetails,
            ];
            Mail::send('emails.order-status',$messageData,function ($message) use ($email){
                $message->to($email)->subject('Your order status - E-commerce Website');
            });
            return redirect('admin/view-orders')->with('status','Order Status Updated!!!');
        }
        $orders = Orders::where('id',$id)->first();
        return view('Backend.update-order-status')->with(compact('orders'));
    }
    public function export(Request $request){
         request()->validate([
            'date'=>'required',
        ]);
        return Excel::download(new OrdersExport($request->date), 'OrderDateWise_'.$request->date.'.xlsx');
    }
    public function export_byMonth(Request $request){
        return Excel::download(new OrderMSelected($request->month, $request->year), 'OrderMonthly_'.$request->month.'_'.$request->year.'.xlsx');
    }
    public function export_byYear(Request $request){
        return Excel::download(new OrderYSelected($request->year), 'orderYearly_'.$request->year.'.xlsx');
    }
}
