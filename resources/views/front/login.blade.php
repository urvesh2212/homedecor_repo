     <!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

     <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
     <script src="https://www.gstatic.com/firebasejs/8.2.3/firebase-app.js"></script>

     <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
     <script src="https://www.gstatic.com/firebasejs/8.2.3/firebase-analytics.js"></script>

     <!-- Add Firebase products that you want to use -->
     <script src="https://www.gstatic.com/firebasejs/8.2.3/firebase-auth.js"></script>
     <script src="https://www.gstatic.com/firebasejs/8.2.3/firebase-firestore.js"></script>

     <script src="{{URL::asset('login/js/firebase.js')}}" type="text/javascript"></script>
     <div class="modal fade login" id="loginModal" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog login animated">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Login with</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 </div>
                 <div class="modal-body">
                     <div class="box">
                         <div class="content">
                             <div class="social">
                                 <a id="google_login" class="circle google" href="javascript:GoogleRegister()">
                                     <i class="fa fa-google-plus fa-fw"></i>
                                 </a>
                                 <a id="facebook_login" class="circle facebook" href="#">
                                     <i class="fa fa-facebook fa-fw"></i>
                                 </a>
                             </div>
                             <div class="division">
                                 <div class="line l"></div>
                                 <span>or</span>
                                 <div class="line r"></div>
                             </div>
                             <div class="error"></div>
                             <div class="form loginBox">
                                 <form>
                                     <input id="loginnumber" class="form-control" type="text" placeholder="Phone Number" name="loginnumber" maxlength="13">
                                     <input id="loginpassword" class="form-control" type="password" placeholder="Password" name="password">
                                     <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                                 </form>
                             </div>
                         </div>
                     </div>
                     <div class="box">
                         <div class="content registerBox" style="display:none;">
                             <div class="form">
                                 <form method="post" id="registerform" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                                     <input type="text" class="form-control" placeholder="First Name" name="fname" id="fname" required>
                                     <input type="text" class="form-control" placeholder="Last Name" name="lname" id="lname" required>
                                     <input type="text" id="registernumber" class="form-control" placeholder="Phone Number" name="registernumber" maxlength="13" required>
                                     <input id="verifytxt" class="form-control" type="text" placeholder="Otp" name="verifytxt" maxlength="6">
                                     <input id="password" class="form-control" type="password" placeholder="Password" name="password" autocomplete="">
                                     <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" autocomplete="" name="password_confirmation">
                                     <input class="btn btn-default btn-register" type="button" value="Create account" name="commit" id="createbtn" onclick="RegisterAjax()">
                                     <input class="btn btn-default btn-register" type="button" value="Verify Otp" name="commit1" id="otpbtn" onclick="VerifyOtp()">
                                     <input class="btn btn-default btn-register" type="button" value="Register" name="commit2" id="registerbtn" onclick="CreateUser()">
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <div class="forgot login-footer">
                         <span>Looking to
                             <a href="javascript: showRegisterForm();">create an account</a>
                             ?</span>
                     </div>
                     <div class="forgot register-footer" style="display:none">
                         <span>Already have an account?</span>
                         <a href="javascript: showLoginForm();">Login</a>
                     </div>
                 </div>
             </div>
         </div>
         <div id="recaptcha-container"></div>
     </div>
     </div>

     <script>
         //Add Recaptcha
         window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
             'size': 'invisible',
         });
         recaptchaVerifier.render();
     </script>