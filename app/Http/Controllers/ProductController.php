<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\Unit;
use App\Models\Product;

class ProductController extends Controller
{
    public function Index()
    {
        $product = Product::orderBy('id','DESC')->get();
        return view('admin.product.index',compact('product'));
    }
    //Add Product Page
    public function AddProduct()
    {
        $category = Category::orderBy('id','DESC')->get();
        $SubCat   = SubCategory::orderBy('id','DESC')->get();
        $Brand    = Brand::orderBy('id','DESC')->get();
        $Color    = Color::orderBy('id','DESC')->get();
        $Size     = Size::orderBy('id','DESC')->get();
        $Unit     = Unit::orderBy('id','DESC')->get();
        return view('admin.product.create', compact('category','SubCat','Brand','Color','Size','Unit'));
    }
    //Insert Product
    public function StoreProduct(Request $request)
    {
        $product = new Product;
        $product->cat_id    = $request->input('Pcate');
        $product->SubCat_id = $request->input('PsubCate');
        $product->Brand_id  = $request->input('Brand');
        $product->unit_id   = $request->input('Unit');
        $product->size_id   = $request->input('Size');
        $product->color_id   = $request->input('Color');
        $product->code   = $request->input('code');
        $product->name   = $request->input('Pname');
        $product->desc   = $request->input('ProductDescription');
        $product->MetaDesc   = $request->input('MetaDescription');
        $product->price   = $request->input('price');
        $product->oldPrice   = $request->input('oldPrice');
        $images=array();
        if($files=$request->file('file')){
            $i=0;
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $fileNameExtract=explode('.',$name);
                $fileName=$fileNameExtract[0];
                $fileName.=time();
                $fileName.=$i;
                $fileName.='.';
                $fileName.=$fileNameExtract[1];

                $file->move('product',$fileName);
                $images[]=$fileName;
                $i++;
            }
            $product['image'] = implode("|",$images);

            $product->save();
            return redirect('/products')->with('msg','Product added successfully!');
        }else{
            return redirect()->back()->with('msg','Product not added, please try again!');
        }


    }

    //Active Status
    public function StatusActive($id)
    {
        $active = Product::find($id);
        $active->status = 1;
        $active->update();
        return redirect()->back()->with('msg','Status Active');
    }
    //Active Status
    public function StatusDeactive($id)
    {
        $active = Product::find($id);
        $active->status = 0;
        $active->update();
        return redirect()->back()->with('msg','Status De Active');
    }
     //Delete Product
     public function DeleteProduct($id)
     {

         $product = Product::find($id);
         $product['image'] = explode('|', $product->image);
         $product->delete();
         foreach($product->image as $img){
            if ($product->image!= null) {
                unlink('product/'.$img);
            }
         }

         return redirect()->back()->with('msg','Product Delete Successfully');
    }
    //Edit Product
    public function EditProduct($id)
    {
        $category = Category::orderBy('id','DESC')->get();
        $SubCat   = SubCategory::orderBy('id','DESC')->get();
        $Brand    = Brand::orderBy('id','DESC')->get();
        $Color    = Color::orderBy('id','DESC')->get();
        $Size     = Size::orderBy('id','DESC')->get();
        $Unit     = Unit::orderBy('id','DESC')->get();
        $editProduct = Product::find($id);
        return view('admin.product.edit', compact('category','SubCat','Brand','Color','Size','Unit','editProduct'));
    }
    //Updated Product
    public function UpdateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->cat_id    = $request->input('Pcate');
        $product->SubCat_id = $request->input('PsubCate');
        $product->Brand_id  = $request->input('Brand');
        $product->unit_id   = $request->input('Unit');
        $product->size_id   = $request->input('Size');
        $product->color_id   = $request->input('Color');
        $product->code   = $request->input('code');
        $product->name   = $request->input('Pname');
        $product->desc   = $request->input('ProductDescription');
        $product->MetaDesc   = $request->input('MetaDescription');
        $product->price   = $request->input('price');
        $product->oldPrice   = $request->input('oldPrice');
        $product->update();
        $images=array();
        if($files=$request->file('file')){
                $product['image'] = explode('|', $product->image);
                foreach($product->image as $img){
                    if ($product->image!= null) {
                        unlink('product/'.$img);
                    }
                 }

            $i=0;
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $fileNameExtract=explode('.',$name);
                $fileName=$fileNameExtract[0];
                $fileName.=time();
                $fileName.=$i;
                $fileName.='.';
                $fileName.=$fileNameExtract[1];

                $file->move('product',$fileName);
                $images[]=$fileName;
                $i++;
            }
            $product['image'] = implode("|",$images);

            $product->update();
            return redirect('/products')->with('msg','Product Updated successfully!');
        }else{
            return redirect('/products')->with('msg','Product Updated faield, please try again!');
        }

    }

}
