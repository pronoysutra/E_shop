<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $product=Product::paginate(10);
        return view('home.userpage',compact('product'));
    }


    // public function redirect(){

    //     $user = auth()->user();

    //     if ($user->usertype ==='1') {
    //         return view('admin.home'); // Create this view
    //     }else

    //         return view('home.userpage'); // Create this view


    // }

    public function redirect()
{
    $user = auth()->user();

    if ($user && $user->usertype === '1') {
        return view('admin.home'); // Ensure this view exists
    } elseif ($user) {
        $product=Product::paginate(10);
        return view('home.userpage',compact('product'));
    } else {
        return redirect()->route('login')->with('error', 'You must log in first.');
    }
}

}
