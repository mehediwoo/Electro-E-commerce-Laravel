<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><span style="color:brown">&#2547; </span>
                     BDT</a></li>
                <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                @if (session()->has('email'))
                <li><a href="{{ url('/customer-signout') }}"><i class="fa fa-sign-out"></i>Sign-Out</a></li>
                @else
                <li><a href="{{ url('/customer') }}"><i class="fa fa-sign-in"></i>Login/Registration</a></li>
                @endif

            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('ui/') }}./img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Categories</option>
                                @foreach (getNav() as $category)
                                <option value="0">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                @php
                    $cartIteam =   CartCollection();
                @endphp
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">{{ count($cartIteam) }}</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @foreach ($cartIteam as $iteam)
                                    @php
                                    $images = $iteam['attributes'][0];
                                    $images = explode('|',$images);
                                    $images = $images[0];
                                    @endphp

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ asset('/product/'.$images) }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">{{ $iteam['name'] }}</a></h3>
                                            <h4 class="product-price"><span class="qty">{{ $iteam['quantity'] }}</span>&#2547; {{ $iteam['price'] }}</h4>
                                        </div>
                                        <button class="delete"><a href="{{ url('/cart-remove/'.$iteam['id']) }}" style="color: #fff;"><i class="fa fa-close"></i></a></button>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="cart-summary">
                                    <small>{{ count($cartIteam)}} Item(s) selected</small>
                                    <h5>SUBTOTAL: &#2547;{{ Cart::getSubTotal() }}</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="#">View Cart</a>
                                    <a href="{{ url('/checkout') }}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
