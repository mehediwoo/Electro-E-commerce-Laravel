@extends('admin.master.app')
@section('title','Dashboard')
@section('content')


<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{ '/Dashboard' }}">Dashboard</a></li>
</ul>


@endsection
