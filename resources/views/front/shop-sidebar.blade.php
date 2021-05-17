@extends('front.root')
@section('content')
<!--====================  breadcrumb area ====================-->
 <div class="breadcrumb-content">
    <h2 class="breadcrumb-content__title">Shop</h2>
    <ul class="breadcrumb-content__page-map">
        <li><a href="index.html">Home</a></li>
        <li class="active">Shop</li>
    </ul>
</div>
    <!--====================  End of breadcrumb area  ====================-->

    <!--====================  shop page content area ====================-->
    <div id='ajax_loader' style="background: #ffffff;
    position: fixed;
    height: 100%;
    width: 100%;
    z-index: 5000;
    top: 0;
    left: 0;
    float: left;
    text-align: center;
    padding-top: 25%;
    opacity: .80";
    >
        <img src="{{URL::asset('assets/img/spin.gif')}}">
    </div>
    <div class="page-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  shop page wrapper  =======-->
                    <div class="page-wrapper">
                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  shop page header  =======-->
                                    <div class="shop-header">
                                        <div class="shop-header__left">
                                            <div class="grid-icons">
                                                <button data-target="grid three-column" data-tippy="3" data-tippy-inertia="true" data-tippy-animation="fade" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="roundborder" class="active three-column"></button>
                                                <button data-target="grid four-column" data-tippy="4" data-tippy-inertia="true" data-tippy-animation="fade" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="roundborder" class="four-column d-none d-lg-block"></button>
                                                <button data-target="list" data-tippy="List" data-tippy-inertia="true" data-tippy-animation="fade" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="roundborder" class="list-view"></button>
                                            </div>

                                            <div class="shop-header__left__message">
                                                Showing 1 to 9 of 15 (2 Pages)
                                            </div>
                                        </div>

                                        <div class="shop-header__right">

                                            <div class="single-select-block d-inline-block">
                                                <span class="select-title">Show:</span>
                                                <select>
                                                    <option value="1">10</option>
                                                    <option value="2">20</option>
                                                    <option value="3">30</option>
                                                    <option value="4">40</option>
                                                </select>
                                            </div>

                                            <div class="single-select-block d-inline-block">
                                                <span class="select-title">Sort By:</span>
                                                <select class="pr-0">
                                                    <option value="1">Default</option>
                                                    <option value="2">Name (A-Z)</option>
                                                    <option value="3">Price (min - max)</option>
                                                    <option value="4">Color</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--=======  End of shop page header  =======-->
                                </div>
                                <div class="col-lg-3 order-2 order-lg-1">
                                    <!--=======  page sidebar wrapper =======-->
                                    <div class="page-sidebar-wrapper">
                                        <!--=======  single sidebar widget  =======-->
                                        <div class="single-sidebar-widget">

                                            <h4 class="single-sidebar-widget__title">Categories</h4>
                                            <ul class="single-sidebar-widget__category-list">
                                                @foreach ($productdetails as $item)

                                                <li class="has-children"><a href="#" class="active">{{$item->category_name}}<span class="counter">{{count($item->GetProduct)}}</span></a>
                                                    <ul>
                                                        <li><a href="#">{{$item->GetSubCat->subcategory_name}}<span class="counter"></span></a></li>
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!--=======  End of single sidebar widget  =======-->
                                        <!--=======  single sidebar widget  =======-->
                                        <div class="single-sidebar-widget">
                                            <div class="sidebar-sub-widget-wrapper">
                                                <div class="sidebar-sub-widget">
                                                    <h4 class="sidebar-sub-widget__title sidebar-sub-widget__title--abs-icon">Brands</h4>


                                                   @foreach ($brands as $item)                              
                                                    <ul>
                                                        <li><input type="checkbox" id="{{$item->id}}">&nbsp;{{$item->brand_name}}</li>
                                                    </ul>
                                                     @endforeach 
                                                </div>
                                            </div>
                                        </div>
                                        <!--=======  End of single sidebar widget  =======-->
                                        <!--=======  single sidebar widget  =======-->
                                        
                                        <!--=======  End of single sidebar widget  =======-->
                                    </div>
                                    <!--=======  End of page sidebar wrapper  =======-->
                                </div>
                                <div class="col-lg-9 order-1 order-lg-2">
                                    <!--=======  shop page content  =======-->
                                    <div class="shop-page-content">

                                        <div class="row shop-product-wrap grid three-column">
                                            @foreach ($productdetails[0]->GetProduct as $pdata)
                                                    
                                            <div class="col-12 col-lg-4 col-md-4 col-sm-6">
                                                <!--=======  product grid view  =======-->
                                                <div class="single-grid-product grid-view-product">
                                                    <div class="single-grid-product__image">
                                                        {{-- <div class="single-grid-product__label">

                                                        </div> --}}
                                                        <a href="{{route('singleproductroute',['productid' => $pdata->id,'productname' => str_replace(' ','-',$pdata->product_name)])}}">
                                                            <img src="{{$pdata->getFirstMediaUrl('product_img','preview')}}" class="img-fluid" alt="" style="height:200px; width:200px;">
                                                        </a>


                                                    </div>
                                                    <div class="single-grid-product__content">
                                                        <div class="single-grid-product__category-rating">
                                                            <span class="category"><a href="">{{$productdetails[0]->category_name}}</a></span>

                                                        </div>

                                                        <h3 class="single-grid-product__title"> <a href="single-product.html">{{$pdata->product_name}}</a></h3>
                                                        {{-- <p class="single-grid-product__price"><span class="discounted-price">&#8377; 80.00</span> <span class="main-price discounted">&#8377;100.00</span></p> --}}
                                                    </div>
                                                </div>
                                                <!--=======  End of product grid view  =======-->
                                                <!--=======  list view product  =======-->
                                                <div class="single-grid-product single-grid-product--list-view list-view-product">
                                                    <div class="single-grid-product__image single-grid-product--list-view__image">
                                                        {{-- <div class="single-grid-product__label">

                                                        </div> --}}
                                                        <a href="{{route('singleproductroute',['productid' => $pdata->id,'productname' => str_replace(' ','-',$pdata->product_name)])}}">
                                                            <img src="{{$pdata->getFirstMediaUrl('product_img','preview')}}" class="img-fluid" alt="">
                                                        </a>


                                                    </div>
                                                    <div class="single-grid-product__content single-grid-product--list-view__content">

                                                        <div class="category"><a href="">{{$productdetails[0]->category_name}}</a></div>
                                                        <h3 class="single-grid-product__title single-grid-product--list-view__title"><a href="single-product.html">{{$pdata->product_name}}</a></h3>

                                                        {{-- <p class="single-grid-product__price single-grid-product--list-view__price"><span class="discounted-price">$80.00</span> <span class="main-price discounted">$100.00</span></p>
                                                        <p class="single-grid-product--list-view__product-short-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate cupiditate provident praesentium, esse omnis quis!</p> --}}
                                                    </div>
                                                </div>
                                                <!--=======  End of list view product  =======-->
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>

                                    <!--=======  pagination area =======-->
                                    <div class="pagination-area">
                                        <div class="pagination-area__left">
                                            Showing 1 to 9 of 11 (2 Pages)
                                        </div>
                                        <div class="pagination-area__right">
                                            <ul class="pagination-section">
                                                <li><a class="active" href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">></a></li>
                                                <li><a href="#">>|</a></li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    <!--=======  End of pagination area  =======-->
                                    <!--=======  End of shop page content  =======-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=======  End of shop page wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of shop page content area  ====================-->

    @endsection