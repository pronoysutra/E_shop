<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
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

}
