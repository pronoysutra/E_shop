<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Orrder;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;


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

            if ($product->discount_price) {
                $cart->price = $product->discount_price * $request->quentity;
            } else {
                $cart->price = $product->price * $request->quentity;
            }

            $cart->image = $product->image;
            $cart->product_id = $product->id;

            $cart->quantity = $request->quentity;

            $cart->save();
            return redirect()->route('show.cart');
        } else {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();

            return view('home.showcart', compact('cart'));
        } else {
            // Handle unauthenticated users
            return redirect()->route('login')
                ->with('error', 'You must be logged in to view your cart');
        }
    }

    public function delete_cart($id)
    {
        // Attempt to find the cart by ID
        $cart = Cart::find($id);

        // Check if the cart exists
        if ($cart) {
            $cart->delete();
            return redirect()->back()
                ->with('message', 'Product deleted successfully');
        } else {
            // Handle the case when the cart is not found
            return redirect()->back()
                ->with('error', 'Cart not found');
        }
    }


    public function cash_order()
    {

        // Check if the user is authenticated
        $id = Auth::id(); // This retrieves the authenticated user's ID directly.

        $data = Cart::where('user_id', $id)->get();


        foreach ($data as $data) {
            $order  = new Order();
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'process';

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with('message', 'We have Received Your Order . We Will Connect With You Soon...');
    }

    public function stripe($totalPrice)
    {

        return view('home.stripe', compact('totalPrice'));
    }

    public function stripePost(Request $request, $totalPrice)
    {
        // Validate the required inputs
        $request->validate([
            'stripeToken' => 'required',
        ]);

        try {
            // Set Stripe API key
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create the charge
            \Stripe\Charge::create([
                'amount' => $totalPrice * 100, // Amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken, // The token received from Stripe Elements or frontend
                'description' => 'Thanks for payment',
            ]);

            // Flash success message to the session
            session()->flash('success', 'Payment successful!');

            return back();
        } catch (\Exception $e) {
            // Handle any errors from Stripe or other issues
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
