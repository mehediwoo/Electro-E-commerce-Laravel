@extends('layout.app')
@section('title','Place Order')
@section('content')

<div class="section">
    <div class="container">
        <div class="row">
            <!-- Order Details -->
            <div class="col-md-2"></div>
            <div class="col-md-8 order-details">
                <div class="section-title text-center">
                    <h3 class="title" style="color: #D10024">Your Order</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>PRODUCT</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    @foreach ($cartArray as $cartIteam)
                    <div class="order-products">
                        <div class="order-col">
                            <div>{{ $cartIteam['quantity']; }} x {{ $cartIteam['name']; }}</div>
                            <div>&#2547; {{ $cartIteam['quantity']*$cartIteam['price']; }}</div>
                        </div>
                    </div>
                    @endforeach
                    <div class="order-col">
                        <div>Shiping</div>
                        <div><strong>FREE</strong></div>
                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total">&#2547; {{ Cart::getSubTotal(); }}</strong></div>
                    </div>
                </div>
                <h4 class="title text-center" style="color: #D10024; text-transform: uppercase;">Select Payment Method</h4>
                <form action="{{ url('/place-order') }}" method="post">
                    @csrf
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-cash" value="Direct_Bank">
                            <label for="payment-cash">
                                <span></span>
                                Cash on Delivery
                            </label>
                            <div class="caption">
                                <p>You can make payment after delivery your product</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1" value="Direct_Bank">
                            <label for="payment-1">
                                <span></span>
                                Direct Bank Transfer
                            </label>
                            <div class="caption">
                                <p>You can make payment Direct Bank Transfer <br> Bank AC: 6029, UCB Bank</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-2" value="Bkash">
                            <label for="payment-2">
                                <span></span>
                                Bkash
                            </label>
                            <div class="caption">
                                <p>Bkash Number: 01518-912417</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-3" value="Nagad">
                            <label for="payment-3">
                                <span></span>
                                Nagad
                            </label>
                            <div class="caption">
                                <p>Nagad Number: 01518-912417</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-rocket" value="Rocket">
                            <label for="payment-rocket">
                                <span></span>
                                Rocket
                            </label>
                            <div class="caption">
                                <p>Rocket Number: 01518-912417</p>
                            </div>
                        </div>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms" name="terms">
                        <label for="terms">
                            <span></span>
                            I've read and accept the <a href="" >terms & conditions</a>
                        </label>
                    </div>
                    <div class="form-group">
                        <button style="float: right" type="submit" class="primary-btn order-submit">Place order</button>
                    </div>
                </form>
            </div>
            <!-- /Order Details -->
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

@endsection
