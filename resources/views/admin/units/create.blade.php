@extends('admin.master.app')
@section('title','Add Units')
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Units</h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('/StoreUnits')}}" method="post" >
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Units Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="unitName">
                        </div>
                        @error('unitName')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>



                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Units Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="description" rows="3"></textarea>
                        </div>

                    </div>
                    @error('description')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                    @enderror

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add New Units</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
</div><!--/row-->
</div><!--/row-->
@endsection
