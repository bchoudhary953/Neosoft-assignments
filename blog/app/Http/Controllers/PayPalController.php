<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    public function payment()
    {
        $user_email= Auth::user()->email;
        $carts = DB::table('cart')->where('user_email',$user_email)->get();
        $data = [];
        $data['items'] = [];
            foreach ($carts as $cart) {
                $itemDetail = [
                    'name' => $cart->product_name,
                    'price' => $cart->price,
                    'code' => $cart->code,
                    'qty' => $cart->quantity,
                ];
                $data['items'][] = $itemDetail;
            }

        $data['invoice_id'] = uniqid();
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('order-review');
        $total =0;
        foreach ($data['items'] as $item){
            $total+=$item['price']*$item['qty'];
        }
        $data['total'] = $total;
       // dd($data);

       // dd($cart);
        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);
      //  $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
       // dd($request->all());
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Your payment was successfully. You can create success page here.');
        }

        dd('Something is wrong.');
    }
    public function pay(Request $request){
        $ordered=[];
        $ordered['items'] = [
            [
                'name'=>'laravel',
                'price'=>120,
                'des'=>"Laravel book",
                'qty'=>1,
            ]
        ];
        $ordered['invoice_id'] = uniqid();
        $ordered['invoice_description'] = "order #{$ordered['invoice_id']} Billing";
        $ordered['return_url'] = route('');
        $ordered['cancel_url'] = route('');
        $ordered['total'] = 1200;
        $paypal = new ExpressCheckout;

    }
}
