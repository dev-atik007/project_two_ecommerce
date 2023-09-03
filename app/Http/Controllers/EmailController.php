<?php

namespace App\Http\Controllers;
Use App\Models\Order;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Notification;



class EmailController extends Controller
{
    public function sentEmail($id)
    {
        $order=Order::find($id);
        return view('admin.email_info', compact('order'));

    }

    public function sentUserEmail(Request $request, $id)
    {
        $order=Order::find($id);

        $details =[
            'greeting'  =>$request->greeting,
            'firstline' =>$request->firstline,
            'body'      =>$request->body,
            'button'    =>$request->button,
            'url'       =>$request->url,
            'lastline' =>$request->lastline,

        ];
        
        Notification::send($order,new SendEmailNotification($details));

        return redirect()->back();
    }
}
