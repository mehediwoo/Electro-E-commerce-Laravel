@extends('layout.app')
@section('title','Checkout')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title" style="color:#D10024">Shipping address</h3>
                    </div>
                    <form action="{{ url('/save-shipping-details') }}">

                        <div class="form-group">
                            <input class="input" type="text" name="name" placeholder="Your Name">
                            @error('name')
                                <div style="color: #D10024">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email">
                            @error('email')
                                <div style="color: #D10024">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Address">
                            @error('address')
                                <div style="color: #D10024">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="city" placeholder="City">
                            @error('city')
                                <div style="color: #D10024">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="country" placeholder="Country">
                            @error('country')
                                <div style="color: #D10024">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                            @error('zip-code')
                                <div style="color: #D10024">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="tel" placeholder="Telephone">
                            @error('tel')
                                <div style="color: #D10024">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button style="float: right" type="submit" class="primary-btn order-submit">Save & Place order</button>
                        </div>
                    </form>
                </div>
                <!-- /Billing Details -->

                <!-- Order notes -->

                <!-- /Order notes -->
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
