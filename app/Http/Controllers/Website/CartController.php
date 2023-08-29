<?php

namespace App\Http\Controllers\Website;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function addCart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $product=Product::find($id);
            // dd($product);
            $cart=new Cart;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->product_title=$product->name;  
            if($product->discount_price!=null)
            {
                $cart->price=$product->discount_price * $request->qty;
            }
            else
            {
                $cart->price=$product->price * $request->qty;
            }
            
            $cart->image=$product->image;
            $cart->product_id=$product->id;
            $cart->quantity=$request->qty;
            $cart->save();

            return redirect()->back();

        }
        else
        {
            return redirect('login');
        }
    }

    public function showCart()
    {
        
    }
}
