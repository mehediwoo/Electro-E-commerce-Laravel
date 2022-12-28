@extends('admin.master.app')
@section('title','Category')
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Category Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="name">
                        </div>
                        @error('name')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>



                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Category Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="description" rows="3"></textarea>
                        </div>

                    </div>
                    @error('description')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror

                    <div class="control-group">
                        <label class="control-label">File Upload</label>
                        <div class="controls">
                            <input type="file" name="image">
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
