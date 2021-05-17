@extends('front.root')
  @section('content')
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
 <!--====================  breadcrumb area ====================-->
 <div class="breadcrumb-content">
    <h2 class="breadcrumb-content__title">Checkout</h2>
    <ul class="breadcrumb-content__page-map">
        <li><a href="index.html">Home</a></li>
        <li class="active">Checkout</li>
    </ul>
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
                                                    @foreach ($getproducts as $item)
                                                    <ul>
                                                       <li>{{($item->productid->product_name) * (session()->get('cart_item.'.$item->hsn_code.'.qty'))}}<span>&#8377;{{$item->final_price}}</span></li>
                                                        
                                                    </ul>

                                                    <p>Sub Total <span>&#8377;104.00</span></p>
                                                    <p>Shipping Fee <span>&#8377;00.00</span></p>

                                                    <h4>Grand Total <span>&#8377;104.00</span></h4>
                                                   @endforeach
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
                                                        <input type="radio" id="payment_cash" name="payment-method" value="cash">
                                                        <label for="payment_cash">Cash on Delivery</label>
                                                        <p data-method="cash">Keep on cash in your when our Delivery reach your home.</p>
                                                    </div>

                                               
                                                    <div class="single-method">
                                                        <input type="radio" id="payment_card" name="payment-method" value="payoneer">
                                                        <label for="payment_card">Card Payment</label>
                                                        <p data-method="card">Please use Debit/Credit Card</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="checkbox" id="accept_terms" required>
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