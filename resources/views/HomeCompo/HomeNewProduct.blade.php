<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @foreach ($firstCate as $first)
                            <li class="active"><a data-toggle="tab" href="#{{ $first->name }}">{{ $first->name }}</a></li>
                            @endforeach
                            @foreach ($secondCat as $seconds)
                            <li><a data-toggle="tab" href="#{{ $seconds->name }}">{{ $seconds->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->

                        <div id="{{ $first->name }}" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                @foreach ($ProTab as $ProTab)
                                @php
                                    $product['image'] = explode('|', $ProTab->image);
                                    $images = $product['image'][0];
                                @endphp
                                <div class="product">
                                    <div class="product-img">
                                        <img height="340px" width="300px" src="{{ asset('product/'.$images) }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $ProTab->category->name }}</p>
                                        <h3 class="product-name"><a href="{{ 'single/product/'.$ProTab->id }}">{{ $ProTab->name }}</a></h3>
                                        <h4 class="product-price">&#2547; {{ $ProTab->price }} <del class="product-old-price">&#2547; {{ $ProTab->oldPrice }} </del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><a href="{{ 'single/product/'.$ProTab->id }}"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>

                                        </div>
                                    </div>
                                    <form action="{{ url('/add-to-cart/'.$ProTab->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="id" value="{{ $ProTab->id }}">
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>
                                    </form>

                                </div>
                                @endforeach
                                <!-- /product -->
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>

                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
