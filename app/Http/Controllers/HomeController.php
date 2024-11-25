<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(10);
        return view('home.userpage', compact('product'));
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
            $product = Product::paginate(10);
            return view('home.userpage', compact('product'));
        } else {
            return redirect()->route('login')->with('error', 'You must log in first.');
        }
    }

    public function details_product($id)
    {
        $product = Product::find($id);
        return view('home.details_product', compact('product'));
    }

    public function cart_product(Request $request, $id)
    {

        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;

            if($product->discount_price){
                $cart->price=$product->discount_price*$request->quentity;
            }else{
                $cart->price=$product->price*$request->quentity;
            }

            $cart->image=$product->image;
            $cart->product_id=$product->id;

            $cart->quantity = $request->quentity;

            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
}
