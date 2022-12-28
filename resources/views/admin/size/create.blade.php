@extends('admin.master.app')
@section('title','Add Sizes')
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Size</h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('/StoreSize')}}" method="post" >
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Size</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="size" data-role="tagsinput" required>
                        </div>
                        @error('name')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add Size</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
</div><!--/row-->
</div><!--/row-->
@endsection
