<?php

namespace App\Http\Controllers;

use App\Models\contactUs;
use App\Models\User;
use App\Models\Orders;
use App\Models\Coupons;
use App\Models\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Session;
use Illuminate\Support\Facades\DB;
use App\Charts\SalesChart;
class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        $userCount = User::where('status',1)->count();
        $ordersCount = Orders::count();
        $deliveredOrder = Orders::where('order_status','delivered')->count();
        $couponCount = Coupons::count();

        /*$charts = new SalesChart;
        $charts->labels(['One','Two','Three']);
        $charts->dataset('Sales', 'line' ,[1, 2, 3]);*/

        $groups = DB::table('orders')
                  ->select('created_at', DB::raw('count(*) as total'))
                  ->groupBy('created_at')
                  ->pluck('total', 'created_at')->all();
        // Generate random colours for the groups
        for ($i=0; $i<=count($groups); $i++) {
                    $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
                }
        // Prepare the data for returning with the view
        $chart = new Chart;
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = $colours;
        //dd($chart);die;

        $data = DB::table('orders_products')
                  ->select(DB::raw('product_name as prroducts'), DB::raw('count(*) as number'))
                  ->groupBy('product_name')->get();
        $array[] = ['Course','Number'];
        foreach ($data as $key => $value) {
            # code...
            $array[++$key] = [$value->prroducts,$value->number];
        }
        $salesGraph = DB::select('select month(created_at) as month, sum(grand_total) as total_amount from orders  group by year(created_at),month(created_at) ');
        foreach ($salesGraph as $key => $value) {
            $salesGraph[$key]->month = date('F', mktime(0, 0, 0, $value->month, 10));
        }
        return view('Backend.dashboard',compact('userCount','ordersCount','deliveredOrder','couponCount','salesGraph'))->with('course', json_encode($array));


    }
    public function login(Request $request){
        if(Auth::check())
            return redirect()->back()->with('status','You are already Logged in!!!');
        else{
            if ($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'user_type'=>
                ['admin','superadmin','inventory_manager','order_manager']])){
                \Illuminate\Support\Facades\Session::put('adminSession',$data['email']);
                return redirect('/admin/dashboard');
            }
            else{
                return redirect('/admin')->with('status','Error');
            }
        }

        return view('Backend.login');
        }
    }
    public function logout(Request $request){
        \Illuminate\Support\Facades\Session::forget('adminSession');
        \Illuminate\Support\Facades\Session::forget('session_id');

        Auth::logout();
        return redirect('/admin')->with('status','Loged out successfully');
    }
    public function contactUs(Request $request){
        $messages = contactUs::get();
        return view('Backend.contact-us')->with(compact('messages'));
    }
    public function queryResponse(Request $request,$id){
        if($request->isMethod('post')){
            $data = $request->all();
            contactUs::where('id',$id)->Update([
                'response'=>$data['response'],
            ]);
            $user= contactUs::where('id',$id)->first();
            $email = $user->email;
            $messageData = [
                'email'=>$email,
                'user'=>$user,
            ];
            Mail::send('emails.response',$messageData,function ($message) use ($email){
                $message->to($email)->subject('Response to your query - E-commerce Website');
            });
            return redirect('admin/contact-us')->with('status','Response Saved!!!');
        }
        $messages = contactUs::where('id',$id)->first();
        return view('Backend.query-response')->with(compact('messages'));
    }
}
