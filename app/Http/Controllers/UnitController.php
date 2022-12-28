<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function Index()
    {
        $Units = Unit::orderBy('id','DESC')->get();
        return view('admin.units.index', compact('Units'));
    }
    public function AddUnits()
    {
        return view('admin.units.create');
    }
    //Add new Brands
    public function StoreUnits(Request $request)
    {
        $request->validate([
            'unitName' => 'required|unique:units|max:50',
        ]);

        $Unit = new Unit;
        $Unit->unitName = $request->input('unitName');
        $Unit->desc = $request->input('description');
        $Unit->save();
        return redirect('/allUnits')->with('msg','Unit Added Successfully');
    }
    //Active Status
    public function StatusActive($id)
    {
        $active = Unit::find($id);
        $active->status = 1;
        $active->update();
        return redirect('/allUnits')->with('msg','Status Activate');
    }
    //Active Status
    public function StatusDeactive($id)
    {
        $active = Unit::find($id);
        $active->status = 0;
        $active->update();
        return redirect('/allUnits')->with('msg','Status Deactive');
    }
    //Delete Units
    public function DeleteUnits($id)
    {
        $units = Unit::find($id);
        $units->delete();
        return redirect()->back()->with('msg','Units Delete Successfully');
    }
    //edit category
    public function EditUnits($id)
    {
        $editUnits = Unit::find($id);
        return view('admin.units.edit', compact('editUnits'));
    }
    //Update Units
    public function UnitUpdate(Request $request,$id)
    {
        $request->validate([
            'unitName' => 'required|unique:units,unitName, '.$id,
        ]);
        $updateUnits = Unit::find($id);
        $updateUnits->unitName = $request->input('unitName');
        $updateUnits->desc = $request->input('description');
        $updateUnits->update();
        return redirect('/allUnits')->with('msg','Unit Updated Successfully');
    }
}
