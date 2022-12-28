@extends('layout.app')
@section('title','Electro::Home')
@section('content')

    @include('HomeCompo.HomeCollection')
    @include('HomeCompo.HomeNewProduct')
    @include('HomeCompo.HomeHotDell')
    @include('HomeCompo.HomeTopSelling')
    @include('HomeCompo.HomeSellingProduct')



@endsection
