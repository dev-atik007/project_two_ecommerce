<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $product=Product::paginate(6);
        return view('website.home', compact('product'));
    }

    public function product_details($id)
    {
        $product=Product::find($id);
        return view('website.website.product_details', compact('product'));
    }
}
