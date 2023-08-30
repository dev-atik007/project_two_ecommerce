<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Cart;
use App\Models\Order;


class StripePaymentController extends Controller
{
    public function stripe($totalprice)
    {
        return view('admin.payment.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        // dd($totalprice);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment" 
        ]);

        $user=Auth::User();
        $userid=$user->id;
        // dd($userid);

        $data=Cart::where('user_id','=', $userid)->get();
        // 
        
        foreach($data as $data)
        {
            $order = new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->qty=$data->quantity;
            $order->price=$data->price;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='Paid';
            $order->delivery_status='processing';

            $order->save();


            // cart table order then delete data to cart table
            $cart_id=$data->id;;
            $cart=Cart::find($cart_id);
            $cart->delete();


        }
       
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
}
