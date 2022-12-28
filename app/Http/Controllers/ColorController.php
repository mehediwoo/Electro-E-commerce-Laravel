<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function Index()
    {
        $color = Color::orderBy('id', 'DESC')->get();
        return view('admin.color.index', compact('color'));
    }
    public function AddColor()
    {
        return view('admin.color.create');
    }
    //Store Color
    public function StoreColor(Request $request)
    {
        $colorData = new Color;
        $colorData->color = $request->input('color');
        $colorData->save();
        return redirect('/allColor')->with('msg','Color Added Successfully');
    }
    //Active Status
    public function StatusActive($id)
    {
        $active = Color::find($id);
        $active->status = 1;
        $active->update();
        return redirect('/allColor')->with('msg','Status Activate');
    }
    //DeActive Status
    public function StatusDeactive($id)
    {
        $active = Color::find($id);
        $active->status = 0;
        $active->update();
        return redirect('/allColor')->with('msg','Status Deactive');
    }
    //Delete Sizes
    public function DeleteColor($id)
    {
        $color = Color::find($id);
        $color->delete();
        return redirect()->back()->with('msg','Color Delete Successfully');
    }
    //edit color
    public function EditColor($id)
    {
        $editColor = Color::find($id);
        return view('admin.color.edit', compact('editColor'));
    }
    // Update Color
    public function updateColor(Request $request ,$id)
    {

        $updateColor =  Color::find($id);
        $updateColor->color = $request->input('color');
        $updateColor->update();
        return redirect('/allColor')->with('msg','Color Updated Successfully');
    }
}
