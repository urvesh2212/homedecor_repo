<div class="single-row-slider-area section-space">
    <div class="container wide">
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
        <div class="row" style="margin:0 10px">
            <div class="col-lg-12">
                <!--=======  single row slider wrapper  =======-->
                <div class="single-row-slider-wrapper">
                    <div class="ht-slick-slider" data-slick-setting='{
                    "slidesToShow": 6,
                    "slidesToScroll": 1,
                    "arrows": true,
                    "autoplay": true,
                    "autoplaySpeed": 5000,
                    "speed": 1000,
                    "infinite": true,
                    "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-chevron-left" },
                    "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-chevron-right" }
                        }' data-slick-responsive='[
                            {"breakpoint":1501, "settings": {"slidesToShow": 6} },
                            {"breakpoint":1199, "settings": {"slidesToShow": 6, "arrows": false} },
                            {"breakpoint":991, "settings": {"slidesToShow": 3, "arrows": false} },
                            {"breakpoint":767, "settings": {"slidesToShow": 2, "arrows": false} },
                            {"breakpoint":575, "settings": {"slidesToShow": 2, "arrows": false} },
                            {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                        ]'>
                        @foreach($newproduct as $id => $data)
                        @foreach($variant as $vdata => $variantdata)
                        @if ($variantdata->id == $data->id)
                        <div class="col">
                            <!--=======  single grid product  =======-->
                            <div class="single-grid-product">
                                <div class="single-grid-product__image">
                                    {{-- <div class="single-grid-product__label">
                                        <span class="sale">-20%</span>

                                    </div> --}}
                                    <a href="{{route('singleproductroute',['productid' => $data->id,'productname' => str_replace(' ','-',$data->product_name)])}}">
                                        <img src="{{$data->getFirstMediaUrl('product_img','preview')}}" class="img-fluid" alt="" loading="lazy">
                                    </a>
                                </div>
                                <div class="single-grid-product__content">
                                    <div class="single-grid-product__category-rating">
                                        <span class="category"><a href="shop-left-sidebar.html">{{$data->product_name}}</a></span>
                                    </div>
                                    <h3 class="single-grid-product__title">Variants:{{'('.$variantdata->product_variant_name.')'}}</h3>
                                    {{-- <h3 class="single-grid-product__title"> ({{Str::limit(($data->description),200)}})<a href="{{route('singleproductroute',['productid' => $data->id,'productname' => str_replace(' ','-',$data->product_name)])}}">Read More</a></h3> --}}
                                </div>
                            </div>
                            <!--=======  End of single grid product  =======-->
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <!--=======  End of single row slider wrapper  =======-->
            </div>
        </div>
    </div>
</div>
