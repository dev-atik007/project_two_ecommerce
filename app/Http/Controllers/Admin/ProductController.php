<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view_product()
    {
        $category=Category::all();
        return view('admin.product.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product=new Product;

        $product->name=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->qty=$request->qty;
        $product->category=$request->category;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename; 

        $product->save();

        return redirect()->back()->with('message','Product Added Successfully.');


    }
}
