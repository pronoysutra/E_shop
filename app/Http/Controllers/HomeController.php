<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.userpage');
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
        return view('home.userpage'); // Ensure this view exists
    } else {
        return redirect()->route('login')->with('error', 'You must log in first.');
    }
}

}
