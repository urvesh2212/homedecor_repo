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
    <!--====================  page content area ====================-->
   <!--====================  breadcrumb area ====================-->
  <div class="breadcrumb-content">
    <h2 class="breadcrumb-content__title">My Cart</h2>
    <ul class="breadcrumb-content__page-map">
        <li><a href="index.html">Home</a></li>
        <li class="active">My Cart</li>
    </ul>
</div>
    <!--====================  End of breadcrumb area  ====================-->
    <div class="page-content-area" style="margin-top: 25px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  page wrapper  =======-->
                    <div class="page-wrapper">
                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-lg-8 col-md-7">
                                  
                                      <!--=======  cart table  =======-->
  
                                      <div class="cart-table">
                                        
                                                  @foreach ($getproducts as $item)
                                                  <div class="row">
                                                    <div class="col-lg-2">
                                                        <p class="pro-thumbnail"><a href="{{route('singleproductroute',['productid' => $item->productid->id,'productname' => str_replace(' ','-',$item->productid->product_name)])}}"><img src="{{$item->productid->getFirstMediaUrl('product_img')}}" class="img-fluid" alt="Product"></a>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <p class="pro-title"><a href="">{{$item->productid->product_name}}</a></p>
                                                        <p class="pro-variant">Product Variant:<span>{{$item->productvariantid->product_variant_name}}</span></p>
                                                        <p class="pro-subtotal">Price :&#8377;{{($item->final_price) * (session()->get('cart_item.'.$item->hsn_code.'.qty'))}}</p>
                                                        <p class="pro-remove" data-hsn="{{$item->hsn_code}}"><a href="javascript:void(0)">Remove</a></p>
                                                    </div>
                                                    
                                                      <div class="quantity-selection">
                                                        <input type="button" value="-" class="minus" data-value="{{$item->hsn_code}}">
                                                          <input type="number" id="pcount_{{$item->hsn_code}}" value="{{session()->get('cart_item.'.$item->hsn_code.'.qty')}}" min="1">
                                                          <input type="button" value="+" class="plus" data-value="{{$item->hsn_code}}">
                                                        </div>
                                                   
                                                  
                                                  </div>
                                                  @endforeach
                                                  
                                      </div>
                                      <!--=======  End of cart table  =======-->

                                </div>
                                <div class="col-lg-4 col-md-5" style="height: 250px;">
                                    <!--=======  Cart summery  =======-->
                                
                                    <div class="cart-summary">
                                        <div class="cart-summary-wrap">
                                            <h4>Cart Summary</h4>
                                            <p>Sub Total <span>&#8377;{{$getproducts->sum('final_price')}}</span></p>
                                            <p>Shipping Cost <span>&#8377;50</span></p>
                                            <h2>Grand Total <span>&#8377;{{$getproducts->sum('final_price') + 50}}</span></h2>
                                        </div>
                                        <div class="discount-coupon">
                                            <h4>Discount Coupon Code</h4>
                                            <form id="couponform">
                                                <div class="row" id="couponrow">
                                                    <div class="col-md-6 col-12">
                                                        <input type="text" id="couponcode" placeholder="Coupon Code">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <input type="submit" value="Apply Code">
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                         
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                    
                                
                                    
                             
                                     <!--=======  End of Cart summery  =======-->
                            </div>
                                
                                <div class="row">
                                        <div class="col-lg-8 col-md-7">
                                            <div class="myaccount-content">
                                                <a href="#button" type="button" class=" btn d-inline-block address-btn" value="addnew" id="bt" onclick="toggle(this)">Add New Address</a><br><br/>
                                            </div>
            
                                            
                                                <!--The DIV element to toggle visibility. Its "display" property is set as "none". -->
                                                <div style="border:solid 1px #ddd; padding:10px; display:none;" id="cont">
                                                    <form class="checkout-form" id="checkout-address">
                                                        <div class="row row-40">
                        
                                                            <div class="col-lg-12">
                        
                                                                <!-- Billing Address -->
                                                                <div id="billing-form">
                                                                    <h4 class="checkout-title">Billing Address</h4>
                                                                    <div class="form-group">
                                                                        <div class="row">      
                        
                                                                            <div class="col-12">
                                                                                <label>Flat No<span class="text-danger"> * </span></label>
                                                                                <input type="text" id="flatno" name="flatno" value="{{old('flatno')}}" placeholder="Flat No" required>
                                                                            </div>
                        
                                                                            <div class="col-12">
                                                                                <label>Landmark<span class="text-danger"> * </span></label>
                                                                                <input type="text" id="landmark" name="landmark" value="{{old('landmark')}}" placeholder="Landmark" required>
                                                                            </div>
                        
                                                                            <div class="col-md-6 col-12">
                                                                                <label>State <span class="text-danger"> * </span></label>
                                                                                <select style="line-height: 23px; color: #707070; border: 1px solid #999; padding: 10px 20px; width: 100%;" name="state" id="state" value="{{old('state')}}" required>
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
                                                                                <input type="text" id="city" name="city" value="{{old('city')}}" placeholder="City" required>
                                                                            </div>
                        
                                                                            <div class="col-md-6 col-12">
                                                                                <label>Zip Code <span class="text-danger"> * </span></label>
                                                                                <input type="number" id="zipcode" name="zipcode" value="{{old('zipcode')}}" placeholder="Zip Code" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" min="0" maxlength="6" required>
                                                                            </div>
                                                                        
                                                                            <div class="col-12">
                                                                                <button style="background-color: #292929;" type="submit" class="btn btn-primary">Add</button>
                                                                            </div>
                        
                                                                        </div>
                                                                    </div>
                                                                </div>
                        
                                                            </div>
                        
                                                        </div>
                                                    </form>
                                                
                                                </div> 
                                        </div>
                                    
                                </div>

                            <div class="row">
                               
                                <div class="col-lg-12" style="margin-top: 10px;">
                                    <div class="addtitle" style="text-align: center">
                                        <h3>OR</h3>
                                        <h4>Edit Address</h4>
                                    </div>
                                    <hr/>
                                    <!--Show Customer Address -->
                                  <div id="addressdiv">
                                    @foreach ($customeraddress as $item2)
                                    <label class="addressarea" >
                                     <input type="radio" name="test" class="addressbtn"  value="{{$item2->id}}">
                                             <span>Flat No: {{$item2->flatno}}</span></br>
                                             <span>Landmark: {{$item2->landmark}}</span></br>
                                             <span>City: {{$item2->city}}</span></br>
                                             <span>State: {{$item2->state.','.$item2->country}}</span></br>
                                             <span>Zip Code: {{$item2->zipcode}}</span></br>
                                             <a href="{{route('userdashboard')}}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                    </label>
                                         @endforeach
 
                                  </div>
                                  
                                </div>
                                    <!--=======  Discount Coupon  =======-->
                                 
                                        <div class="col-md-12">
                                            <div class="cart-summary">
                                                <div class="cart-summary-button">
                                                   <a href="{{route('checkout')}}"><button class="checkout-btn">Checkout</button></a>
                                                </div> 
                                            </div>        
                                        </div>   
                                          
                                    <!--=======  End of Discount Coupon  =======-->       
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
