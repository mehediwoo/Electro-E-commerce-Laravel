@extends('admin.master.app')
@section('title','Edit Units')
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Units</h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('/Units/update/'.$editUnits->id)}}" method="post">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Units Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="unitName" value="{{ $editUnits->unitName }}">
                        </div>
                        @error('unitName')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>
                    @error('category')
                    <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror


                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Units Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="description" rows="3">{{ $editUnits->desc }}</textarea>
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
