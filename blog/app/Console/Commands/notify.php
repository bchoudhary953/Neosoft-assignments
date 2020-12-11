<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\wishlist;
use App\Notifications\Orders;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email notify for all user every day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $date= date('d-m-Y');
        $orders = \App\Models\Orders::orderBy('user_id')->first();
        /* $data = [];
          foreach ($orders as $order){
              $data[$order->user_id][] = $order->toArray();
          }*/
        // dd($data[54]->id);
        $order_id = $orders->id;
        //dd($order_id);
        $user_id= $orders->user_id;
        $user_name = $orders->name;
        $total = $orders->grand_total;
        $payment_method = $orders->payment_method;
        $order_status = $orders->order_status;
        // dd($order_id);
        $messageData = [
            'order_id'=>$order_id,
            'user_id'=>$user_id,
            'total'=>$total,
            'payment_method'=>$payment_method,
            'order_status'=>$order_status,
            'user_name'=>$user_name,
        ];
        //   dd( $messageData['order']);

        $admin = User::where('user_type','admin')->first();
        $email1 = $admin->email;
        Mail::send('Frontend.email.mailDailyOrders',$messageData,function ($message) use ($email1){
            $message->to($email1)->subject('Order placed Today - E-commerce Website');
        });
    }
}
