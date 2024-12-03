<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data = Catagory::all();
        return view('admin.catagory', compact('data'));
    }
    public function add_catagory(Request $request)
    {
        $request->validate([
            'catagory' => 'required|unique:catagories,catagory_name|max:255',
        ]);
        $data = new Catagory();
        $data->catagory_name = $request->catagory;
        $data->save();
        return redirect()->back()->with(['message' => 'Category added successfully!'], 201);
    }


    public function delete_catagory($id)
    {
        $data = Catagory::find($id);
        $data->delete();
        return redirect()->back()
            ->with(['message' => 'Category deleted successfully!'], 201);
    }




    //product start
    public function add_product()
    {
        $catagory = Catagory::all();
        return view('admin.product', compact('catagory'));
    }

    public function store_product(Request $request)
    {

        $product = new Product();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->catagory = $request->catagory;

        $image = $request->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
        } else {
            // Handle the case where no image is provided
            return back()->with('error', 'No image file was uploaded.');
        }

        $request->image->move('product', $imageName);
        $product->image = $imageName;

        $product->save();
        return redirect()->route('show.product')->with(['message' => 'Product Add successfully!'], 201);;;
    }

    public function show_product()
    {
       $product=Product::all();
        return view('admin.show_product',compact('product'));
    }
    public function delete_product($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('show.product')
          ->with('message', 'Product deleted successfully');
    }
    public function edit_product($id){
        $product=Product::find($id);
        $catagory=Catagory::all();
        return view('admin.edit_product',compact('product','catagory'));
    }

    public function update_product(Request $request, $id){

        $product =Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->catagory = $request->catagory;

        $image = $request->image;
        if($image){
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imageName);
            $product->image = $imageName;
        }


        $product->save();
        return redirect()->route('show.product')->with(['message' => 'Product update successfully!'], 201);;


    }

    public function order(){
        $order=Order::all();
        return view('admin.order',compact('order'));
    }

    public function markAsDelivered($id){
        $order=Order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status="paid";
        $order->save();
        return redirect()->back();

    }

    public function print_pdf($id){

        $order=Order::find($id);


        $pdf = Pdf::loadView('admin.pdf',compact('order'));

        // Download PDF
        return $pdf->download('order_details.pdf');
    }



}
