<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
            return view('website.home');
        }
    }

    public function order()
    {
        $order=Order::all();
        return view('admin.orderShow', compact('order'));
    }

    
}
