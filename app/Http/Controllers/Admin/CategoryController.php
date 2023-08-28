<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view_category()
    {
        return view('admin.category.category');
    }

    public function add_category(Request $request)
    {
        $data=new Category;

        $data->category_name= $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category Added Successsfully.');
    }
}
