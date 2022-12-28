@extends('admin.master.app')
@section('title','Create Sub Category')
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Sub Category</h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('/SubCatStore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Sub Category Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="subCatName">
                        </div>
                        @error('subCatName')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>

                    <div class="control-group">
                        <label class="control-label">Add Parent Category</label>
                        <div class="controls">
                            <select name="category" id="category">
                                <option value="0">Select Parent Category for Sub Category</option>
                                @foreach($category as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
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
                            <textarea class="cleditor" name="description" rows="3"></textarea>
                        </div>

                    </div>
                    @error('description')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror




                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Create Sub Category</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
</div><!--/row-->
</div><!--/row-->
@endsection
