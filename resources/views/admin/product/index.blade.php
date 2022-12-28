@extends('admin.master.app')
@section('title','All Product')
@section('content')


<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{ url('/') }}">All Product</a></li>
</ul>
@if (session()->has('msg'))
    <h4 style="color: rgb(74, 6, 130)">{{ session()->get('msg') }}</h4>
@endif

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Product List</h2>
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
                      <th style="width: 5%">Code</th>
                      <th style="width: 10%">Product Name</th>
                      <th style="width: 20%">Description</th>
                      <th style="width: 10%">Price</th>
                      <th style="width: 10%">Image</th>
                      <th style="width: 5%">Category Name</th>
                      <th style="width: 5%">Sub Cate Name</th>
                      <th style="width: 5%">Brand</th>
                      <th style="width: 5%">Status</th>
                      <th style="width: 20%">Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($product as $sl => $product )
                    @php
                        $product['image'] = explode('|', $product->image);
                    @endphp
                <tr>
                    <td>{{ $sl+1 }}</td>
                    <td class="center">{{ $product->code }}</td>
                    <td class="center">{{ $product->name }}</td>
                    <td class="center">{!! substr($product->desc,0,300) !!}</td>
                    <td class="center">
                        &#2547; {{ $product->price }}</td>
                    <td class="center">

                        @foreach ($product->image as $img)
                            <img src="{{ asset('product/'.$img) }}" alt="">
                        @endforeach

                    </td>
                    <td class="center">{{ $product->category->name }}</td>
                    <td class="center">{{ $product->SubCategory->subCatName }}</td>
                    <td class="center">{{ $product->Brand->brandName }}</td>
                    <td class="center">
                        @if ($product->status==1)
                        <span class="label label-success">Active</span>
                        @else
                        <span class="label">Inactive</span>
                        @endif

                    </td>
                    <td class="center">
                        @if ($product->status==1)
                        <a class="btn btn-success" href="{{ url('/ProDeactive/'.$product->id) }}">
                            <i class="halflings-icon white thumbs-down"></i>
                        </a>
                        @else
                        <a class="btn btn-danger" href="{{ url('/ProActive/'.$product->id) }}">
                            <i class="halflings-icon white thumbs-up"></i>
                        </a>
                        @endif

                        <a class="btn btn-info" href="{{ url('/ProductEdits/'.$product->id) }}">
                            <i class="halflings-icon white edit"></i>
                        </a>
                        <a class="btn btn-danger" href="{{ url('/delete/product/'.$product->id) }}">
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
