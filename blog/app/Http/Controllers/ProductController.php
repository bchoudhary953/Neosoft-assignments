<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Models\Addresses;
use App\Models\config;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Coupons;
use App\Models\DeliveryAddresses;
use App\Models\Orders;
use App\Models\OrdersProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductsAttributes;
use App\Models\User;
use App\Models\country;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    public function index(){
       $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='0' selected disabled>Select</option>";
        foreach ($categories as $cat){
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories= Category::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat){
                $categories_dropdown.="<option value='".$sub_cat->id."'>&nbsp;--&nbsp".$sub_cat->name."</option>";
            }
        }
        return view('Backend.product.addProduct')->with(compact('categories_dropdown'));

    }
    public function store(Request $request){
        if($request->isMethod('post')) {
            $data = $request->all();
            $data = request()->validate([
              'category_id' => 'required|not_in:0',
              'product_name' => 'required',
              'code' => 'required',
              'description' => 'required',
              'color' => 'required',
              'price' => 'required',
              'image' => 'required|image|mimes:png,jpeg,jpg|max:2048',
            ]);
            $product = new Product;
            //$product_image = new ProductImage;
            $product->category_id = $data['category_id'];
            $product->name = $data['product_name'];
            $product->code = $data['code'];
            $product->description = $data['description'];
            $product->color = $data['color'];
            $product->price = $data['price'];
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = rand(111,99999).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/product/');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $product->image = $name;
            }
            $product->save();
           // $product_image->save();
            return redirect('/admin/view-products')->with('status','Product added successfully');
        }
        //categories dropdown
       
    }
    public function viewProducts(){
        $product = Product::get();
      //  $product_image = ProductImage::get();
        return view('Backend.product.products')->with(compact('product'));
    }
    public function deleteProduct($id){
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('status','Product Deleted');
    }
    public function editProduct(Request $request, $id){
        
        if ($request->isMethod('post')){
            $data = $request->all();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = rand(111, 99999) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/product/');
                $imagePath = $destinationPath . "/" . $name;
                $image->move($destinationPath, $name);
            }
            else if(!empty($data['current_image'])){
                $fileName= $data['current_image'];
            }
            else{
                $fileName="";
            }
            Product::where('id',$id)->update([
                'name'=>$data['product_name'],
                'category_id'=>$data['category_id'],
                'code'=>$data['code'],
                'color'=>$data['color'],
                'description'=>$data['description'],
                'price'=>$data['price'],
                'image'=>$fileName,
            ]);
            return redirect('/admin/view-products')->with('status','Product has been edited successful');
        }

        $product = Product::where(['id'=>$id])->first();
      //  $product_image = ProductImage::where(['id'=>$id])->first();

        //categories dropdown
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as $cat){
            if($cat->id == $product->category_id){
                $selected="selected";
            }else{
                $selected="";
            }
            $categories_dropdown.="<option value='".$cat->id."'".$selected.">".$cat->name."</option>";
        }
        $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
        foreach ($sub_categories as $sub_cat){
            if($cat->id == $product->category_id){
                $selected="selected";
            }else{
                $selected="";
            }
            $categories_dropdown.="<option value='".$sub_cat->id."'".$selected.">&nbsp;--&nbsp".$sub_cat->name."</option>";
        }

        return view('Backend.product.editProduct')->with(compact('product', 'categories_dropdown'));
    }

    public function addAttribute(Request $request, $id){
        if($request->isMethod('post')) {
            $data = $request->all();
            foreach ($data['sku'] as $key=>$val){
                if (!empty($val)){
                    //prevent duplicate SKU record, $id=null
                    $attrCountSKU = ProductsAttributes::where('sku',$val)->count();
                    if($attrCountSKU>0){
                        return redirect('/admin/add-attribute/'.$id)->with('status','SKU is already exist please select another sku');
                    }
                    //prevent duplicate SIZE record
                    $attrCountSIZE = ProductsAttributes::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($attrCountSIZE>0){
                        return redirect('/admin/add-attribute/'.$id)->with('status',''.$data['size'][$key].'size already exist please select another size');
                    }
                    $attribute = new ProductsAttributes;
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }
            }
            return redirect('/admin/add-attribute/'.$id)->with('status','Products attributes added successfully');
        }
        $product= Product::with('attributes')->where(['id'=>$id])->first();
        return view('Backend.product.addAttribute')->with(compact('product'));
    }
    public function deleteAttribute($id){
        ProductsAttributes::where(['id'=>$id])->delete();
        return redirect()->back()->with('status','Product attribute is deleted!!!');
    }
    public function editAttribute(Request $request, $id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();
            foreach($data['attr'] as $key=>$attr){
                ProductsAttributes::where(['id'=>$data['attr'][$key]])->update(['sku'=>$data['sku'][$key],'size'=>$data['size'][$key],
                    'price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
            }
            return redirect()->back()->with('status','Products Attributes Updated');
        }
    }
    public function addCart(Request $request, Product $product){
        $data=$request->all();
      //  echo "<pre>";print_r($data);die;
        if (empty(Auth::user()->email)){
            $data['user_email']='';
        }else{
            $data['user_email']= Auth::user()->email;
        }
        $session_id= \Illuminate\Support\Facades\Session::get('session_id');
        if(empty($session_id)) {
            $session_id = mt_rand(111111, 999999);
            \Illuminate\Support\Facades\Session::put('session_id', $session_id);
        }
        $countProduct = DB::table('cart')->where(['product_id'=>$product->id,'user_email'=>$data['user_email']])->count();
        if ($countProduct>0){
            return redirect()->back()->with('status','Product already exist');
        }
        else {
            DB::table('cart')->insert([
                'product_id' => $product->id,
                'session_id' => $session_id,
                'user_email' => $data['user_email'],
                'product_name' => $product->name,
                'code'=>$product->code,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image,]);
        }
        $carts = DB::table('cart')->where(['session_id'=>$session_id])->get();

        return redirect('/cart')->with(compact('carts'));
    }
    public function cart(Request $request){
        if(Auth::check()){
            $user_email = Auth::user()->email;
            $carts = DB::table('cart')->where(['user_email'=>$user_email])->get();
        }
        else{
            $session_id = \Illuminate\Support\Facades\Session::get('session_id');
            $carts = DB::table('cart')->where(['session_id'=>$session_id])->get();
        }
        $orderSize = 0;
       foreach ($carts as $cart)
           $orderSize += $cart->quantity;
       //echo "<pre>"; print_r($orderSize);die();
       if ($orderSize>500){
           $shippingCost = 50;
           Session::put('ShippingCost', $shippingCost);
       }
       else {
           $shippingCost = 0;
           Session::put('ShippingCost', $shippingCost);
       }
      // echo "<pre>";print_r($cartsCount);die;
        return view('Frontend.cart')->with(compact('carts'));
    }

    public function deleteCart(Request $request,$id){
      DB::table('cart')->where(['id'=>$id])->delete();
      return redirect()->back()->with('status','Cart Deleted');

    }
    public function quantityIncrease(Request  $request, $id){

     DB::table('cart')->where(['id'=>$id])->increment('quantity',1);
      return redirect()->back();
    }
    public function quantityDecrease(Request  $request, $id){
        DB::table('cart')->where(['id'=>$id])->decrement('quantity',1);
        return redirect()->back();
    }
    public function checkout(Request $request){
        $user_id = Auth::user()->id;
        $userDetail = User::where('id',$user_id)->first();
        $first_name = Auth::user()->first_name;
        $user_email = Auth :: user()->email;
       // echo "<pre>";print ($user_id);die();
        $shippingCount = DeliveryAddresses::where('user_id',$user_id)->count();
        $shippingDetails = array();
        if ($shippingCount>0){
            $shippingDetails= DeliveryAddresses::where('user_id',$user_id)->first();
        }
        $addresses = Addresses::where(['user_id' =>$user_id])->get();
        if($request->isMethod('post')) {
            $data = $request->all();
           // echo "<pre>";print_r($data);die();
            if ($shippingCount>0){
            DeliveryAddresses::where('user_id',$user_id)->update(['first_name'=>$data['shipping_first_name'],
                'address1'=>$data['shipping_address1'],'address2'=>$data['shipping_address2'],'pin_code'=>$data['shipping_pin_code'],
                'state'=>$data['shipping_state'],'country'=>$data['shipping_country'],'mobile'=>$data['shipping_mobile_no']]);
            }
            else {
            $shippingAddress = new DeliveryAddresses;
            $shippingAddress->user_id = $user_id;
            $shippingAddress->user_email = $user_email;
            $shippingAddress->address1 = $data['shipping_address1'];
            $shippingAddress->address2 = $data['shipping_address2'];
            $shippingAddress->pin_code = $data['shipping_pin_code'];
            $shippingAddress->state = $data['shipping_state'];
            $shippingAddress->country = $data['shipping_country'];
            $shippingAddress->mobile = $data['shipping_mobile_no'];
            $shippingAddress->first_name = $first_name;
            $shippingAddress->save();
            }
           
            User::where('id',$user_id)->update(['first_name'=>$data['billing_first_name'],
                'address1'=>$data['billing_address1'],'address2'=>$data['billing_address2'],'pin_code'=>$data['billing_pin_code'],
                'state'=>$data['billing_state'],'country'=>$data['billing_country'],'mobile'=>$data['billing_mobile_no']]);
            
        
            return redirect('/order-review');
        }
         $countries = country::get();
      
        return view('Frontend.checkout')->with(compact('addresses','countries','userDetail'));
    }

    //coupon
    public function applyCoupon(Request $request){
      if ($request->isMethod('post')){
          $data = $request->all();
          //echo "<pre>"; print_r($data);die();
          $couponCount = Coupons::where('coupon_code',$data['coupon_code'])->count();
          if($couponCount == 0){
              return redirect()->back()->with('status','Coupon code does not exist');
          }
          else{
            //  echo'success';die;
              $couponDetail = Coupons::where('coupon_code',$data['coupon_code'])->first();
              if ($couponDetail->status==0){
                  return redirect()->back()->with('status','Coupon code is not active');
              }
              $expiry_date = $couponDetail->expiry_date;
              $current_date = date('yy-m-d');
             // echo "<pre>"; print_r($current_date);die();
              if ($current_date > $expiry_date){
                  return redirect()->back()->with('status','Coupon code is expired');
              }
              $session_id = Session::get('session_id');
             // $carts = DB::table('cart')->where(['session_id'=>$session_id])->get();
              if(Auth::check()){
                  $user_email = Auth::user()->email;
                  $carts = DB::table('cart')->where(['user_email'=>$user_email])->get();
              }
              else{
                  $session_id = \Illuminate\Support\Facades\Session::get('session_id');
                  $carts = DB::table('cart')->where(['session_id'=>$session_id])->get();
              }
              $total_amount=0;
              foreach ($carts as $cart){
                  $total_amount += $cart->price * $cart->quantity;
              }
              if($couponDetail->amount_type == "fixed"){
                  $couponAmount = $couponDetail->amount;
                  Coupons::where('coupon_code',$data['coupon_code'])->update(['used'=>'USED']);
              }
              else{
                  $couponAmount = $total_amount * ($couponDetail->amount/100);
                  Coupons::where('coupon_code',$data['coupon_code'])->update(['used'=>'USED']);
              }
              Session::put('CouponAmount',$couponAmount);
              Session::put('CouponCode', $data['coupon_code']);
              return redirect()->back()->with('status','Coupon code is successfully applied. You are Availing Discount.');
          }
      }
    }
    public function orderReview(Request $request){
        $user_id = Auth::user()->id;
       // $first_name = Auth::user()->first_name;
        $user_email = Auth :: user()->email;
        $shippingDetails= DeliveryAddresses::where('user_id',$user_id)->first();
        $userDetail = User::find($user_id);
        if(Auth::check()){
          //  $user_email = Auth::user()->email;
            $carts = DB::table('cart')->where(['user_email'=>$user_email])->get();
        }
        else{
            $session_id = \Illuminate\Support\Facades\Session::get('session_id');
            $carts = DB::table('cart')->where(['session_id'=>$session_id])->get();
        }
      return view('Frontend.review')->with(compact('carts','userDetail','shippingDetails'));
    }
    public function placeOrder(Request $request){
      if ($request->isMethod('post')){
          $data = $request->all();
          $user_id = Auth::user()->id;
          $user_email = Auth :: user()->email;
          $shippingDetails= DeliveryAddresses::where(['user_email'=>$user_email])->first();
          $userDetail = User::find($user_id);
          if (empty(Session::get('CouponCode'))){
              $coupon_code = 'Not Used';
          }else{
              $coupon_code = Session::get('CouponCode');
          }
          if (empty(Session::get('CouponAmount'))){
              $coupon_amount = '0';
          }else{
              $coupon_amount = Session::get('CouponAmount');
          }
          if (empty(Session::get('ShippingCost'))){
              $shipping_cost = '0';
          }else{
              $shipping_cost = Session::get('ShippingCost');
          }
          $order = new Orders;
          $order->user_id = $user_id;
          $order->user_email = $user_email;
          $order->name = $shippingDetails->first_name;
          $order->address1 = $shippingDetails->address1;
          $order->address2 = $shippingDetails->address2;
          $order->pincode = $shippingDetails->pin_code;
          $order->state = $shippingDetails->state;
          $order->country = $shippingDetails->country;
          $order->mobile = $shippingDetails->mobile;
          $order->coupon_code = $coupon_code;
          $order->coupon_amount = $coupon_amount;
          $order->shipping_charges = $shipping_cost;
          $order->order_status = 'New';
          $order->payment_method = $data['payment_method'];
          $order->grand_total = $data['grand_total'];
          $order->save();

          $order_id = DB::getPdo()->lastinsertID();

          $cartProduct = DB::table('cart')->where(['user_email'=>$user_email])->get();

          foreach ($cartProduct as $pro){
              $cartPro = new OrdersProduct;
              $cartPro->order_id = $order_id;
              $cartPro->user_id = $user_id;
              $cartPro->product_id = $pro->product_id;
              $cartPro->product_name = $pro->product_name;
              $cartPro->product_code = $pro->code;
              $cartPro->product_qty = $pro->quantity;
              $cartPro->product_price = $pro->price;
              $cartPro->save();
          }
          Session::put('grand_total',$data['grand_total']);
          Session::put('order_id',$order_id);
         //echo "<pre>";print(Session::get('order_id'));die;
          if ($data['payment_method'] == 'cod'){
              //email start
              $shippingDetails= DeliveryAddresses::where('user_id',$user_id)->first();
              $shippingDetails = json_decode(json_encode($shippingDetails),true);
              $order= Orders::with('orders')->where('id',$order_id)->first();
              $order = json_decode(json_encode($order),true);
              $userDetail = User::where('id',$user_id)->first();
              $userDetail = json_decode(json_encode($userDetail),true);
             // echo "<pre>";print_r($orders);die;
             // $cartPro= OrdersProduct::where('order_id',$order_id)->first();
              $email = $user_email;
              $messageData = [
                  'email'=>$email,
                 // 'name'=>$order->name,
                  'order_id'=>$order_id,
                  'orders'=>$order,
                  'userDetail'=>$userDetail,
                  'shippingDetail'=>$shippingDetails,
              ];
              Mail::send('emails.order',$messageData,function ($message) use ($email){
                  $message->to($email)->subject('Order placed - E-commerce Website');
              });
            $admin =  config::first();
            $email1 = $admin->notification_email;
              Mail::send('emails.order',$messageData,function ($message) use ($email1){
                  $message->to($email1)->subject('Order placed - E-commerce Website');
              });
              //email end
              return redirect('/thanks');
          }
         else{
             return redirect('/payment');
         }
      }
    }
    public function thanks(Request  $request){
        $user_email = Auth::user()->email;
        DB::table('cart')->where(['user_email'=>$user_email])->delete();
        return view('Frontend.orders.thanks');
    }
    public function addWishlist(Request $request, Product $product){
        $data=$request->all();
        //  echo "<pre>";print_r($data);die;
        if (empty(Auth::user()->email)){
            $data['user_email']='';
        }else{
            $data['user_email']= Auth::user()->email;
        }
        if (empty(Auth::user()->id)){
            $data['user_id']='';
        }else{
            $data['user_id']= Auth::user()->id;
        }
        $session_id= \Illuminate\Support\Facades\Session::get('session_id');
        if(empty($session_id)) {
            $session_id = mt_rand(111111, 999999);
            \Illuminate\Support\Facades\Session::put('session_id', $session_id);
        }
        $countList =wishlist::where(['product_id'=>$product->id,'user_email'=>$data['user_email']])->count();
        if($countList>0){
            return redirect()->back()->with('status','Product already exist');
        }
        else {
            wishlist::insert([
                'product_id' => $product->id,
                'session_id' => $session_id,
                'user_email' => $data['user_email'],
                'user_id' => $data['user_id'],
                'product_name' => $product->name,
                'code'=>$product->code,
                'image' => $product->image,]);
        }
        $wishlist = wishlist::where(['session_id'=>$session_id])->get();

        return redirect('/wishlist')->with(compact('wishlist'));
    }
    public function wishlist(Request $request){
        if(Auth::check()){
            $user_email = Auth::user()->email;
            $wishlist =wishlist::where(['user_email'=>$user_email])->get();
        }
        else{
            $session_id = \Illuminate\Support\Facades\Session::get('session_id');
            $wishlist = wishlist::where(['session_id'=>$session_id])->get();
        }
        // echo "<pre>";print_r($cartsCount);die;
       // $wishlist = DB::table('wishlist')->where(['session_id'=>$session_id])->get();
        return view('Frontend.wishlist')->with(compact('wishlist'));
    }
    public function deleteWishlist(Request $request,$id){
        wishlist::where(['id'=>$id])->delete();
        return redirect()->back()->with('status','Wishlist Deleted');
    }
    public function myOrder(Request $request){
      $user_id = Auth::user()->id;
      $orders= Orders::with('orders')->where('user_id',$user_id)->get();
      //echo "<pre>";print_r($orders);die;
      return view('Frontend.orders.myOrder')->with(compact('orders'));
    }
    public function orderDetail(Request $request,$order_id){
      $orderDetails = Orders::with('orders')->where('id',$order_id)->first();
      $user_id = $orderDetails->user_id;
      $userDetail = User::where('id',$user_id);
      return view('Frontend.orders.orderDetail')->with(compact('orderDetails','userDetail'));
    }
    public function track(Request $request){
      if ($request->isMethod('post')){
          $data = $request->all();
          //echo "<pre>";print_r($data);die;
          $order_id= $data['order_id'];
          $email=$data['email'];
          $order = Orders::where(['id'=>$order_id,'user_email'=>$email])->first();
          $status=$order->order_status;
          Session::put('OrderStatus',$status);
         // echo "<pre>";print_r($status);die;
          return redirect('/track-result');
      }
        return view('Frontend.orders.track');

    }
    public function trackResult(Request $request){
        return view('Frontend.orders.track-result');
    }

    public function updateStatus(Request $request, $id=null){
        $data = $request->all();
        Product::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
    public function products(Request $request, $url=null){
      $banners = Banner::where('status','1')->orderby('sort_order','asc')->get();
      $categories = Category::with('categories')->where(['parent_id'=>0,'status'=>1])->get();
      //echo $url;die;
      $category = Category::where(['url'=>$url])->first();
      //echo $category;die;
      $productAll = Product::where('category_id',$category->id)->get();

      //echo $productAll;die;
      return view('Frontend.products_listing')->with(compact('productAll','banners','categories','category'));
    }
}
