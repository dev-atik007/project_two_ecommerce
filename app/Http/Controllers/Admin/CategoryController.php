<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view_category()
    {
        $data=Category::all();
        return view('admin.category.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data=new Category;

        $data->category_name= $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category Added Successsfully.');
    }

    public function delete_category($id)
    {
        $data=Category::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Category Delete Successfully.');
    }

    
}
