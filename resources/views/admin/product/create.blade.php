@extends('admin.master.app')
@section('title','Add Product')
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('/StoreProduct')}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="Pname" placeholder="Product Name">
                        </div>
                        @error('name')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Code</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="code" placeholder="Product Unique code">
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
                                    <option value="{{$category->id}}">{{$category->name}}</option>
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
                                    <option value="{{$SubCat->id}}">{{$SubCat->subCatName}}</option>
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
                                    <option value="{{$Brand->id}}">{{$Brand->brandName}}</option>
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
                                    <option value="{{$Color->id}}">{{$Color->color}}</option>
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
                                    <option value="{{$Size->id}}">{{$Size->size}}</option>
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
                                    <option value="{{$Unit->id}}">{{$Unit->unitName}}</option>
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
                            <input type="text" class="input-xlarge" name="price" placeholder="00.00">
                        </div>
                        @error('price')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Product Old Price</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="oldPrice" placeholder="00.00">
                        </div>
                        @error('oldPrice')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="ProductDescription" rows="3"></textarea>
                        </div>

                    </div>
                    @error('ProductDescription')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Meta Description</label>
                        <div class="controls">
                            <textarea class="" name="MetaDescription" rows="3"></textarea>
                        </div>

                    </div>
                    @error('MetaDescription')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror


                    <div class="control-group">
                        <label class="control-label">File Upload</label>
                        <div class="controls">
                            <input type="file" name="file[]" multiple required>
                        </div>
                    </div>
                    @error('image')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror


                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
</div><!--/row-->
</div><!--/row-->
@endsection
