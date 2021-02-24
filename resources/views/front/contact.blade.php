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
                            <h2 class="breadcrumb-content__title">Contact Us</h2>
                            <ul class="breadcrumb-content__page-map">
                                <li><a href="{{route('homepage')}}">Home</a></li>
                                <li class="active">Contact Us</li>
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
                            <!--=============================================
                    =            google map container         =
                    =============================================-->

                            <div class="google-map-container">
                                <div id="google-map"></div>
                            </div>

                            <!--=====  End of google map container  ======-->

                            <div class="row">
                                <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                                    <!--=======  contact page side content  =======-->

                                    <div class="contact-page-side-content">
                                        <h3 class="contact-page-title">Contact Us</h3>
                                        <p class="contact-page-message">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human.</p>
                                        <!--=======  single contact block  =======-->

                                        <div class="single-contact-block">
                                            <h4><i class="fa fa-fax"></i> Address</h4>
                                            <p>123 Main Street, Anytown, CA 12345 – USA</p>
                                        </div>

                                        <!--=======  End of single contact block  =======-->

                                        <!--=======  single contact block  =======-->

                                        <div class="single-contact-block">
                                            <h4><i class="fa fa-phone"></i> Phone</h4>
                                            <p>Mobile: (08) 123 456 789</p>
                                            <p>Hotline: 1009 678 456</p>
                                        </div>

                                        <!--=======  End of single contact block  =======-->

                                        <!--=======  single contact block  =======-->

                                        <div class="single-contact-block">
                                            <h4><i class="fa fa-envelope-o"></i> Email</h4>
                                            <p>yourmail@domain.com</p>
                                            <p>support@hastech.company</p>
                                        </div>

                                        <!--=======  End of single contact block  =======-->
                                    </div>

                                    <!--=======  End of contact page side content  =======-->

                                </div>
                                <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                                    <!--=======  contact form content  =======-->

                                    <div class="contact-form-content">
                                        <h3 class="contact-page-title">Tell Us Your Message</h3>

                                        <div class="contact-form">
                                            <form id="contact-form" action="http://hasthemes.com/file/mail.php" method="post">
                                                <div class="form-group">
                                                    <label>Your Name <span class="required">*</span></label>
                                                    <input type="text" name="con_name" id="con_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Your Email <span class="required">*</span></label>
                                                    <input type="email" name="con_email" id="con_email" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Your Message</label>
                                                    <textarea name="con_message" id="con_message"></textarea>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <button type="submit" value="submit" id="submit" class="contact-button" name="submit">Send</button>
                                                </div>
                                            </form>
                                        </div>
                                        <p class="form-messege"></p>
                                    </div>

                                    <!--=======  End of contact form content =======-->
                                </div>
                            </div>
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
                        <p class="small-text">Special Offers For Subscribers</p>
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
    <!--====================  End of newsletter area  ====================-->
    <!-- Google Map -->
    <script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE"></script>

    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 12,

                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(40.740610, -73.935242), // New York

                // How you would like to style the map. 
                // This is where you would paste any style found on

                styles: [{
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#e9e9e9"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#dedede"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                                "visibility": "on"
                            },
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                                "saturation": 36
                            },
                            {
                                "color": "#333333"
                            },
                            {
                                "lightness": 40
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f2f2f2"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('google-map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.740610, -73.935242),
                map: map,
                title: 'Greenfarm',
                icon: "assets/img/icons/map-marker.png",
                animation: google.maps.Animation.BOUNCE
            });
        }
    </script>
    @endsection