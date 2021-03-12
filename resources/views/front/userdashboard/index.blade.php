@php
@endphp

    <!--====================  breadcrumb area ====================-->
    <div class="breadcrumb-area section-space--half">
        <div class="container wide">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb wrpapper  =======-->
                    <div class="breadcrumb-wrapper breadcrumb-bg">
                        <!--=======  breadcrumb content  =======-->
                        <div class="breadcrumb-content">
                            <h2 class="breadcrumb-content__title">My Account</h2>
                            <ul class="breadcrumb-content__page-map">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">My Account</li>
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
                            <div class="row">
                                <!-- My Account Tab Menu Start -->
                                <div class="col-lg-3 col-12">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                            Dashboard</a>

                                        <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>

                                        <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a>

                                        <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-12">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Dashboard</h3>

                                                <div class="welcome mb-20">
                                                    <p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                                                </div>

                                                <p class="mb-0">From your account dashboard. you can easily check &amp; view your
                                                    recent orders, manage your shipping and billing addresses and edit your
                                                    password and account details.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Orders</h3>

                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>BilNo</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><button type="btn" id="menu-trigger" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" name="View">View</button></td>
                                                                      <table class="collapse" id="collapseExample">
                                                                          <thead>
                                                                            <tr class="card card-body" style="width: 763px;">
                                                                                <th>No</th>
                                                                                <th>BilNo</th>
                                                                                <th>Date</th>
                                                                                <th>Status</th>
                                                                                <th>Total</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                          </thead>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->


                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Billing Address</h3>


                                                <a href="#myaddress" class="btn d-inline-block address-btn" data-toggle="modal">Add New Address</a><br><br/>


                                                <div class="col-lg-12 col-md-12">
                                                    <div class="pdpt-bg">
                                                        <div class="address-body">
                                                            <div class="address-item">
                                                                <div class="address-dt-all">
                                                                    <ul class="action-btns">
                                                                        <a href="#" class="btn d-inline-block address-btn" data-toggle="modal" data-target="#edit_address_model" ><i class="fa fa-edit"></i>Edit Address</a>
                                                                        <a href="#" class="btn d-inline-block address-btn"><i class="fa fa-trash"></i>Delete Address</a>
                                                                    </ul>

                                                                        <h4 style="margin-left:200px"><input type="radio"  name="defaultaddress" value="">&nbsp;Make Default</h4>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal modal-alert fade" id="myaddress" tabindex="-1" role="dialog" aria-labelledby="#myaddress" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div style="background-color: #292929;" class="modal-header">
          <h4 style="color:white;" class="modal-title" id="addresslabel">Add New Address</h4>
          <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <div class="col-12">
                <label>Flat No<span class="text-danger"> * </span></label>
                <input type="text" id="address" class="form-control" placeholder="Address" required>
                @if ($errors->has('address'))
                <span class="text-danger">{{ $errors->first('address') }}</span>
            @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-12">
                <label>LandMark<span class="text-danger"> * </span></label>
                <input type="text" id="landmark" class="form-control" placeholder="LandMark" required>
                @if ($errors->has('landmark'))
                <span class="text-danger">{{ $errors->first('landmark') }}</span>
            @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-12">
                <label>State <span class="text-danger"> * </span></label>
                <select name="state" id="state" class="form-control" required>
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
          </div>
          <div class="form-group">
            <div class="col-md-6 col-12">
                <label>City <span class="text-danger"> * </span></label>
                <input type="text" placeholder="City" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-12">
                <br/><label>Zip Code <span class="text-danger"> * </span></label>
                <input type="number" placeholder="Zip Code" class="form-control"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" min="0" maxlength="6" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group">
                    <button type="close" class="save-change-btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="save-change-btn">Save changes</button>
             </div>
           </div>
      </div>
    </div>
  </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Account Details</h3>

                                                <div class="account-details-form">
                                                    <form action="#">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-12">
                                                                <input id="first-name" placeholder="First Name" type="text">
                                                            </div>

                                                            <div class="col-lg-6 col-12">
                                                                <input id="last-name" placeholder="Last Name" type="text">
                                                            </div>

                                                            <div class="col-12">
                                                                <input id="display-name" placeholder="Display Name" type="text">
                                                            </div>

                                                            <div class="col-12">
                                                                <input id="email" placeholder="Email Address" type="email">
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <h4>Password change</h4>
                                                            </div>


                                                            <div class="col-12">
                                                                <input id="current-pwd" placeholder="Current Password" type="password">
                                                            </div>

                                                            <div class="col-lg-6 col-12">
                                                                <input id="new-pwd" placeholder="New Password" type="password">
                                                            </div>

                                                            <div class="col-lg-6 col-12">
                                                                <input id="confirm-pwd" placeholder="Confirm Password" type="password">
                                                            </div>

                                                            <div class="col-12">
                                                                <button class="save-change-btn">Save Changes</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                    </div>
                                </div>
                                <!-- My Account Tab Content End -->
                            </div>
                        </div>
                    </div>
                    <!--=======  End of page wrapper  =======-->
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of page content area  ====================-->
    <script>
    $(document).ready(function() {
        var table = $('#menu-trigger').DataTable({
            responsive: true
        });
    } );
    </script>
