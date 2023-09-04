<?php

namespace App\Http\Controllers\Website;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Reply;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $product=Product::paginate(6);
        $comment=Comment::orderby('id','desc')->get();
        $reply=Reply::all();
        return view('website.home', compact('product','comment','reply'));
    }

    public function product_details($id)
    {
        $product=Product::find($id);
        return view('website.website.product_details', compact('product'));
    }

    public function productSearch(Request $request)
    {
        $comment=Comment::orderby('id','desc')->get();
        $reply=Reply::all();

        $search_text=$request->search;
        $product=Product::where('name','LIKE',"%search_text%")->paginate(6);
        return view('website.home',compact('product','reply','comment'));
    }

    
}
