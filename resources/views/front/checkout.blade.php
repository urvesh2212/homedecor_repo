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
                            <h2 class="breadcrumb-content__title">Checkout</h2>
                            <ul class="breadcrumb-content__page-map">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Checkout</li>
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
                            <!-- Checkout Form s-->
                            <form action="#" class="checkout-form">
                                <div class="row row-40">

                                    <div class="col-lg-7">

                                        <!-- Billing Address -->
                                        <div id="billing-form">
                                            <h4 class="checkout-title">Billing Address</h4>

                                            <div class="row">

                                                <div class="col-md-6 col-md-12">
                                                    <label>First Name*</label>
                                                    <input type="text" placeholder="First Name">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Last Name*</label>
                                                    <input type="text" placeholder="Last Name">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Email Address*</label>
                                                    <input type="email" placeholder="Email Address">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Phone no*</label>
                                                    <input type="text" placeholder="Phone number">
                                                </div>

                                                <div class="col-12">
                                                    <label>Company Name</label>
                                                    <input type="text" placeholder="Company Name">
                                                </div>

                                                <div class="col-12">
                                                    <label>Address*</label>
                                                    <input type="text" placeholder="Address line 1">
                                                    <input type="text" placeholder="Address line 2">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Country*</label>
                                                    <select class="nice-select">
                                                        <option>Bangladesh</option>
                                                        <option>China</option>
                                                        <option>country</option>
                                                        <option>India</option>
                                                        <option>Japan</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Town/City*</label>
                                                    <input type="text" placeholder="Town/City">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>State*</label>
                                                    <input type="text" placeholder="State">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Zip Code*</label>
                                                    <input type="text" placeholder="Zip Code">
                                                </div>

                                                <div class="col-12">
                                                    <div class="check-box mb-2 mb-md-0">
                                                        <input type="checkbox" id="create_account">
                                                        <label for="create_account">Create an Acount?</label>
                                                    </div>
                                                    <div class="check-box">
                                                        <input type="checkbox" id="shiping_address" data-shipping>
                                                        <label for="shiping_address">Ship to Different Address</label>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <!-- Shipping Address -->
                                        <div id="shipping-form">
                                            <h4 class="checkout-title">Shipping Address</h4>

                                            <div class="row">

                                                <div class="col-md-6 col-12">
                                                    <label>First Name*</label>
                                                    <input type="text" placeholder="First Name">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Last Name*</label>
                                                    <input type="text" placeholder="Last Name">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Email Address*</label>
                                                    <input type="email" placeholder="Email Address">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Phone no*</label>
                                                    <input type="text" placeholder="Phone number">
                                                </div>

                                                <div class="col-12">
                                                    <label>Company Name</label>
                                                    <input type="text" placeholder="Company Name">
                                                </div>

                                                <div class="col-12">
                                                    <label>Address*</label>
                                                    <input type="text" placeholder="Address line 1">
                                                    <input type="text" placeholder="Address line 2">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Country*</label>
                                                    <select class="nice-select">
                                                        <option>Bangladesh</option>
                                                        <option>China</option>
                                                        <option>country</option>
                                                        <option>India</option>
                                                        <option>Japan</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Town/City*</label>
                                                    <input type="text" placeholder="Town/City">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>State*</label>
                                                    <input type="text" placeholder="State">
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label>Zip Code*</label>
                                                    <input type="text" placeholder="Zip Code">
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-5">
                                        <div class="row">

                                            <!-- Cart Total -->
                                            <div class="col-12">

                                                <h4 class="checkout-title">Cart Total</h4>

                                                <div class="checkout-cart-total">

                                                    <h4>Product <span>Total</span></h4>

                                                    <ul>
                                                        <li>Cillum dolore tortor nisl X 01 <span>$25.00</span></li>
                                                        <li>Auctor gravida pellentesque X 02 <span>$50.00</span></li>
                                                        <li>Condimentum posuere consectetur X 01 <span>$29.00</span></li>
                                                        <li>Habitasse dictumst elementum X 01 <span>$10.00</span></li>
                                                    </ul>

                                                    <p>Sub Total <span>$104.00</span></p>
                                                    <p>Shipping Fee <span>$00.00</span></p>

                                                    <h4>Grand Total <span>$104.00</span></h4>

                                                </div>

                                            </div>

                                            <!-- Payment Method -->
                                            <div class="col-12">

                                                <h4 class="checkout-title">Payment Method</h4>

                                                <div class="checkout-payment-method">

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_check" name="payment-method" value="check">
                                                        <label for="payment_check">Check Payment</label>
                                                        <p data-method="check">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_bank" name="payment-method" value="bank">
                                                        <label for="payment_bank">Direct Bank Transfer</label>
                                                        <p data-method="bank">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_cash" name="payment-method" value="cash">
                                                        <label for="payment_cash">Cash on Delivery</label>
                                                        <p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_paypal" name="payment-method" value="paypal">
                                                        <label for="payment_paypal">Paypal</label>
                                                        <p data-method="paypal">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_payoneer" name="payment-method" value="payoneer">
                                                        <label for="payment_payoneer">Payoneer</label>
                                                        <p data-method="payoneer">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="checkbox" id="accept_terms">
                                                        <label for="accept_terms">I’ve read and accept the terms & conditions</label>
                                                    </div>

                                                </div>

                                                <button class="place-order">Place order</button>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </form>
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