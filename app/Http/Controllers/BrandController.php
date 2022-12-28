<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function Index()
    {
        $brands = Brand::orderBy('id','DESC')->get();
        return view('admin.brands.index', compact('brands'));
    }
    //Add Brands
    public function AddBrands()
    {
        return view('admin.brands.create');
    }
    //Add new Brands
    public function StoreBrands(Request $request)
    {
        $request->validate([
            'brandName' => 'required|unique:brands|max:50',
        ]);

        $brandData = new Brand;
        $brandData->brandName = $request->input('brandName');
        $brandData->brandDesc = $request->input('description');
        $brandData->save();
        return redirect('/allBrands')->with('msg','Brand Added Successfully');
    }
    //Active Status
    public function StatusActive($id)
    {
        $active = Brand::find($id);
        $active->status = 1;
        $active->update();
        return redirect('/allBrands')->with('msg','Status Activate');
    }
    //DeActive Status
    public function StatusDeactive($id)
    {
        $active = Brand::find($id);
        $active->status = 0;
        $active->update();
        return redirect('/allBrands')->with('msg','Status Deactive');
    }
    //Delete Brands
    public function DeleteBrand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->back()->with('msg','Brand Delete Successfully');
    }
    //edit category
    public function EditBrand($id)
    {
        $editBrand = Brand::find($id);
        return view('admin.brands.edit', compact('editBrand'));
    }
    // Update Category
    public function UpdateBrands(Request $request ,$id)
    {
        $request->validate([
            'brandName' => 'required|unique:brands,brandName,'.$id,
        ]);
        $upBrand =  Brand::find($id);
        $upBrand->brandName = $request->input('brandName');
        $upBrand->brandDesc = $request->input('description');
        $upBrand->update();
        return redirect('/allBrands')->with('msg','Brand Updated Successfully');
    }
}
