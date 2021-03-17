<div class="single-row-slider-area section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  section title  =======-->
                <div class="section-title-wrapper text-center section-space--half">
                    <h2 class="section-title">Latest Arrivals</h2>
                    <p class="section-subtitle">Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas.</p>
                </div>
                <!--=======  End of section title  =======-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!--=======  single row slider wrapper  =======-->
                <div class="single-row-slider-wrapper">
                    <div class="ht-slick-slider" data-slick-setting='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "arrows": true,
                    "autoplay": false,
                    "autoplaySpeed": 5000,
                    "speed": 1000,
                    "infinite": false,
                    "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-chevron-left" },
                    "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-chevron-right" }
                }' data-slick-responsive='[
                    {"breakpoint":1501, "settings": {"slidesToShow": 4} },
                    {"breakpoint":1199, "settings": {"slidesToShow": 4, "arrows": false} },
                    {"breakpoint":991, "settings": {"slidesToShow": 3, "arrows": false} },
                    {"breakpoint":767, "settings": {"slidesToShow": 2, "arrows": false} },
                    {"breakpoint":575, "settings": {"slidesToShow": 2, "arrows": false} },
                    {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                ]'>
                        @foreach($newproduct as $id => $data)
                        <div class="col">
                            <!--=======  single grid product  =======-->
                            <div class="single-grid-product">
                                <div class="single-grid-product__image">
                                    <div class="single-grid-product__label">
                                        {{-- <span class="sale">-20%</span> --}}

                                    </div>
                                    <a href="single-product.html">
                                        <img src="{{$data->getFirstMediaUrl('product_img','preview')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="single-grid-product__content">
                                    <div class="single-grid-product__category-rating">
                                        <span class="category"><a href="shop-left-sidebar.html">{{$data->product_name}}</a></span>
                                    </div>

                                    <h3 class="single-grid-product__title"> <a href="single-product.html">{{$data->description}}</a></h3>
                                </div>
                            </div>
                            <!--=======  End of single grid product  =======-->
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--=======  End of single row slider wrapper  =======-->
            </div>
        </div>
    </div>
</div>
