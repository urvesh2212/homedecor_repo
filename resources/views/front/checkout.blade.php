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
                                    <div class="col-lg-6">
                                        <div class="row">

                                            <!-- Cart Total -->
                                            <div class="col-12">

                                                <h4 class="checkout-title">Cart Total</h4>

                                                <div class="checkout-cart-total">

                                                    <h4>Product <span>Total</span></h4>

                                                    <ul>
                                                        <li>Cillum dolore tortor nisl X 01 <span>&#8377;25.00</span></li>
                                                        <li>Auctor gravida pellentesque X 02 <span>&#8377;50.00</span></li>
                                                        <li>Condimentum posuere consectetur X 01 <span>&#8377;29.00</span></li>
                                                        <li>Habitasse dictumst elementum X 01 <span>&#8377;10.00</span></li>
                                                    </ul>

                                                    <p>Sub Total <span>&#8377;104.00</span></p>
                                                    <p>Shipping Fee <span>&#8377;00.00</span></p>

                                                    <h4>Grand Total <span>&#8377;104.00</span></h4>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="row">
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

                                                <button style="width: 50%;" class="place-order">Place order</button>

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
@endsection