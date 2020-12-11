<?php

namespace App\Console\Commands;

use App\Mail\ReminderEmailDigest;
use App\Mail\WeeklyReminder;
use App\Models\User;
use App\Models\wishlist;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class wishlistReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:wishlist';

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
        $wishlists = \App\Models\wishlist::orderBy('user_id')->get();
        $data = [];
        foreach ($wishlists as $wishlist) {
            $data[$wishlist->user_id][] = $wishlist->toArray();
        }
        foreach ($data as $userId =>$wishlists){
            $this->sendEmailTo($userId,$wishlists);
        }


    }
    public function sendEmailTo($userId, $wishlists){
        $user = User::where('user_type','admin')->first();
        Mail::to($user)->send(new  WeeklyReminder($wishlists));
    }
}
