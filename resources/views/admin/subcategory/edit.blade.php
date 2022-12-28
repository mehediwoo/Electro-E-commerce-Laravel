@extends('admin.master.app')
@section('title','Edit Sub Category')
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('/update/subcategory/'.$subeditCat->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Sub Category Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="subCatName" value="{{ $subeditCat->subCatName }}">
                        </div>
                        @error('subCatName')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>

                    <div class="control-group">
                        <label class="control-label">Add Parent Category</label>
                        <div class="controls">
                            <select name="category" id="category">
                                @foreach($allCategory as $category)
                                    @if( $subeditCat->subCatName== $category->name)
                                        <option value="{{$category->id}}" selected >{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('category')
                    <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror


                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Category Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="description" rows="3">{{ $subeditCat->desc }}</textarea>
                        </div>

                    </div>
                    @error('description')
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
