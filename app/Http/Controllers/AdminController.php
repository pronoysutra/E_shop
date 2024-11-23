<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data=Catagory::all();
        return view('admin.catagory', compact('data'));
    }
    public function add_catagory(Request $request) {
        $request->validate([
            'catagory' => 'required|unique:catagories,catagory_name|max:255',
        ]);
        $data= new Catagory();
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
    public function add_product(){
        $catagory= Catagory::all();
        return view('admin.product',compact('catagory'));
    }

public function store_product (Request $request){

$product=new Product();

$product->title=$request->title;
$product->description=$request->description;
$product->price=$request->price;
$product->quantity=$request->quantity;
$product->discount_price=$request->discount_price;
$product->catagory=$request->catagory;

$image=$request->image;
if ($request->hasFile('image')) {
    $image = $request->file('image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
} else {
    // Handle the case where no image is provided
    return back()->with('error', 'No image file was uploaded.');
}

$request->image->move('product',$imageName);
$product->image=$imageName;

$product->save();
return redirect()->back();


}




}
