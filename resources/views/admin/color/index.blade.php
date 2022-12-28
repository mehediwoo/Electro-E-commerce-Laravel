@extends('admin.master.app')
@section('title','All Colors')
@section('content')


<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{'/Dashboard'}}">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="">All Colors</a></li>
</ul>
@if (session()->has('msg'))
    <h4 style="color: rgb(74, 6, 130)">{{ session()->get('msg') }}</h4>
@endif

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Color List</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th style="width: 5%">SL</th>
                      <th style="width: 65%">Color</th>
                      <th style="width: 10%">Status</th>
                      <th style="width: 20%">Actions</th>
                  </tr>
              </thead>
              <tbody>

                @foreach ($color as $sl => $iteam )
                <tr>
                    <td>{{ $sl+1 }}</td>
                    <td>
                        @foreach(explode(',',$iteam->color) as $MultyColor)
                            <ul class="span1">
                                {{ $MultyColor }}
                            </ul>
                        @endforeach
                    </td>
                    <td class="center">
                        @if ($iteam->status==1)
                        <span class="label label-success">Active</span>
                        @else
                        <span class="label">Inactive</span>
                        @endif

                    </td>
                    <td class="center">
                        @if ($iteam->status==1)
                        <a class="btn btn-success" href="{{ url('/ColorDeactive/'.$iteam->id) }}">
                            <i class="halflings-icon white thumbs-down"></i>
                        </a>
                        @else
                        <a class="btn btn-danger" href="{{ url('/ColorActive/'.$iteam->id) }}">
                            <i class="halflings-icon white thumbs-up"></i>
                        </a>
                        @endif

                        <a class="btn btn-info" href="{{ url('/Color/Edit/'.$iteam->id) }}">
                            <i class="halflings-icon white edit"></i>
                        </a>
                        <a class="btn btn-danger" href="{{ url('/Delete/Color/'.$iteam->id) }}">
                            <i class="halflings-icon white trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
    </div><!--/span-->

</div><!--/row-->



@endsection
