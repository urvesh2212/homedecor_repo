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
                    <div class="header-wrapper d-none d-lg-flex">
                     <div class="col-lg-2 col-md-2" style="height: 100%; padding: 0 0; border-right: 1px solid #eee;">
                        <div class="logo">
                            <a href="{{route('homepage')}}">
                                <img src="{{asset('assets/img/Ekikai.jpg')}}" class="img-fluid" alt="" style="height: 100px">
                            </a>
                        </div>
                     </div>
                
                
                     <div class="col-lg-10 col-md-10">
                      <!--=======  header wrapper  =======-->
                        <div class="header-wrapper d-none d-lg-flex" style=" margin: 0px 10px; border-bottom: 1px solid #eee;">
                            <!-- logo -->
                    
                            <!-- menu wrapper -->


                            <!-- header icon -->
                            <div class="header-icon-wrapper" style="margin: 10px 10px 0 0"> 
                            <ul class="icon-list">
                                    <li>
                                        <a href="mailto:myekikai@gmail.com" style="font-size: 18px;"><i class="fa fa-envelope"></i>&nbsp;<span>myekikai@gmail.com</span></a>
                                    </li>
                                    <li>
                                        <a href="tel:+917337763918" style="font-size: 18px;;"><i class="fa fa-phone"></i>&nbsp;<span>+91 7337763918</span></a>  
                                    </li> 
                                    <li>
                                    <a href="https://api.whatsapp.com/send?phone=+917337763918" target="_blank" style="font-size: 18px;"><img src="{{asset('assets/img/whatsapp.png')}}" alt=""><span>Whatsapp us your orders!</span></a>
                                    </li>
                                    
                            
                                </ul>
                            </div>
                        </div>

                        <div class="header-wrapper d-none d-lg-flex" style="padding: 5px 0; margin:0 10px; border-bottom: 1px solid #eee;">
                            <div class="header-icon-wrapper"> 
                                <ul class="icon-list" style="margin-bottom: 0px; justify-content: center">
                                <li style="width:66%; height: 40px;">

                                    <div class="search-bar">
                                         <select id ="catdropdown">
                                       <option value="" style="color: #342a2a;">&nbsp;All Category&nbsp;</option>
                                       @foreach($categories as $catid => $cat)
                                        <option value="{{$catid}}" style="padding-left: 20px;">{{$cat}}</option>
                                            @endforeach
                                        </select>
                                        <form>
                                            <input name="search" class="search" placeholder="Search Products Here....." type="search">
                                            <button class="btnn"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </li>
                            
                                <li style="height: 40px;">
                                    <div class="header-cart-icon" style="padding-top: 5px;">
                                        <a href="{{route('cart')}}">
                                            <i class="ion-bag" style="font-size:25px;"></i>
                                            <span class="cartcounter" style="font-size: 15px;float: right;">
                                                @if(session()->has('cart_item'))
                                                {{count(session('cart_item'))}}
                                                @endif  
                                            </span>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                @if(session()->has('cart_status_msg'))
                                <span>{{session()->get('cart_status_msg')}}</span>
                                </li>
                                @endif
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
                    
                        <div class="header-wrapper d-none d-lg-flex navigation-menu-wrapper" style="margin-left:10%;">
                            <nav>
                            <ul style="margin-bottom: 0px;">
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

                                    <li><a href="{{route("about")}}">ABOUT US</a></li>

                                    <li><a href="{{route("contact")}}">CONTACT US</a></li>


                            </ul>
                            </nav>
                        </div> 
                     </div>
                    </div>

                    <!--=======  End of header wrapper  =======-->

                    <!--=======  mobile navigation area  =======-->

                    <div class="header-mobile-navigation d-block d-lg-none">

                        <div class="row align-items-center">
                            <div class="col-xs-6" style="width: 30%;">
                                <div class="header-logo">
                                    <a href="{{route('homepage')}}">
                                        <img src="{{asset('assets/img/Ekikai.jpg')}}" class="img-fluid" alt="" style="height: 50px; width:70px;">
                                    </a>
                                </div>
                            </div>
                             
                            <div class="col-xs-6" style="width: 70%;">
                                <div class="mobile-navigation text-right">
                                    <div class="header-icon-wrapper">
                                        
                                        <ul class="icon-list justify-content-end">
                                            
                                                <li>
                                                    <a href="https://api.whatsapp.com/send?phone=+917337763918" target="_blank" style="font-size: 18px;"><img src="{{asset('assets/img/whatsapp.png')}}" alt=""></a>
                                                    </li>
                                                    <li>
                                                        <a href="tel:+917337763918" style="font-size: 18px;"><i class="fa fa-phone"></i></a>  
                                                </li> 

                                            <li>
                                                <div class="header-cart-icon">
                                                    <a href="{{route('cart')}}">
                                                        <i class="ion-bag"></i>
                                                        <span class="counter">
                                                            @if(session()->has('cart_item'))
                                                            {{count(session('cart_item'))}}
                                                            @endif   
                                                        </span>
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
                            <li style="margin-top:auto;">
                                    
                                                    {{-- <select id ="catdropdown" style="width: 30%;">
                                                    <option value="" style="color: #342a2a;">&nbsp;All&nbsp;</option>
                                                    @foreach($categories as $catid => $cat)
                                                           <option value="{{$catid}}" style="padding-left: 20px;">{{$cat}}</option>
                                                            @endforeach
                                                           </select>
                                                     <input type="text" class="search" placeholder="Search For Products" style="width:70%;"> --}}

                                                     <div class="search-bar" style="width: 100%">
                                                        <select id ="catdropdown">
                                                      <option value="" style="color: #342a2a;">&nbsp;All&nbsp;</option>
                                                      @foreach($categories as $catid => $cat)
                                                       <option value="{{$catid}}" style="padding-left: 20px;">{{$cat}}</option>
                                                           @endforeach
                                                       </select>
                                                       <form>
                                                           <input name="search" class="search" type="search" style="width: 250px;">
                                                           <button class="btnn"><i class="fa fa-search"></i></button>
                                                       </form>
                                                   </div>
                            </li> 
                        </ul>

                    </div>
                    {{-- <div class="header-mobile-navigation d-block d-lg-none">
                        <div class="row align-items-center">
                            <div class="col-6 col-md-6">
                                <div class="header-logo">
                                    <a href="index.html">
                                        <img src="assets/img/logo.png" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="mobile-navigation text-right">
                                    <div class="header-icon-wrapper">
                                        <ul class="icon-list justify-content-end">
                                            <li>
                                                <div class="header-cart-icon">
                                                    <a href="cart.html">
                                                        <i class="ion-bag"></i>
                                                        <span class="counter">3</span>
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
                    </div> --}}
                    <!--=======  End of mobile navigation area  =======-->

                </div>
            </div>
        </div>
    </div>

    <!--====================  End of header area  ====================-->

