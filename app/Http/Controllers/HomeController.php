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

class HomeController extends Controller
{
    public function Index()
    {
        //Header Search-Bar
        $category = Category::orderBy('id','DESC')->get();
        //Home Page Category Collection
        $collect  = Category::orderBy('id','DESC')->take(3)->get();
        //Home Page new Product Category
        $newProCat   = Category::orderBy('id','DESC')->take(4)->get();
        $firstCate   = $newProCat->splice(0,1);
        $secondCat   = $newProCat->splice(0,3);
        //Product Tab Id

        //Product with category
        $ProTab   = Product::orderBy('id','DESC')->where('status',1)->take(12)->get();

        return view('home',compact('newProCat','category','collect','firstCate','secondCat','ProTab'));
    }
    //Single Product
    public function SingleProduct($id)
    {
        $product = Product::find($id);
        $cat_id  = $product->cat_id;
        $related = Product::where('cat_id','=',$cat_id)->take(4)->get();
        return view('singleProduct',compact('product','related'));
    }
    //Product by Category
    public function Shop($cate_name, $id)
    {
        $cate = $id;
        $shops = Product::where('cat_id',$cate)->paginate(9);
        $cate = Category::orderBy('id','DESC')->take(6)->get();
        $brand= Brand::orderBy('id','DESC')->take(6)->get();
        return view('shop',compact('cate_name','shops','brand','cate'));
    }
     //Product by Brand
     public function ShopByBrand($brand_name, $id)
     {
         $brand = $id;
         $ShopBrands = Product::where('Brand_id',$brand)->paginate(9);
         $cate = Category::orderBy('id','DESC')->take(6)->get();
         $brand= Brand::orderBy('id','DESC')->take(6)->get();
         return view('shopBrand',compact('ShopBrands','brand','cate','brand_name'));
     }
}
