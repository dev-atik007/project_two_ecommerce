<?php

namespace App\Http\Controllers\Website;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
// use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function cashOrder()
    {
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

            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';

            $order->save();


            // cart table order then delete data to cart table
            $cart_id=$data->id;;
            $cart=Cart::find($cart_id);
            $cart->delete();


        }
        
        return redirect()->back()->with('message','We have Received your Order. We will connect with you soon...');
    }


    
}
