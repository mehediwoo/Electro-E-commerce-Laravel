<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function Index()
    {

        $allSubCategory = SubCategory::orderBy('id','DESC')->get();
        return view('admin.subcategory.index', compact('allSubCategory'));
    }

    public function createSubCategory()
    {
        $category = Category::orderBy('id','DESC')->get();
        return view('admin.subcategory.create',compact('category'));
    }
    public function Store(Request $request)
    {
        $request->validate([
            'subCatName' => 'required|unique:sub_categories|max:50',
            'category'=> 'required'
        ]);

        $SubCategory = new SubCategory;
        $SubCategory->subCatName = $request->input('subCatName');
        $SubCategory->cat_id = $request->input('category');
        $SubCategory->desc = $request->input('description');
        $SubCategory->save();
        return redirect('/allSubCategory')->with('msg','Sub Category Create Successfully');
    }
    //Active Status
    public function StatusActive($id)
    {
        $active = SubCategory::find($id);
        $active->status = 1;
        $active->update();
        return redirect()->back();
    }
    //Active Status
    public function StatusDeactive($id)
    {
        $active = SubCategory::find($id);
        $active->status = 0;
        $active->update();
        return redirect()->back();
    }
    //Delete Category
    public function DeleteSubCategory($id)
    {
        $category = SubCategory::find($id);
        $category->delete();
        return redirect()->back()->with('msg','Sub Category Delete Successfully');
    }
    //edit category
    public function EditSubCategory($id)
    {
        $subeditCat = SubCategory::find($id);
        $allCategory = Category::all();
        return view('admin.subcategory.edit', compact('subeditCat','allCategory'));
    }
    //Update sub category
    public function UpdateSubCategory(Request $request ,$id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
        ]);
        $Subcategory =  SubCategory::find($id);
        $Subcategory->subCatName = $request->input('name');
        $Subcategory->cat_id = $request->input('category');
        $Subcategory->desc = $request->input('description');
        $Subcategory->update();
        return redirect('/allSubCategory')->with('msg','Sub-Category Updated Successfully');
    }
}
