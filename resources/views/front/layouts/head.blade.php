@php

$categories = \App\Models\ProductCategory::where('category_status','=','1')->orderby('category_name')->get()->pluck('category_name','id');
$brands = \App\Models\Brand::where('brand_status','=','1')->get();
$subcategories = \App\Models\SubCategory::where('subcategory_status','=','1')->orderby('subcategory_name')->get();
$singleproducts = \App\Models\Product::where('product_status','=','1')->get();
@endphp


<!--====================  header area ====================-->
    <div class="header-area header-sticky">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                   
                    <!--=======  header wrapper  =======-->
                    <div class="header-wrapper d-none d-lg-flex" style=" margin: 10px 10px;">
                        <!-- logo -->
                        <div class="logo">
                            <a href="{{route('homepage')}}">
                                <img src="assets/img/logo.png" class="img-fluid" alt="">
                            </a>
                        </div>
                        <!-- menu wrapper -->
                        <div class="header-title-wrapper" style="margin: 0 200px; font-size:30px;">
                            <h3 style="margin-top: 0px;"></h3>
                        </div>

                        <!-- header icon -->
                        <div class="header-icon-wrapper">
                        <ul class="icon-list">
                            
                                <li>
                                <a href="https://api.whatsapp.com/send?phone=+910123456789" target="_blank" style="font-size: 18px;"><img src="assets/img/whatsapp.png" alt=""><span>Whatsapp us your orders!</span></a>
                                </li>
                                
                                <li>
                                    <div class="header-cart-icon">
                                        <a href="{{route('cart')}}">
                                            <i class="ion-bag" style="font-size:25px;"></i>
                                            <span class="counter"></span>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class=" dropdown header-settings-icon">
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
                                        <a href="javascript: openLoginModal()">
                                            <!-- <div class="setting-button">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div> -->
                                           <h4 class="title">Login/Signup</h4>
                                        </a>
                                        @endif
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>

                    <ul class="header-wrapper d-none d-lg-flex search-bar">
                        <li style="margin-top:20px; margin-left:10%; width:60%;">

                            <select id ="catdropdown">
                            <option value="" style="color: #342a2a;">&nbsp;All&nbsp;</option>
                            @foreach($categories as $catid => $cat)
                                   <option value="{{$catid}}" style="padding-left: 20px;">{{$cat}}</option>
                                    @endforeach
                                   </select>
                             <input type="text" class="search" placeholder="Search For Products">
                        </li>
                        <li><a href="#" style="font-size: 18px; margin:20px 30px 0 0; height:30px; color:black;">homedecor@gmail.com</a></li>
                        <li>
                            <a href="tel:+910123456789" style="font-size: 18px; height:30px; margin-top:20px; color:black; "><i class="fa fa-phone"></i><span>+910123456789</span></a>  
                        </li> 
                    </ul>
                   
                    <div class="header-wrapper d-none d-lg-flex navigation-menu-wrapper" style="margin-left:30%;">
                        <nav>
                        <ul>
                                <li class="menu-item-has-children"><a href="shop-left-sidebar.html">SHOP</a>
                                    <ul class="mega-menu four-column">
                                        <li><a href="#">Shop By Brands</a>
                                            <ul>
                                                @foreach($brands as $brand)
                                                <li><a href="{{$brand->id }}">{{$brand->brand_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="shop-list-left-sidebar.html">Shop By Sub Categories</a>
                                            <ul>
                                                @foreach($subcategories as $subcategory)
                                                <li><a href="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="single-product.html">Shop By Products</a>
                                            <ul>
                                                @foreach($singleproducts as $singleproduct)
                                                <li><a href="{{$singleproduct->id}}">{{$singleproduct->product_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="single-product.html">Single Product</a>

                                        </li>
                                        <li class="megamenu-banner d-none d-lg-block mt-30 w-100">
                                            <a href="shop-left-sidebar.html" class="mb-0">

                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children"><a href="blog-left-sidebar.html">GALLERY</a>

                                </li>

                                <li><a href="#">ABOUT US</a></li>

                                <li><a href="{{route("contact")}}">CONTACT US</a></li>


                        </ul>
                        </nav>
                    </div> 


                    <!--=======  End of header wrapper  =======-->

                    <!--=======  mobile navigation area  =======-->

                    <div class="header-mobile-navigation d-block d-lg-none">

                        <div class="row align-items-center">
                            <div class="col6 col-md-6">
                                <div class="header-logo">
                                    <a href="index.html">
                                        <img src="assets/img/logo.png" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                             
                            <div class="col6 col-md-6">
                                <div class="mobile-navigation text-right">
                                    <div class="header-icon-wrapper">
                                        
                                        <ul class="icon-list justify-content-end">
                                            
                                                <li>
                                                    <a href="https://api.whatsapp.com/send?phone=+919740876659" target="_blank" style="font-size: 18px;"><img src="https://pragathiorganic.in/images/whatsapp.svg" alt=""></a>
                                                    </li>
                                                    <li>
                                                        <a href="tel:+919740876659" style="font-size: 18px;"><i class="fa fa-phone"></i></a>  
                                                </li> 

                                            <li>
                                                <div class="header-cart-icon">
                                                    <a href="cart.html">
                                                        <i class="ion-bag"></i>
                                                        <span class="counter"></span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="mobile-menu-icon" id="mobile-menu-trigger"><i class="fa fa-bars"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br/>
                        <ul>
                            <li style="margin-top:auto; margin-left:20px;">
                                    
                                                    <select id ="catdropdown" style="width: 30%;">
                                                    <option value="" style="color: #342a2a;">&nbsp;All&nbsp;</option>
                                                    @foreach($categories as $catid => $cat)
                                                           <option value="{{$catid}}" style="padding-left: 20px;">{{$cat}}</option>
                                                            @endforeach
                                                           </select>
                                                     <input type="text" class="search" placeholder="Search For Products" style="width:70%;">
                            </li> 
                        </ul>

                    </div>
                    <!--=======  End of mobile navigation area  =======-->

                </div>
            </div>
        </div>
    </div>

    <!--====================  End of header area  ====================-->

