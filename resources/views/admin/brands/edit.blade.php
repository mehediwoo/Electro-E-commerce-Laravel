@extends('admin.master.app')
@section('title','Edit Brand')
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Brand</h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('/update/brand/'.$editBrand->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Brand Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="brandName" value="{{ $editBrand->brandName }}">
                        </div>
                        @error('brandName')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>
                    @error('category')
                    <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror


                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Brand Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="description" rows="3">{{ $editBrand->brandDesc }}</textarea>
                        </div>

                    </div>
                    @error('description')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror



                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
</div><!--/row-->
</div><!--/row-->
@endsection
