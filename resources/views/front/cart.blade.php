@extends('front.root')
  @section('content')
  <!--====================  breadcrumb area ====================-->
  {{-- <div class="breadcrumb-area section-space--half">
        <div class="container wide">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb wrpapper  =======-->
                    <div class="breadcrumb-wrapper">
                        <!--=======  breadcrumb content  =======-->
                        {{-- <div class="breadcrumb-content">
                            <h2 class="breadcrumb-content__title">Cart</h2>
                            <ul class="breadcrumb-content__page-map">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Cart</li>
                            </ul>
                        </div> 
                        <!--=======  End of breadcrumb content  =======-->
                    </div>
                    <!--=======  End of breadcrumb wrpapper  =======-->
                </div>
            </div>
        </div>
    </div> --}}
    <!--====================  End of breadcrumb area  ====================-->
    <!--====================  page content area ====================-->
    {{-- <h1 style="margin-left: 50%;">Cart</h1> --}}
    <div class="breadcrumb-content">
        <h2 class="breadcrumb-content__title">My Cart</h2>
        <ul class="breadcrumb-content__page-map">
            <li><a href="index.html">Home</a></li>
            <li class="active">My Cart</li>
        </ul>
    </div>
    <div class="page-content-area" style="margin-top: 250px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  page wrapper  =======-->
                    <div class="page-wrapper">
                        <div class="page-content-wrapper">
                            <form action="#">
                                <!--=======  cart table  =======-->

                                <div class="cart-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="pro-thumbnail">Image</th>
                                                <th class="pro-title">Product</th>
                                                <th class="pro-price">Price</th>
                                                <th class="pro-quantity">Quantity</th>
                                                <th class="pro-subtotal">Total</th>
                                                <th class="pro-remove">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="pro-thumbnail"><a href="single-product.html"><img src="assets/img/products/big1-1.jpg" class="img-fluid" alt="Product"></a></td>
                                                <td class="pro-title"><a href="single-product.html">Cillum dolore tortor nisl fermentum</a></td>
                                                <td class="pro-price"><span>$29.00</span></td>
                                                <td class="pro-quantity">
                                                    <div class="quantity-selection"><input type="number" value="1" min="1"></div>
                                                </td>
                                                <td class="pro-subtotal"><span>$29.00</span></td>
                                                <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!--=======  End of cart table  =======-->


                            </form>

                            <div class="row">

                                <div class="col-lg-7 col-12">

                                    <div class="myaccount-content">
                                        <a href="#button" type="radio" class=" btn d-inline-block address-btn" value="addnew" id="bt" onclick="toggle(this)">Add New Address</a><br><br/>
                                    </div>
                
                                       
                                    
                            
                                <!--The DIV element to toggle visibility. Its "display" property is set as "none". -->
                                <div style="border:solid 1px #ddd; padding:10px; display:none;" id="cont">
                                    <form action="#" class="checkout-form">
                                        <div class="row row-40">
        
                                            <div class="col-lg-12">
        
                                                <!-- Billing Address -->
                                                <div id="billing-form">
                                                    <h4 class="checkout-title">Billing Address</h4>
                                                    <div class="form-group">
                                                        <div class="row">
        
                                                            <div class="col-md-6 col-md-12">
                                                                <label>First Name<span class="text-danger"> * </span></label>
                                                                <input type="text" id="fname" name="lname" placeholder="First Name" required>
                                                            </div>
        
                                                            <div class="col-md-6 col-12">
                                                                <label>Last Name<span class="text-danger"> * </span></label>
                                                                <input type="text" id="lname" name="lname"  placeholder="Last Name" required>
                                                            </div>
        
                                                            <div class="col-md-6 col-12">
                                                                <label>Email Address<span class="text-danger"> * </span></label>
                                                                <input type="email" id="email" name="email" placeholder="Email Address" required>
                                                            </div>
        
                                                        
                                                            
                                                            <div class="col-12">
                                                                <label>Phone Number<span class="text-danger"> * </span></label>
                                                                <input type="number" id="phone" name="phone" placeholder="Phone Number" required>
                                                            </div>
        
                                                            <div class="col-12">
                                                                <label>Flat No<span class="text-danger"> * </span></label>
                                                                <input type="text" id="flatno" name="flatno" placeholder="Flat No" required>
                                                            </div>
        
                                                            <div class="col-12">
                                                                <label>Landmark<span class="text-danger"> * </span></label>
                                                                <input type="text" id="landmark" name="landmark" placeholder="Landmark" required>
                                                            </div>
        
                                                            <div class="col-md-6 col-12">
                                                                <label>State <span class="text-danger"> * </span></label>
                                                                <select style="line-height: 23px; color: #707070; border: 1px solid #999; padding: 10px 20px; width: 100%;" name="state" id="state" name="state" required>
                                                                    <option value="">State...</option>
                                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                                        <option value="Assam">Assam</option>
                                                                        <option value="Bihar">Bihar</option>
                                                                        <option value="Chandigarh">Chandigarh</option>
                                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                                        <option value="Delhi">Delhi</option>
                                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                                        <option value="Puducherry">Puducherry</option>
                                                                        <option value="Goa">Goa</option>
                                                                        <option value="Gujarat">Gujarat</option>
                                                                        <option value="Haryana">Haryana</option>
                                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                                        <option value="Jharkhand">Jharkhand</option>
                                                                        <option value="Karnataka">Karnataka</option>
                                                                        <option value="Kerala">Kerala</option>
                                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                                        <option value="Maharashtra">Maharashtra</option>
                                                                        <option value="Manipur">Manipur</option>
                                                                        <option value="Meghalaya">Meghalaya</option>
                                                                        <option value="Mizoram">Mizoram</option>
                                                                        <option value="Nagaland">Nagaland</option>
                                                                        <option value="Odisha">Odisha</option>
                                                                        <option value="Punjab">Punjab</option>
                                                                        <option value="Rajasthan">Rajasthan</option>
                                                                        <option value="Sikkim">Sikkim</option>
                                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                                        <option value="Telangana">Telangana</option>
                                                                        <option value="Tripura">Tripura</option>
                                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                                        <option value="West Bengal">West Bengal</option> 
                                                                    </select>
                                                            </div>
        
                                                            <div class="col-md-6 col-12">
                                                                <label>City <span class="text-danger"> * </span></label>
                                                                <input type="text" id="city" name="city" placeholder="City" required>
                                                            </div>
        
                                                            <div class="col-md-6 col-12">
                                                                <label>Zip Code <span class="text-danger"> * </span></label>
                                                                <input type="number" id="zipcode" name="zipcode" placeholder="Zip Code" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" min="0" maxlength="6" required>
                                                            </div>
                                                        
                                                            <div class="col-12">
                                                                <button style="background-color: #292929;" type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
        
                                                        </div>
                                                    </div>
                                                </div>
        
                                            </div>
        
                                        </div>
                                    </form>
                                
                                </div>
                                    <!--=======  Discount Coupon  =======-->

                                    <div class="discount-coupon">
                                        <h4>Discount Coupon Code</h4>
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <input type="text" placeholder="Coupon Code">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <input type="submit" value="Apply Code">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!--=======  End of Discount Coupon  =======-->

                                </div>


                                <div class="col-lg-5 col-12 d-flex">
                                    <!--=======  Cart summery  =======-->

                                    <div class="cart-summary">
                                        <div class="cart-summary-wrap">
                                            <h4>Cart Summary</h4>
                                            <p>Sub Total <span>$1250.00</span></p>
                                            <p>Shipping Cost <span>$00.00</span></p>
                                            <h2>Grand Total <span>$1250.00</span></h2>
                                        </div>
                                        <div class="cart-summary-button">
                                            <button class="checkout-btn">Checkout</button>
                                        </div>
                                    </div>

                                    <!--=======  End of Cart summery  =======-->

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
    @endsection
    <script>
        function toggle(ele) {
            var cont = document.getElementById('cont');
            if (cont.style.display == 'block') {
                cont.style.display = 'none';
    
                document.getElementById(ele.id).value = 'Add New Address';
            }
            else {
                cont.style.display = 'block';
                document.getElementById(ele.id).value = 'Hide DIV';
            }
        }
    </script>