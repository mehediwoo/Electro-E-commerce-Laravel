@extends('admin.master.app')
@section('title','Add Colors')
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Colors</h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('/StoreColor')}}" method="post" >
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Color</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="color" data-role="tagsinput" placeholder="Add new Colors" required>
                        </div>
                        @error('color')
                        <h4 style="color: red; margin-left:180px">{{ $message }}</h4>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add color</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
</div><!--/row-->
</div><!--/row-->
@endsection
