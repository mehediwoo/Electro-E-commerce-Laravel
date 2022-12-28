
<div id="aside" class="col-md-3">
    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Categories</h3>
        <div class="checkbox-filter">
            @foreach ($cate as $cate)
            @php
                $catProduct =\App\Models\Product::CatProduct($cate->id);
            @endphp
            <div class="input-checkbox">
                <label for="category-1">
                    <span></span>
                    <a href="{{ url('/Shop/'.$cate->name.'/'.$cate->id) }}">{{ $cate->name }}</a>
                    <small>({{ $catProduct }})</small>
                </label>
            </div>
            @endforeach

        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Price</h3>
        <div class="price-filter">
            <div id="price-slider"></div>
            <div class="input-number price-min">
                <input id="price-min" type="number">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
            <span>-</span>
            <div class="input-number price-max">
                <input id="price-max" type="number">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Brand</h3>
        <div class="checkbox-filter">

            @foreach ($brand as $brand)
            @php
                $brandProduct = \App\Models\Product::BrandProduct($brand->id)
            @endphp
            <div class="input-checkbox">
                <label for="brand-1">
                    <span></span>
                    <a href="{{ url('/Shops/'.$brand->brandName.'/'.$brand->id) }}">{{ $brand->brandName }}</a>

                    <small>({{ $brandProduct }})</small>
                </label>
            </div>
            @endforeach

        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Top selling</h3>
        <div class="product-widget">
            <div class="product-img">
                <img src="./img/product01.png" alt="">
            </div>
            <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
            </div>
        </div>

        <div class="product-widget">
            <div class="product-img">
                <img src="./img/product02.png" alt="">
            </div>
            <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
            </div>
        </div>

        <div class="product-widget">
            <div class="product-img">
                <img src="./img/product03.png" alt="">
            </div>
            <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
            </div>
        </div>
    </div>
    <!-- /aside Widget -->
</div>
