@php 
$variants = App\Models\ProductVariant::where('product_variant_status','=','1')->get();

var_dump(session('cart_item'));
@endphp
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
                

                @foreach ($productdata[0]->product_img as $img)
                <div class="single-image">
                    <img src="{{$img->url}}" class="img-fluid" alt="">
                </div>
                @endforeach
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
                                                        @foreach ($productdata[0]->product_img as $img)
                                                        <div class="single-image">
                                                            <img src="{{$img->url}}" class="img-fluid" alt="">
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--=======  End of product details slider area  =======-->
                                    </div>
                                    <div class="col-lg-6" id="tabs">
                                        <!--=======  single product content description  =======-->
                                        <div class="single-product-content-description">
                                            <p class="single-info">Brands {{$productdata[0]->brandid->brand_name}}</p>
                                            <h4 class="product-title">{{$productdata[0]->product_name}}</h4>
                                            <div class="product-rating">
                                                {{-- <span class="review-count"> <a href="#">(2 reviews)</a> | <a href="#">Write A Review</a> </span> --}}
                                            </div>
                                            @php $counter = 1 ;@endphp
                                            @foreach ($productdata[0]->SubTypeProductid as $item)
                                            <div class="dummyclass">
                                            <div class="{{$item->hsn_code}}" style="display:{{($counter == 1) ? 'block' : 'none'}}">
                                            <p class="single-grid-product__price"><span class="discounted-price">&#8377;{{$item->final_price}}</span></p>
                                                {{-- <span class="main-price discounted">&#8377;120.00</span> --}}

                                            <p class="single-info">Product Code: <span class="value">{{$item->hsn_code}}</span> </p>
                                            {{-- <p class="single-info">Reward Points: <span class="value">200</span> </p> --}}
                                            <p class="single-info">Availability: <span class="value">{{($item->product_subtype_status == 1) ? 'In Stock' : 'Out Of Stock'}}</span> </p>
                                            </div>
                                            </div>
                                            @php $counter++ ;@endphp
                                            @endforeach

                                            <div class="product-buttons">  
                                                <p class="single-info">Product Variant:</p>   
                                                <span class="product-variant-btn">
                                                    @foreach ($productdata[0]->SubTypeProductid as $item)
                                                    @foreach ($variants as $item2)
                                                    @if ($item2->id === $item->product_variant_id)
                                                    @if($item->product_subtype_status != 1)
                                                    <button value="{{$item->hsn_code}}" class="pvariantbtn" style="font-weight:600;line-height:50px;padding:0 35px;transition: .3s;vertical-align:middle;color:#e33;border:2px solid #e33;" type="radio">{{$item2->product_variant_name}}</button>
                                                    @else 
                                                    <a><button value="{{$item->hsn_code}}" class="pvariantbtn" type="radio">{{$item2->product_variant_name}}</button></a>      
                                                    @endif      
                                                    @endif                                                        
                                                    @endforeach
                                                    @endforeach
                                                
                                                </span>
                                            </div>


                                            <p class="product-description">{{$productdata[0]->description}}</p>

                                            <div class="product-actions">
                                                {{-- <div class="quantity-selection">
                                                    <label>Qty</label>
                                                    <input type="number" value="1" min="1">
                                                </div> --}}
                                                @php $counter2 = 1 ;@endphp
                                                @foreach ($productdata[0]->SubTypeProductid as $anchorid)
                                                @if($anchorid->product_subtype_status == 1)
                                                <div class="{{$anchorid->hsn_code}}" style="display:{{($counter2 == 1) ? 'block' : 'none'}}">
                                                    <a class="cart-btn" href="javascript:void(0)" data-value="{{$anchorid->hsn_code}}" style="margin-top: 0px;"> <i class="ion-bag"></i> ADD TO CART</a>
                                                </div>                                                    
                                                @endif
                                            @php $counter2++;    @endphp
                                                @endforeach
                                            </div>
                                            <br/>
                                            {{-- <p class="single-info mb-0">Tags: <a href="shop-left-sidebar.html">Dolor</a> , <a href="shop-left-sidebar.html">Ipsum</a>, <a href="shop-left-sidebar.html">Lorem</a> </p> --}}


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
                                                        <p>{{$productdata[0]->description}}</p>

                                                    </div>

                                                    <!--=======  End of product description  =======-->
                                                </div>
                                                    <!--=======  review content  =======-->

                                                    <div class="product-rating-wrap">
                                                        <div class="pro-avg-rating">
                                                            <h4>{{$productdata[0]->product_review->sum('rating')/count($productdata[0]->product_review)}}<span>(Overall)</span></h4>
                                                            <span>Based on {{count($productdata[0]->product_review)}} Comments</span>
                                                        </div>
                                                        </div>
                                                        <div class="ratings-wrapper">
                                                            @foreach ($productdata[0]->product_review as $review)
                                                                
                                                            <div class="sin-ratings">
                                                                <div class="rating-author">
                                                                    <h3>{{$review->customers->customer_name}}</h3>
                                                                </div>
                                                                <p>Rated: {{$review->rating}}</p>
                                                                <p>{{$review->description}}</p>
                                                            </div>
                                                            @endforeach
                                                        
                                                        </div>
                                                        @if (session()->has('login_status'))
                                           
                                                        <div class="rating-form-wrapper fix">
                                                            @else 
                                                            
                                                            <a href="javascript: openLoginModal()" style="position: absolute;top:90%;left:50%">
                                                                <h4 class="title" >Login/Signup</h4>
                                                            </a> 
                                                       
                                                            <div class="rating-form-wrapper fix" style="height:30%;background-color: rgba(0,0,0,0.4);pointer-events:none">
                                                            
                                                            @endif
                                                            <h3>Add your Comments</h3>
                                                            <form id="feedbackform">
                                                                <div class="rating-form row">
                                                                    <div class="col-12 mb-15">
                                                                        <h5>Rating:</h5>
                                                                        <div class="star-rating">
                                                                            <input id="star-5" type="radio" name="rating" value="5" />
                                                                            <label for="star-5" title="5 stars">
                                                                              <i class="active fa fa-star" aria-hidden="true"></i>
                                                                            </label>
                                                                            <input id="star-4" type="radio" name="rating" value="4" />
                                                                            <label for="star-4" title="4 stars">
                                                                              <i class="active fa fa-star" aria-hidden="true"></i>
                                                                            </label>
                                                                            <input id="star-3" type="radio" name="rating" value="3" />
                                                                            <label for="star-3" title="3 stars">
                                                                              <i class="active fa fa-star" aria-hidden="true"></i>
                                                                            </label>
                                                                            <input id="star-2" type="radio" name="rating" value="2" />
                                                                            <label for="star-2" title="2 stars">
                                                                              <i class="active fa fa-star" aria-hidden="true"></i>
                                                                            </label>
                                                                            <input id="star-1" type="radio" name="rating" value="1" />
                                                                            <label for="star-1" title="1 star">
                                                                              <i class="active fa fa-star" aria-hidden="true"></i>
                                                                            </label>
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
                                                                    <input type="hidden" name="pid" id="pid" value="{{$productdata[0]->id}}">
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

                            <!--=======  End of product description review   =======-->                            <!--====================  single row slider ====================-->
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

                    @foreach ($relatedproducts as $relateditem => $relatedkey)
                    @if ($relatedkey->id != $productdata[0]->id)

                                                <div class="col">
                                                    <!--=======  single grid product  =======-->
                                                        
                                                    <div class="single-grid-product">
                                                        <div class="single-grid-product__image">
                                                            <div class="single-grid-product__label">
                                                                <span>2</span>% off
                                                            </div>
                                                            <a href="single-product.html">
                                                                <img src="{{$relatedkey->getFirstMediaUrl('product_img')}}" class="img-fluid" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="single-grid-product__content">
                                                            <div class="single-grid-product__category-rating">
                                                                <span class="category"><a href="shop-left-sidebar.html"></a></span>
                                                            </div>

                                                            <h3 class="single-grid-product__title"> <a href="single-product.html">{{$relatedkey->product_name}}</a></h3>
                                                            {{-- <div class="product-countdown" data-countdown="2020/06/01"></div> --}}
                                                        </div>
                                                    </div>

                                                    <!--=======  End of single grid product  =======-->
                                                </div>
                                                @endif
                                                @endforeach
                                        


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
    @endsection