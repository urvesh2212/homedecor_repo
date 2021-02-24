@extends('front.root')
  @section('content')
<!--====================  breadcrumb area ====================-->
<div class="breadcrumb-area section-space--half">
        <div class="container wide">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb wrpapper  =======-->
                    <div class="breadcrumb-wrapper breadcrumb-bg">
                        <!--=======  breadcrumb content  =======-->
                        <div class="breadcrumb-content">
                            <h2 class="breadcrumb-content__title">Single Product</h2>
                            <ul class="breadcrumb-content__page-map">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Single Product</li>
                            </ul>
                        </div>                                                                      
                        <!--=======  End of breadcrumb content  =======-->
                    </div>
                    <!--=======  End of breadcrumb wrpapper  =======-->
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->
    <!--====================  page content area ====================-->
    <div class="page-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  page wrapper  =======-->
                    <div class="page-wrapper">
                        <div class="page-content-wrapper">
                            <!--=======  single product main content area  =======-->
                            <div class="single-product-main-content-area section-space">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!--=======  product details slider area  =======-->

                                        <div class="product-details-slider-area product-details-slider-area--side-move">
                                            <div class="row row-5">
                                                <div class="col-md-9 order-1 order-md-2">
                                                    <div class="big-image-wrapper">
                                                        <div class="enlarge-icon">
                                                            <a class="btn-zoom-popup" href="javascript:void(0)" data-tippy="Click to enlarge" data-tippy-placement="left" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><i class="pe-7s-expand1"></i></a>
                                                        </div>
                                                        <div class="product-details-big-image-slider-wrapper product-details-big-image-slider-wrapper--side-space ht-slick-slider" data-slick-setting='{
                    "slidesToShow": 1,
                    "slidesToScroll": 1,
                    "arrows": false,
                    "autoplay": false,
                    "autoplaySpeed": 5000,
                    "fade": true,
                    "speed": 500,
                    "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                    "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                }' data-slick-responsive='[
                    {"breakpoint":1501, "settings": {"slidesToShow": 1, "arrows": false} },
                    {"breakpoint":1199, "settings": {"slidesToShow": 1, "arrows": false} },
                    {"breakpoint":991, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                    {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                    {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                    {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} }
                ]'>
                                                            <div class="single-image">
                                                                <img src="assets/img/products/big1-1.jpg" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="single-image">
                                                                <img src="assets/img/products/big1-2.jpg" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="single-image">
                                                                <img src="assets/img/products/big1-3.jpg" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="single-image">
                                                                <img src="assets/img/products/big1-4.jpg" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="single-image">
                                                                <img src="assets/img/products/big1-5.jpg" class="img-fluid" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 order-2 order-md-1">
                                                    <div class="product-details-small-image-slider-wrapper product-details-small-image-slider-wrapper--vertical-space ht-slick-slider" data-slick-setting='{
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "centerMode": false,
                "arrows": true,
                "vertical": true,
                "autoplay": false,
                "autoplaySpeed": 5000,
                "speed": 500,
                "asNavFor": ".product-details-big-image-slider-wrapper",
                "focusOnSelect": true,
                "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-up" },
                "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-down" }
            }' data-slick-responsive='[
                {"breakpoint":1501, "settings": {"slidesToShow": 3, "arrows": true} },
                {"breakpoint":1199, "settings": {"slidesToShow": 3, "arrows": true} },
                {"breakpoint":991, "settings": {"slidesToShow": 3, "arrows": true, "slidesToScroll": 1} },
                {"breakpoint":767, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1, "vertical": false} },
                {"breakpoint":575, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1, "vertical": false} },
                {"breakpoint":479, "settings": {"slidesToShow": 2, "arrows": false, "slidesToScroll": 1, "vertical": false} }
            ]'>
                                                        <div class="single-image">
                                                            <img src="assets/img/products/big1-1.jpg" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="single-image">
                                                            <img src="assets/img/products/big1-2.jpg" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="single-image">
                                                            <img src="assets/img/products/big1-3.jpg" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="single-image">
                                                            <img src="assets/img/products/big1-4.jpg" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="single-image">
                                                            <img src="assets/img/products/big1-5.jpg" class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--=======  End of product details slider area  =======-->
                                    </div>
                                    <div class="col-lg-6">
                                        <!--=======  single product content description  =======-->
                                        <div class="single-product-content-description">
                                            <p class="single-info">Brands <a href="shop-left-sidebar.html">Dolor</a> </p>
                                            <h4 class="product-title">Lorem ipsum dolor set amet decor</h4>
                                            <div class="product-rating">
                                                <span class="rating">
            <i class="ion-android-star active"></i>
            <i class="ion-android-star active"></i>
            <i class="ion-android-star active"></i>
            <i class="ion-android-star active"></i>
            <i class="ion-android-star-outline"></i>
        </span>

                                                <span class="review-count"> <a href="#">(2 reviews)</a> | <a href="#">Write A Review</a> </span>
                                            </div>

                                            <p class="single-grid-product__price"><span class="discounted-price">$100.00</span> <span class="main-price discounted">$120.00</span></p>

                                            <p class="single-info">Product Code: <span class="value">CODE123</span> </p>
                                            <p class="single-info">Reward Points: <span class="value">200</span> </p>
                                            <p class="single-info">Availability: <span class="value">In Stock</span> </p>

                                            <p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. At, delectus. Voluptates omnis distinctio vitae quo quia veniam minima dolorem hic necessitatibus pariatur, quae fuga similique optio laboriosam assumenda voluptatum aperiam.</p>

                                            <div class="product-actions">
                                                <div class="quantity-selection">
                                                    <label>Qty</label>
                                                    <input type="number" value="1" min="1">
                                                </div>

                                                <div class="product-buttons">
                                                    <a class="cart-btn" href="#"> <i class="ion-bag"></i> ADD TO CART</a>
                                                    <span class="wishlist-compare-btn">
                <a> <i class="ion-heart"></i></a>
                <a> <i class="ion-android-options"></i></a>
            </span>
                                                </div>

                                            </div>

                                            <div class="social-share-buttons mt-20">
                                                <h5>share this product</h5>
                                                <ul>
                                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                            <p class="single-info mb-0">Tags: <a href="shop-left-sidebar.html">Dolor</a> , <a href="shop-left-sidebar.html">Ipsum</a>, <a href="shop-left-sidebar.html">Lorem</a> </p>


                                        </div>
                                        <!--=======  End of single product content description  =======-->
                                    </div>
                                </div>
                            </div>
                            <!--=======  End of single product main content area  =======-->
                            <!--=======  product description review   =======-->

                            <div class="product-description-review-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!--=======  product description review container  =======-->

                                        <div class="tab-slider-wrapper product-description-review-container  section-space--inner">
                                            <nav>
                                                <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="description-tab" data-toggle="tab" href="#product-description" role="tab" aria-selected="true">Description</a>
                                                    <a class="nav-item nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-selected="false">Reviews (1)</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="product-description" role="tabpanel" aria-labelledby="description-tab">
                                                    <!--=======  product description  =======-->

                                                    <div class="product-description">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>

                                                        <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.</p>
                                                    </div>

                                                    <!--=======  End of product description  =======-->
                                                </div>
                                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                                    <!--=======  review content  =======-->

                                                    <div class="product-rating-wrap">
                                                        <div class="pro-avg-rating">
                                                            <h4>4.5 <span>(Overall)</span></h4>
                                                            <span>Based on 9 Comments</span>
                                                        </div>
                                                        <div class="rating-list">
                                                            <div class="sin-list float-left">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <span>(5)</span>
                                                            </div>
                                                            <div class="sin-list float-left">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <span>(3)</span>
                                                            </div>
                                                            <div class="sin-list float-left">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <span>(1)</span>
                                                            </div>
                                                            <div class="sin-list float-left">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <span>(0)</span>
                                                            </div>
                                                            <div class="sin-list float-left">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <span>(0)</span>
                                                            </div>
                                                        </div>
                                                        <div class="ratings-wrapper">

                                                            <div class="sin-ratings">
                                                                <div class="rating-author">
                                                                    <h3>Cristopher Lee</h3>
                                                                    <div class="rating-star">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <span>(5)</span>
                                                                    </div>
                                                                </div>
                                                                <p>enim ipsam voluptatem quia voluptas sit
                                                                    aspernatur aut odit aut fugit, sed quia res eos
                                                                    qui ratione voluptatem sequi Neque porro
                                                                    quisquam est, qui dolorem ipsum quia dolor sit
                                                                    amet, consectetur, adipisci veli</p>
                                                            </div>

                                                            <div class="sin-ratings">
                                                                <div class="rating-author">
                                                                    <h3>Rashed Mahmud</h3>
                                                                    <div class="rating-star">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <span>(5)</span>
                                                                    </div>
                                                                </div>
                                                                <p>enim ipsam voluptatem quia voluptas sit
                                                                    aspernatur aut odit aut fugit, sed quia res eos
                                                                    qui ratione voluptatem sequi Neque porro
                                                                    quisquam est, qui dolorem ipsum quia dolor sit
                                                                    amet, consectetur, adipisci veli</p>
                                                            </div>

                                                            <div class="sin-ratings">
                                                                <div class="rating-author">
                                                                    <h3>Hasan Mubarak</h3>
                                                                    <div class="rating-star">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <span>(5)</span>
                                                                    </div>
                                                                </div>
                                                                <p>enim ipsam voluptatem quia voluptas sit
                                                                    aspernatur aut odit aut fugit, sed quia res eos
                                                                    qui ratione voluptatem sequi Neque porro
                                                                    quisquam est, qui dolorem ipsum quia dolor sit
                                                                    amet, consectetur, adipisci veli</p>
                                                            </div>

                                                        </div>
                                                        <div class="rating-form-wrapper fix">
                                                            <h3>Add your Comments</h3>
                                                            <form action="#">
                                                                <div class="rating-form row">
                                                                    <div class="col-12 mb-15">
                                                                        <h5>Rating:</h5>
                                                                        <div class="rating-star fix">
                                                                            <i class="fa fa-star-o"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12 form-group">
                                                                        <label for="name">Name:</label>
                                                                        <input id="name" placeholder="Name" type="text">
                                                                    </div>
                                                                    <div class="col-md-6 col-12 form-group">
                                                                        <label for="email">Email:</label>
                                                                        <input id="email" placeholder="Email" type="text">
                                                                    </div>
                                                                    <div class="col-12 form-group">
                                                                        <label for="your-review">Your Review:</label>
                                                                        <textarea name="review" id="your-review" placeholder="Write a review"></textarea>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <input value="add review" type="submit">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <!--=======  End of review content  =======-->
                                                </div>
                                            </div>
                                        </div>

                                        <!--=======  End of product description review container  =======-->
                                    </div>
                                </div>
                            </div>

                            <!--=======  End of product description review   =======-->
                            <!--====================  single row slider ====================-->
                            <div class="single-row-slider-area section-space--inner-top">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <!--=======  section title  =======-->
                                        <div class="section-title-wrapper text-center section-space--half">
                                            <h2 class="section-title">Related Products</h2>
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

                                                <div class="col">
                                                    <!--=======  single grid product  =======-->
                                                    <div class="single-grid-product">
                                                        <div class="single-grid-product__image">
                                                            <div class="single-grid-product__label">
                                                                <span class="sale">-20%</span>
                                                                <span class="new">New</span>
                                                            </div>
                                                            <a href="single-product.html">
                                                                <img src="assets/img/products/1-600x800.jpg" class="img-fluid" alt="">
                                                                <img src="assets/img/products/1_1-600x800.jpg" class="img-fluid" alt="">
                                                            </a>

                                                            <div class="hover-icons">
                                                                <a href="javascript:void(0)"><i class="ion-bag"></i></a>
                                                                <a href="javascript:void(0)"><i class="ion-heart"></i></a>
                                                                <a href="javascript:void(0)"><i class="ion-android-options"></i></a>
                                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#quick-view-modal-container"><i class="ion-android-open"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="single-grid-product__content">
                                                            <div class="single-grid-product__category-rating">
                                                                <span class="category"><a href="shop-left-sidebar.html">Decor</a></span>
                                                                <span class="rating">
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star-outline"></i>
                                        </span>
                                                            </div>

                                                            <h3 class="single-grid-product__title"> <a href="single-product.html">Cillum dolore lorem ipsum decoration item</a></h3>
                                                            <p class="single-grid-product__price"><span class="discounted-price">$100.00</span> <span class="main-price discounted">$120.00</span></p>
                                                            <div class="product-countdown" data-countdown="2020/06/01"></div>
                                                        </div>
                                                    </div>
                                                    <!--=======  End of single grid product  =======-->
                                                </div>

                                                <div class="col">
                                                    <!--=======  single grid product  =======-->
                                                    <div class="single-grid-product">
                                                        <div class="single-grid-product__image">
                                                            <div class="single-grid-product__label">
                                                                <span class="sale">-20%</span>
                                                            </div>
                                                            <a href="single-product.html">
                                                                <img src="assets/img/products/2-600x800.jpg" class="img-fluid" alt="">
                                                                <img src="assets/img/products/2_1-600x800.jpg" class="img-fluid" alt="">
                                                            </a>

                                                            <div class="hover-icons">
                                                                <a href="javascript:void(0)"><i class="ion-bag"></i></a>
                                                                <a href="javascript:void(0)"><i class="ion-heart"></i></a>
                                                                <a href="javascript:void(0)"><i class="ion-android-options"></i></a>
                                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#quick-view-modal-container"><i class="ion-android-open"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="single-grid-product__content">
                                                            <div class="single-grid-product__category-rating">
                                                                <span class="category"><a href="shop-left-sidebar.html">Decor</a></span>
                                                                <span class="rating">
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star-outline"></i>
                                        </span>
                                                            </div>

                                                            <h3 class="single-grid-product__title"> <a href="single-product.html">lorem ipsum cillium dolore decoration item</a></h3>
                                                            <p class="single-grid-product__price"><span class="discounted-price">$20.00</span> <span class="main-price discounted">$40.00</span></p>
                                                        </div>
                                                    </div>
                                                    <!--=======  End of single grid product  =======-->
                                                </div>

                                                <div class="col">
                                                    <!--=======  single grid product  =======-->
                                                    <div class="single-grid-product">
                                                        <div class="single-grid-product__image">
                                                            <div class="single-grid-product__label">
                                                                <span class="new">New</span>
                                                            </div>
                                                            <a href="single-product.html">
                                                                <img src="assets/img/products/3-600x800.jpg" class="img-fluid" alt="">
                                                                <img src="assets/img/products/3_1-600x800.jpg" class="img-fluid" alt="">
                                                            </a>

                                                            <div class="hover-icons">
                                                                <a href="javascript:void(0)"><i class="ion-bag"></i></a>
                                                                <a href="javascript:void(0)"><i class="ion-heart"></i></a>
                                                                <a href="javascript:void(0)"><i class="ion-android-options"></i></a>
                                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#quick-view-modal-container"><i class="ion-android-open"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="single-grid-product__content">
                                                            <div class="single-grid-product__category-rating">
                                                                <span class="category"><a href="shop-left-sidebar.html">Vase</a></span>
                                                                <span class="rating">
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star-outline"></i>
                                        </span>
                                                            </div>

                                                            <h3 class="single-grid-product__title"> <a href="single-product.html">cillium dolore lorem ipsum decoration item</a></h3>
                                                            <p class="single-grid-product__price"><span class="discounted-price">$40.00</span> <span class="main-price discounted">$60.00</span></p>
                                                        </div>
                                                    </div>
                                                    <!--=======  End of single grid product  =======-->
                                                </div>

                                                <div class="col">
                                                    <!--=======  single grid product  =======-->
                                                    <div class="single-grid-product">
                                                        <div class="single-grid-product__image">

                                                            <a href="single-product.html">
                                                                <img src="assets/img/products/4-600x800.jpg" class="img-fluid" alt="">
                                                                <img src="assets/img/products/4_1-600x800.jpg" class="img-fluid" alt="">
                                                            </a>

                                                            <div class="hover-icons">
                                                                <a href="javascript:void(0)"><i class="ion-bag"></i></a>
                                                                <a href="javascript:void(0)"><i class="ion-heart"></i></a>
                                                                <a href="javascript:void(0)"><i class="ion-android-options"></i></a>
                                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#quick-view-modal-container"><i class="ion-android-open"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="single-grid-product__content">
                                                            <div class="single-grid-product__category-rating">
                                                                <span class="category"><a href="shop-left-sidebar.html">Furniture</a></span>
                                                                <span class="rating">
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star-outline"></i>
                                        </span>
                                                            </div>

                                                            <h3 class="single-grid-product__title"> <a href="single-product.html">Cillum dolore lorem ipsum decoration item</a></h3>
                                                            <p class="single-grid-product__price"><span class="main-price">$120.00</span></p>
                                                        </div>
                                                    </div>
                                                    <!--=======  End of single grid product  =======-->
                                                </div>

                                                <div class="col">
                                                    <!--=======  single grid product  =======-->
                                                    <div class="single-grid-product">
                                                        <div class="single-grid-product__image">
                                                            <div class="single-grid-product__label">
                                                                <span class="sale">-20%</span>
                                                                <span class="new">New</span>
                                                            </div>
                                                            <a href="single-product.html">
                                                                <img src="assets/img/products/5-600x800.jpg" class="img-fluid" alt="">
                                                                <img src="assets/img/products/5_1-600x800.jpg" class="img-fluid" alt="">
                                                            </a>

                                                            <div class="hover-icons">
                                                                <a href="javascript:void(0)"><i class="ion-bag"></i></a>
                                                                <a href="javascript:void(0)"><i class="ion-heart"></i></a>
                                                                <a href="javascript:void(0)"><i class="ion-android-options"></i></a>
                                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#quick-view-modal-container"><i class="ion-android-open"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="single-grid-product__content">
                                                            <div class="single-grid-product__category-rating">
                                                                <span class="category"><a href="shop-left-sidebar.html">Decor</a></span>
                                                                <span class="rating">
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star-outline"></i>
                                        </span>
                                                            </div>

                                                            <h3 class="single-grid-product__title"> <a href="single-product.html">Cillum dolore lorem ipsum decoration item</a></h3>
                                                            <p class="single-grid-product__price"><span class="discounted-price">$80.00</span> <span class="main-price discounted">$100.00</span></p>
                                                        </div>
                                                    </div>
                                                    <!--=======  End of single grid product  =======-->
                                                </div>

                                            </div>
                                        </div>
                                        <!--=======  End of single row slider wrapper  =======-->
                                    </div>
                                </div>

                            </div>
                            <!--====================  End of single row slider  ====================-->
                        </div>
                    </div>
                    <!--=======  End of page wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of page content area  ====================-->
    <!--====================  newsletter area ====================-->
    <div class="newsletter-area section-space--inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="newsletter-wrapper">
                        <p class="small-text">Special Ofers For Subscribers</p>
                        <h3 class="title">Ten Percent Member Discount</h3>
                        <p class="short-desc">Subscribe to our newsletters now and stay up to date with new collections, the latest lookbooks and exclusive offers.</p>

                        <div class="newsletter-form">
                            <form id="mc-form" class="mc-form">
                                <input type="email" placeholder="Enter Your Email Address Here..." required>
                                <button type="submit" value="submit">SUBSCRIBE</button>
                            </form>

                        </div>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div>
                        <!-- mailchimp-alerts end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection