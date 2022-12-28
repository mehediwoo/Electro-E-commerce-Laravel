<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function Index()
    {
        $allCategory = Category::orderBy('id','DESC')->get();
        return view('admin.category.index', compact('allCategory'));
    }
    public function createCategory()
    {
        return view('admin.category.create');
    }
    public function Store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:50',
            'image'=> 'mimes:png,jpg,jpeg,gif'
        ]);

        $category = new Category;
        $category->name = $request->input('name');
        $category->desc = $request->input('description');
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name= time();
            $ext = $img->extension();
            $fileName = $name. '.' .$ext;
            $img->move('category',$fileName);
            $category->image = $fileName;
        }
        $category->save();
        return redirect('/allCategory')->with('msg','Category Create Successfully');
    }

    //Active Status
    public function StatusActive($id)
    {
        $active = Category::find($id);
        $active->status = 1;
        $active->update();
        return redirect()->back();
    }
    //Active Status
    public function StatusDeactive($id)
    {
        $active = Category::find($id);
        $active->status = 0;
        $active->update();
        return redirect()->back();
    }
    //Delete Category
    public function DeleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        if ($category->image!= null) {
            unlink('category/'.$category->image);
        }
        return redirect()->back()->with('msg','Category Delete Successfully');
    }
    //edit category
    public function EditCategory($id)
    {
        $editCat = Category::find($id);
        return view('admin.category.edit', compact('editCat'));
    }
    // Update Category
    public function UpdateCategory(Request $request ,$id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
            'image'=> 'mimes:png,jpg,jpeg,gif'
        ]);
        $category =  Category::find($id);
        $category->name = $request->input('name');
        $category->desc = $request->input('description');
        if ($request->hasFile('image')) {
            unlink('category/'.$category->image);
            $img = $request->file('image');
            $name= time();
            $ext = $img->extension();
            $fileName = $name. '.' .$ext;
            $img->move('category',$fileName);
            $category->image = $fileName;
        }
        $category->update();
        return redirect('/allCategory')->with('msg','Category Create Successfully');
    }
}
