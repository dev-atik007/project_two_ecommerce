<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype=Auth::User()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
        }
        else
        {
            $product=Product::paginate(6);;
            return view('website.home',compact('product'));
        }
    }

    public function order()
    {
        $order=Order::all();
        return view('admin.orderShow', compact('order'));
    }
    public function devivered($id)
    {
        $order=Order::find($id);
        $order->delivery_status="Delivered";
        $order->payment_status='Paid';
        $order->save();

        return redirect()->back();

        
    }

    
}
