<?php

namespace App\Http\Controllers;
Use App\Models\Order;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sentEmail($id)
    {
        $order=Order::find($id);
        return view('admin.email_info', compact('order'));
       

        
    }
}
