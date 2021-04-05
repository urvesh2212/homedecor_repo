    <!--====================  single row slider tab ====================-->
    <div class="single-row-slider-tab-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->
                    <div class="section-title-wrapper text-center section-space--half">
                        <h2 class="section-title">Our Products</h2>
                        <p class="section-subtitle">Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas.</p>
                    </div>
                    <!--=======  End of section title  =======-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  tab slider wrapper  =======-->

                    <div class="tab-slider-wrapper">
                        <!--=======  tab product navigation  =======-->

                        <div class="tab-product-navigation">
                            <div class="nav nav-tabs justify-content-center" id="nav-tab2" role="tablist">
                                @php $i = 1;@endphp
                                @foreach($categories as $categorydata)
                                <a class="nav-item nav-link {{$i === 1 ? 'active': ''}}" id="product-tab-{{$i}}" data-toggle="tab" href="#product-series-{{$i}}" role="tab" aria-selected="true">{{$categorydata->category_name}}</a>
                                @php $i++; @endphp
                                @endforeach
                            </div>
                        </div>

                        <!--=======  End of tab product navigation  =======-->

                        <!--=======  tab product content  =======-->
                        <div class="tab-content">
                            @php $ii = 1; @endphp
                            @foreach ($categories as $item)
                            <div class="tab-pane fade show {{$ii === 1 ? 'active': ''}}" id="product-series-{{$ii}}" role="tabpanel" aria-labelledby="product-tab-{{$ii}}">
                                <a style="margin-left: 1050px;margin-bottom:20px;background-color:#292929;color:#FFFFFF">View All</a>
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
                                @foreach ($item->GetProduct as $item2) 
                                        <div class="col">
                                            <!--=======  single grid product  =======-->
                                               
                                           
                                            <div class="single-grid-product">

                                                <div class="single-grid-product__image">
                                                    <a href="{{route('singleproductroute',['productid' => $item2->id,'productname' => str_replace(' ','-',$item2->product_name)])}}">
                                                        <img src="{{$item2->getFirstMediaUrl('product_img','preview')}}" class="img-fluid" alt="" loading="lazy">
                                                    </a>
                                                    
                                                        
                                                </div>
                                                        
                                                <div class="single-grid-product__content">
                                                    <div class="single-grid-product__category-rating">
                                                        <span class="category"><a href="shop-left-sidebar.html">{{$item2->product_name}}</a></span>
                                                    </div>

                                                    <h3 class="single-grid-product__title">{{$item2->description}}</h3>
                                                    {{-- <p class="single-grid-product__price"><span class="main-price">$120.00</span></p> --}}
                                                </div>
                                            </div>

                                            <!--=======  End of single grid product  =======-->
                                        </div>
                                        @endforeach     
                                    </div>
                                </div>
                                <!--=======  End of single row slider wrapper  =======-->
                                                        
                            </div>

                            @php
                             $ii++;   
                            @endphp
                            @endforeach
                        </div>
                        <!--=======  End of tab product content  =======-->
                    </div>

                    <!--=======  End of tab slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
