@php 

$categories = \App\Models\ProductCategory::orderby('category_name')->get()->pluck('category_name','id');
@endphp
<!--====================  header area ====================-->
    <div class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul>
                        <li style="margin-top:20px; margin-left:25%;">
                                
                            <select id ="catdropdown">
                            <option value="" style="color: #342a2a;">&nbsp;All&nbsp;</option>    
                            @foreach($categories as $catid => $cat)                                    
                                   <option value="{{$catid}}" style="padding-left: 20px;">{{$cat}}</option>
                                    @endforeach
                                   </select>                       
                             <input type="text" class="search" placeholder="Search For Products">
                        </li>
                    </ul> 
                    <!--=======  header wrapper  =======-->
                    <div class="header-wrapper d-none d-lg-flex" style="margin-top: 10px;">
                        <!-- logo -->
                        <div class="logo">
                            <a href="{{route('homepage')}}">
                                <img src="assets/img/logo.png" class="img-fluid" alt="">
                            </a>
                        </div>
                        <!-- menu wrapper -->
                         <div class="navigation-menu-wrapper">
                            <nav style="margin-left:70px; width:600px;">
                            <ul>
                                    <!-- <li class="menu-item-has-children"><a href="#">PAGES</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item-has-children"><a href="#">Page List One</a>
                                                <ul class="sub-menu">
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">page list two</a>
                                                <ul class="sub-menu">
                                                    <li><a href="my-account.html">My Account</a></li>
                                                    <li><a href="login-register.html">Login Register</a></li>
                                                    <li><a href="faq.html">FAQ</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">Page list three</a>
                                                <ul class="sub-menu">
                                                    <li><a href="compare.html">Compare</a></li>
                                                    <li><a href="">Contact</a></li>
                                                    <li><a href="about.html">About Us</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> -->

                                    <li class="menu-item-has-children"><a href="shop-left-sidebar.html">SHOP</a>
                                        <ul class="mega-menu four-column">
                                            <li><a href="#">Shop By Brands</a>
                                                <ul>
                                                    <li><a>xyz</a></li>
                                                    <li><a>abc</a></li>
                                                    <li><a>pqr</a></li>
                                                    <li><a>stu</a></li>
                                                    <li><a>asp</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop-list-left-sidebar.html">Shop By Sub Categories</a>
                                                <ul>
                                                    <li><a>xyz</a></li>
                                                    <li><a>abc</a></li>
                                                    <li><a>pqr</a></li>
                                                    <li><a>stu</a></li>
                                                    <li><a>asp</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="single-product.html">Single Product</a>
                                                <ul>
                                                    <li><a>xyz</a></li>
                                                    <li><a>abc</a></li>
                                                    <li><a>pqr</a></li>
                                                    <li><a>stu</a></li>
                                                    <li><a>asp</a></li>
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
                        <!-- header icon -->
                        <div class="header-icon-wrapper">
                        <ul class="icon-list">          
 
                                <li>
                                    <div class="header-cart-icon">
                                        <a href="{{route('cart')}}">
                                            <i class="ion-bag" style="font-size:30px;"></i>
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
                                              <li role="presentation"><a href="#"><h5><span>My Account</span></h5></a></li>
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
                    <!--=======  End of header wrapper  =======-->

                    <!--=======  mobile navigation area  =======-->

                    <div class="header-mobile-navigation d-block d-lg-none">
                        <div class="row align-items-center">
                            <div class="col-4 col-md-4">
                                <div class="header-logo">
                                    <a href="index.html">
                                        <img src="assets/img/logo.png" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col4 col-md-4">
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
                    </div>

                    <!--=======  End of mobile navigation area  =======-->

                </div>
            </div>
        </div>
    </div>
    
    <!--====================  End of header area  ====================-->

