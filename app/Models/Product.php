<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category ()
    {
        return  $this->belongsTo(Category::class,'cat_id');
    }
    public function SubCategory ()
    {
        return  $this->belongsTo(SubCategory::class,'SubCat_id');
    }
    public function Brand ()
    {
        return  $this->belongsTo(Brand::class,'Brand_id');
    }
    public function unit ()
    {
        return  $this->belongsTo(Unit::class,'unit_id');
    }
    public function Size ()
    {
        return  $this->belongsTo(Size::class,'size_id');
    }
    public function Color ()
    {
        return  $this->belongsTo(Color::class,'color_id');
    }

    public static function CatProduct($cat_id)
    {
        $catCount = Product::where('cat_id',$cat_id)->where('status',1)->count();
        return $catCount;
    }
    public static function BrandProduct($Brand_id)
    {
        $brandProduct = Product::where('Brand_id',$Brand_id)->where('status',1)->count();
        return $brandProduct;
    }
}
