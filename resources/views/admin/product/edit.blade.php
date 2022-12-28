@extends('admin.master.app')
@section('title','Edit Product')
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('/UpdateProduct/'.$editProduct->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="Pname" value="{{ $editProduct->name }}" placeholder="Product Name">
                        </div>
                        @error('name')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Code</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="code" value="{{ $editProduct->code }}" placeholder="Product Unique code">
                        </div>
                        @error('code')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>

                    <div class="control-group">
                        <label class="control-label">Product Category</label>
                        <div class="controls">
                            <select name="Pcate" id="Pcate">
                                <option value="0">Select Category</option>
                                @foreach($category as $category)
                                @if ($category->id==$editProduct->cat_id)
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('Pcate')
                    <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror

                    <div class="control-group">
                        <label class="control-label">Sub Category</label>
                        <div class="controls">
                            <select name="PsubCate" id="PsubCate">
                                <option value="0">Select Sub Category</option>
                                @foreach($SubCat as $SubCat)
                                @if ($SubCat->id=$editProduct->SubCat_id)
                                <option selected value="{{$SubCat->id}}">{{$SubCat->subCatName}}</option>
                                @else
                                <option value="{{$SubCat->id}}">{{$SubCat->subCatName}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('PsubCate')
                    <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror

                    <div class="control-group">
                        <label class="control-label">Product Brand</label>
                        <div class="controls">
                            <select name="Brand" id="Brand">
                                <option value="0">Select Brand</option>
                                @foreach($Brand as $Brand)
                                @if ($Brand->id==$editProduct->Brand_id)
                                <option selected value="{{$Brand->id}}">{{$Brand->brandName}}</option>
                                @else
                                <option value="{{$Brand->id}}">{{$Brand->brandName}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('Brand')
                    <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror

                    <div class="control-group">
                        <label class="control-label">Product Color</label>
                        <div class="controls">
                            <select name="Color" id="Color">
                                <option value="0">Select Color</option>
                                @foreach($Color as $Color)
                                @if ($Color->id==$editProduct->color_id)
                                <option selected value="{{$Color->id}}">{{$Color->color}}</option>
                                @else
                                <option value="{{$Color->id}}">{{$Color->color}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('Color')
                    <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror

                    <div class="control-group">
                        <label class="control-label">Product Size</label>
                        <div class="controls">
                            <select name="Size" id="Size">
                                <option value="0">Select Size</option>
                                @foreach($Size as $Size)
                                @if ($Size->id==$editProduct->size_id)
                                <option selected value="{{$Size->id}}">{{$Size->size}}</option>
                                @else
                                <option value="{{$Size->id}}">{{$Size->size}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('Size')
                    <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror

                    <div class="control-group">
                        <label class="control-label">Product Unit</label>
                        <div class="controls">
                            <select name="Unit" id="Unit">
                                <option value="0">Select Unit</option>
                                @foreach($Unit as $Unit)
                                @if ($Unit->id==$editProduct->unit_id)
                                <option selected value="{{$Unit->id}}">{{$Unit->unitName}}</option>
                                @else
                                <option value="{{$Unit->id}}">{{$Unit->unitName}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('Unit')
                    <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror

                    <div class="control-group">
                        <label class="control-label" for="date01">Product Price</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="price" placeholder="00.00" value="{{ $editProduct->price }}">
                        </div>
                        @error('price')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Old Price</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="oldPrice" placeholder="00.00" value="{{ $editProduct->oldPrice }}"">
                        </div>
                        @error('oldPrice')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="ProductDescription" rows="3">{{ $editProduct->desc }}</textarea>
                        </div>

                    </div>
                    @error('ProductDescription')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Meta Description</label>
                        <div class="controls">
                            <textarea class="" name="MetaDescription" rows="3">{{ $editProduct->MetaDesc }}</textarea>
                        </div>

                    </div>
                    @error('MetaDescription')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror


                    <div class="control-group">
                        <label class="control-label">File Upload</label>
                        <div class="controls">
                            <input type="file" name="file[]" multiple >
                        </div>
                    </div>
                    @error('image')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror


                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
</div><!--/row-->
</div><!--/row-->
@endsection
