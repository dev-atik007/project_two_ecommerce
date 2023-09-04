<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
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
            $total_product=Product::all()->count();
            $total_order=Order::all()->count();
            $total_user=User::all()->count();

            $order=Order::all();
            $total_revenue=0;
            foreach($order as $order)
            {
                $total_revenue = $total_revenue +$order->price;
            }

            $total_delivered = Order::where('delivery_status','=','Delivered')->get()->count();
            $total_processing = Order::where('delivery_status','=','processing')->get()->count();

            return view('admin.home', compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
        }
        else
        {
            $product=Product::paginate(6);;
            $comment=Comment::orderby('id','desc')->get();
            $reply=Reply::all();
            return view('website.home',compact('product','comment','reply'));
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

    public function searchData(Request $request)
    {
        $searchText=$request->search;
        $order=order::where('name','LIKE',"%searchText%")->orWhere('phone','LIKE',"%searchText%" );

        return view('admin.orderShow', compact('order'));
    }


    
}
