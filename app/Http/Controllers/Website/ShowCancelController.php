<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class ShowCancelController extends Controller
{
    public function showOrder()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;

            $order=Order::where('user_id','=', $userid)->get();

            return view('website.order', compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancelOrder($id)
    {
        $order = Order::find($id);
        $order->delivery_status='You canceled the order';
        $order->save();

        return redirect()->back();
    }
}
