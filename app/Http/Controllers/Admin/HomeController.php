<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            return view('dashboard');
        }
    }
}
