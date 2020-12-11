<?php

namespace App\Console\Commands;

use App\Mail\ReminderEmailDigest;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendRemainderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $orders = \App\Models\Orders::orderBy('user_id')->where('created_at', now()->format('Y-m-d'))->get();
        $data = [];
        foreach ($orders as $order) {
            $data[$order->user_id][] = $order->toArray();
        }
        foreach ($data as $userId =>$orders){
            $this->sendEmailToUser($userId,$orders);
        }
    }
    public function sendEmailToUser($userId, $orders){
        //$user =  config::first();
        //$email1 = $admin->notification_email;
        $user = User::where('user_type','admin')->first();
        Mail::to($user)->send(new  ReminderEmailDigest($orders));
    }
}
