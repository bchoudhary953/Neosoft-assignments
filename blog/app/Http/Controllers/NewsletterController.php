<?php

namespace App\Http\Controllers;

//use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
//use Spatie\Newsletter\Newsletter;
use Newsletter;
//use Spatie\Newsletter\Newsletter;

class NewsletterController extends Controller
{

    public function store(Request $request)
    {
    	//dd(Newsletter::isSubscribed($request->subscriber_email));
    	
        if ( !  Newsletter::isSubscribed($request->subscriber_email) ) {
            Newsletter::subscribe($request->subscriber_email);

            return redirect()->back()->with('status','Subscribed successfully.Thanks for subscription!!!');
        }
        return redirect()->back()->with('status','You are already subscribed');
    }


}
