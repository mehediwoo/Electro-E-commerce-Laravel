<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    public function Index()
    {
        $size = Size::orderBy('id', 'DESC')->get();
        return view('admin.size.index', compact('size'));
    }
    //Add Brands
    public function AddSizes()
    {
        return view('admin.size.create');
    }
    //Store sizes
    public function StoreSize(Request $request)
    {
        $sizeData = new Size;
        $sizeData->size = $request->input('size');
        $sizeData->save();
        return redirect('/allSizes')->with('msg','Size Added Successfully');
    }

    //Active Status
    public function StatusActive($id)
    {
        $active = Size::find($id);
        $active->status = 1;
        $active->update();
        return redirect('/allSizes')->with('msg','Status Activate');
    }
    //DeActive Status
    public function StatusDeactive($id)
    {
        $active = Size::find($id);
        $active->status = 0;
        $active->update();
        return redirect('/allSizes')->with('msg','Status Deactive');
    }
    //Delete Sizes
    public function DeleteSize($id)
    {
        $size = Size::find($id);
        $size->delete();
        return redirect()->back()->with('msg','Size Delete Successfully');
    }
    //edit category
    public function EditSize($id)
    {
        $editSize = Size::find($id);
        return view('admin.size.edit', compact('editSize'));
    }
    // Update Category
    public function UpdateSizes(Request $request ,$id)
    {

        $updateSize =  Size::find($id);
        $updateSize->size = $request->input('size');
        $updateSize->update();
        return redirect('/allSizes')->with('msg','Size Updated Successfully');
    }
}
