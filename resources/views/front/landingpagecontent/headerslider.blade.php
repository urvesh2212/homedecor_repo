<div class="hero-slider-area section-space">
        <div class="container wide">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  hero slider wrapper  =======-->

                    <div class="hero-slider-wrapper">
                        <div class="ht-slick-slider" data-slick-setting='{
                        "slidesToShow": 1,
                        "slidesToScroll": 1,
                        "arrows": true,
                        "dots": true,
                        "autoplay": true,
                        "autoplaySpeed": 5000,
                        "speed": 1000,
                        "fade": true,
                        "infinite": true,
                        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-chevron-left" },
                        "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-chevron-right" }
                    }' data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 1} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 1, "arrows": false} },
                        {"breakpoint":991, "settings": {"slidesToShow": 1, "arrows": false} },
                        {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false} },
                        {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                    ]'>

                            <!--=======  single slider item  =======-->
                            @foreach($bannerimages as $bannerimage)
                            <div class="single-slider-item">
                                <div class="hero-slider-item-wrapper" style="background-image: url({{$bannerimage->getFirstMediaUrl('bannerslider_img')}})">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="hero-slider-content hero-slider-content--left-space">
                                                    <p class="slider-title slider-title--big-light">AMAZING PRODUCT!</p>
                                                    <p class="slider-title slider-title--big-bold">WALL CLOCK</p>
                                                    <p class="slider-title slider-title--small">Let your Wall reflect the luxurious side of you with our Unique Design 24ct.gold plated Wall Clock.</p>
                                                    <a class="hero-slider-button" href="shop-left-sidebar.html"> <i class="ion-ios-plus-empty"></i> SHOP NOW</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <!--=======  End of single slider item  =======-->

                            <!--=======  single slider item  =======-->

{{--                            <div class="single-slider-item">--}}
{{--                                <div class="hero-slider-item-wrapper hero-slider-bg-2">--}}
{{--                                    <div class="container">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-lg-12">--}}
{{--                                                <div class="hero-slider-content hero-slider-content--left-space">--}}
{{--                                                    <p class="slider-title slider-title--big-light">AMAZING PRODUCT!</p>--}}
{{--                                                    <p class="slider-title slider-title--big-bold">DECOR CHAIR</p>--}}
{{--                                                    <p class="slider-title slider-title--small">An elegant selection of chairs combining comfort & practicality. Providing the perfect solution for large & small scale exhibition seating.</p>--}}
{{--                                                    <a class="hero-slider-button" href="shop-left-sidebar.html"> <i class="ion-ios-plus-empty"></i> SHOP NOW</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <!--=======  End of single slider item  =======-->

                        </div>
                    </div>

                    <!--=======  End of hero slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of hero slider area  ====================-->
    <!--====================  category area ====================-->
    <div class="category-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  category wrapper  =======-->
                    <div class="category-wrapper">
                        <div class="row row-10 masonry-category-layout">
                            @foreach($categories as $category)
                            <div class="col-lg-4 col-sm-6 grid-item">
                                <!--=======  single category item  =======-->
                                <div class="single-category-item">
                                    <div class="single-category-item__image">
                                        <a href="shop-left-sidebar.html">
                                            <img src="{{$category->getFirstMediaUrl('category_img')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="single-category-item__content">
                                        <h3 class="title">{{$category->category_name}}</h3>
                                        <a href="shop-left-sidebar.html">Shop Now <i class="ion-android-arrow-dropright-circle"></i></a>
                                    </div>
                                </div>
                                <!--=======  End of single category item  =======-->
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--=======  End of category wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
