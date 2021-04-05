@php

$categories = \App\Models\ProductCategory::where('category_status','=','1')->orderby('category_name')->get()->pluck('category_name','id');
$brands = \App\Models\Brand::where('brand_status','=','1')->get();
$subcategories = \App\Models\SubCategory::where('subcategory_status','=','1')->orderby('subcategory_name')->get();
$singleproducts = \App\Models\Product::where('product_status','=','1')->get();
@endphp


<div class="offcanvas-mobile-menu" id="offcanvas-mobile-menu">
    <a href="javascript:void(0)" class="offcanvas-menu-close" id="offcanvas-menu-close-trigger">
        <i class="ion-android-close"></i>
    </a>

    <div class="offcanvas-wrapper">

        <div class="offcanvas-inner-content">
            {{-- <div class="offcanvas-mobile-search-area">
                <form action="#">
                    <input type="search" placeholder="Search ...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div> --}}

               <div class=" dropdown header-settings-icon offcanvas-settings">
                                                               @if(session()->has('login_status'))
                                            <button class="btn dropdown-toggle" id="menu1" type="button" data-toggle="dropdown" style="background-color: #342a2a; color:white;">
                                                {{session()->get('displaydata')}}
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                              <li role="presentation"><a href="#"><h5><span>My Orders</span></h5></a></li>
                                              <li role="presentation"><a href="#"><h5><span>My Wishlist</span></h5></a></li>
                                              <li role="presentation"><a href="{{route('userdashboard')}}"><h5><span>My Account</span></h5></a></li>
                                              <li role="presentation" class="divider"></li>
                                              <li role="presentation"><a href="{{route('user_logout')}}"><h5><span>Logout</span></h5></a></li>
                                            </ul>

                                        @else
                                        <a href="/mobilelogin">
                                            <!-- <div class="setting-button">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div> -->
                                           <h4 class="title">Login/Signup</h4>
                                        </a>
                                        @endif
                                    </div>

            <nav class="offcanvas-navigation">
                <ul>
                    <li class="menu-item-has-children"><a href="#">Home</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Home 01</a></li>
                            
                        </ul>
                    </li>
                    {{-- <li class="menu-item-has-children"><a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li class="menu-item-has-children"><a href="#">Page List One</a>
                                <ul class="sub-menu">
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Page List Two</a>
                                <ul class="sub-menu">
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="login-register.html">Login Register</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Page List Three</a>
                                <ul class="sub-menu">
                                    <li><a href="compare.html">Compare</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                </ul>
                            </li>

                        </ul> 
                    </li> --}}
                    <li class="menu-item-has-children"><a href="#">Shop</a>
                        <ul class="sub-menu">
                            <li class="menu-item-has-children"><a href="#">Shop By Brands</a>
                                <ul class="sub-menu">
                                        @foreach($brands as $brand)
                                             <li><a href="{{$brand->id }}">{{$brand->brand_name}}</a></li>
                                        @endforeach
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Shop By Sub Categories</a>
                                <ul class="sub-menu">
                                    @foreach($subcategories as $subcategory)
                                          <li><a href="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Single Product One</a>
                                <ul class="sub-menu">
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="single-product-variable.html">Single Product variable</a></li>
                                    <li><a href="single-product-affiliate.html">Single Product affiliate</a></li>
                                    <li><a href="single-product-group.html">Single Product group</a></li>
                                    <li><a href="single-product-tabstyle-2.html">Tab Style 2</a></li>
                                    <li><a href="single-product-tabstyle-3.html">Tab Style 3</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Single Product Two</a>
                                <ul class="sub-menu">
                                    <li><a href="single-product-gallery-left.html">Gallery Left</a></li>
                                    <li><a href="single-product-gallery-right.html">Gallery Right</a></li>
                                    <li><a href="single-product-sticky-left.html">Sticky Left</a></li>
                                    <li><a href="single-product-sticky-right.html">Sticky Right</a></li>
                                    <li><a href="single-product-slider-box.html">Slider Box</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                            <li><a href="blog-post-left-sidebar.html">Blog Post Left Sidebar</a></li>
                            <li><a href="blog-post-right-sidebar.html">Blog Post Right Sidebar</a></li>
                            <li><a href="blog-post-image-format.html">Blog Post Image Format</a></li>
                            <li><a href="blog-post-image-gallery.html">Blog Post Image Gallery</a></li>
                            <li><a href="blog-post-audio-format.html">Blog Post Audio Format</a></li>
                            <li><a href="blog-post-video-format.html">Blog Post Video Format</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>

            <div class="offcanvas-widget-area">
                <div class="off-canvas-contact-widget">
                    <div class="header-contact-info">
                        <ul class="header-contact-info__list">
                            <li><i class="ion-android-phone-portrait"></i> <a href="tel://12452456012">(1245) 2456 012 </a></li>
                            <li><i class="ion-android-mail"></i> <a href="mailto:info@yourdomain.com">info@yourdomain.com</a></li>
                        </ul>
                    </div>
                </div>
                <!--Off Canvas Widget Social Start-->
                <div class="off-canvas-widget-social">
                    <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                    <a href="#" title="Youtube"><i class="fa fa-youtube-play"></i></a>
                    <a href="#" title="Vimeo"><i class="fa fa-vimeo-square"></i></a>
                </div>
                <!--Off Canvas Widget Social End-->
            </div>
        </div>
    </div>

</div>

<!--=======  End of offcanvas mobile menu  =======-->
<!--====================  search overlay ====================-->

{{-- <div class="search-overlay" id="search-overlay">
    <a href="javascript:void(0)" class="close-search-overlay" id="close-search-overlay">
        <i class="ion-ios-close-empty"></i>
    </a> --}}

    <!--=======  search form  =======-->

    {{-- <div class="search-form">
        <form action="#">
            <input type="search" placeholder="Search entire store here ...">
            <button type="submit"><i class="ion-android-search"></i></button>
        </form>
    </div> --}}

    <!--=======  End of search form  =======-->
</div>

<!--====================  End of search overlay  ====================-->
<!--====================  quick view ====================-->

<div class="modal fade quick-view-modal-container" id="quick-view-modal-container" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 col-lg-12">
                    <!--=======  single product main content area  =======-->
                    <div class="single-product-main-content-area">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6">
                                <!--=======  product details slider area  =======-->

                                <div class="product-details-slider-area">


                                    <div class="big-image-wrapper">

                                        <div class="product-details-big-image-slider-wrapper-quick product-details-big-image-slider-wrapper--bottom-space ht-slick-slider" data-slick-setting='{
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


                                    <div class="product-details-small-image-slider-wrapper product-details-small-image-slider-wrapper--horizontal-space ht-slick-slider" data-slick-setting='{
        "slidesToShow": 4,
        "slidesToScroll": 1,
        "arrows": true,
        "autoplay": false,
        "autoplaySpeed": 5000,
        "speed": 500,
        "asNavFor": ".product-details-big-image-slider-wrapper-quick",
        "focusOnSelect": true,
        "centerMode": false,
        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
        "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
    }' data-slick-responsive='[
        {"breakpoint":1501, "settings": {"slidesToShow": 3, "arrows": false} },
        {"breakpoint":1199, "settings": {"slidesToShow": 3, "arrows": false} },
        {"breakpoint":991, "settings": {"slidesToShow": 5, "arrows": false, "slidesToScroll": 1} },
        {"breakpoint":767, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1} },
        {"breakpoint":575, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1} },
        {"breakpoint":479, "settings": {"slidesToShow": 2, "arrows": false, "slidesToScroll": 1} }
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

                                <!--=======  End of product details slider area  =======-->
                            </div>
                            <div class="col-xl-7 col-lg-6">
                                <!--=======  single product content description  =======-->
                                <div class="single-product-content-description">
                                    <p class="single-info">Brands <a href="shop-left-sidebar.html">Dolor</a> </p>
                                    <h4 class="product-title">Lorem ipsum dolor set amet decor</h4>
                                    <div class="product-rating">

                                        <span class="review-count"> <a href="#">(2 reviews)</a> | <a href="#">Write A Review</a> </span>
                                    </div>

                                    <p class="single-grid-product__price"><span class="discounted-price">$100.00</span> <span class="main-price discounted">$120.00</span></p>

                                    <p class="single-info">Product Code: <span class="value">CODE123</span> </p>
                                    <p class="single-info">Reward Points: <span class="value">200</span> </p>
                                    <p class="single-info">Availability: <span class="value">In Stock</span> </p>

                                    <p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. At, delectus. Voluptates omnis distinctio vitae quo quia veniam minima dolorem hic necessitatibus pariatur, quae fuga similique optio laboriosam assumenda voluptatum aperiam.</p>

                                    <div class="product-actions product-actions--quick-view">
                                        <div class="quantity-selection">
                                            <label>Qty</label>
                                            <input type="number" value="1" min="1">
                                        </div>

                                        <div class="product-buttons">
                                            <a class="cart-btn" href="#"> <i class="ion-bag"></i> ADD TO CART</a>
                <a> <i class="ion-heart"></i></a>
                <a> <i class="ion-android-options"></i></a>
            </span>
                                        </div>

                                    </div>


                                </div>
                                <!--=======  End of single product content description  =======-->
                            </div>
                        </div>
                    </div>
                    <!--=======  End of single product main content area  =======-->
                </div>
            </div>
        </div>

    </div>
</div>
<!--====================  End of quick view  ====================-->

<!-- scroll to top  -->
<div id="scroll-top">
    <span>Back to top</span><i class="ion-chevron-right"></i><i class="ion-chevron-right"></i>
</div>
<!-- end of scroll to top -->
