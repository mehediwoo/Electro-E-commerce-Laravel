<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            @foreach ($collect as $collect)
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('category/'.$collect->image) }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>{{ $collect->name }}<br>Collection</h3>
                        <a href="{{ url('/'.$collect->name.'/'.$collect->id) }}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /shop -->


        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
