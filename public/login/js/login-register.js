/*
 *
 * login-register modal
 * Autor: Creative Tim
 * Web-autor: creative.tim
 * Web script: http://creative-tim.com
 *
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function showRegisterForm() {
    $('.loginBox').fadeOut('fast', function () {
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast', function () {
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Register with');

    }); $('#password,#password_confirmation,#otpbtn,#registerbtn,#verifytxt').hide();
    $('.error').removeClass('alert alert-danger').html('');

}

function showLoginForm() {
    $('.registerBox').fadeOut('fast', function () {

        $(".offercanvas-mobile-menu").removeClass('active');

        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast', function () {
            $('.login-footer').fadeIn('fast');
        });

        $('.modal-title').html('Login with');
    });
    $('.error').removeClass('alert alert-danger').html('');
}

function openLoginModal() {
    showLoginForm();
    setTimeout(function () {
        $('#loginModal').modal('show');
    }, 230);

}
function openRegisterModal() {
    showRegisterForm();
    setTimeout(function () {
        $('#loginModal').modal('show');
    }, 230);

}


function shakeModal(value, data) {
    if (value == 'login') {
        $('#loginModal .modal-dialog').addClass('shake');
        $('.error').addClass('alert alert-danger').html(data);
        $('input[type="password"]').val('');
        setTimeout(function () {
            $('#loginModal .modal-dialog').removeClass('shake');
        }, 1000);
    }
    else {
        $('#loginModal .modal-dialog').addClass('shake');
        $('.error').addClass('alert alert-danger').html(data);
        $('input[type="password"]').val('');
        setTimeout(function () {
            $('#loginModal .modal-dialog').removeClass('shake');
        }, 1000);
    }
}

$('#loginnumber,#registernumber').focus(function () {
    if ($(this).val().substring(0, 3) !== '+91') {
        $(this).val("+91" + $(this).val());
    }
});


//REGISTRATION CODE
 //check number wheather number exists

var result;
function CheckNumber(number)
{
    $.ajax({
    type: "post",
    url: "/phoneverify",
    data: { 'customer_number': number},
    dataType: "json",
    success: function (response) {
        if (response.msg === 500) {
            shakeModal(value = null, data = "Phone Number Already Registered");
            return result = true;
        } else {
            return result = false;
        }
            }
});
}

function RegisterAjax() {

    $('.error').removeClass('alert alert-danger').empty();
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var registernumber = $("#registernumber").val();
    var pattern = /^\+?([0-9]{2})\)?([0-9]{10})$/;

    if (registernumber.length > 1) {

        if (pattern.test(registernumber)) {
            CheckNumber(registernumber);
            if (result === false) {
                if (fname == null || fname.length === 0 || lname == null || lname.length === 0) {
                    shakeModal(value = null, data = "Enter First/Last Name");
                } else {

                    //Send Otp to user
                    const phoneNumber = registernumber;
                    const appVerifier = window.recaptchaVerifier;
                    firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                        .then((confirmationResult) => {
                            // SMS sent. Prompt user to type the code from the message, then sign the
                            // user in with confirmationResult.confirm(code).
                            window.confirmationResult = confirmationResult;
                            shakeModal(value = null, data = "Otp Code Sent Successfully");
                        }).catch((error) => {
                        alert(error);
                        // ...
                    });

                    $("#fname,#lname,#createbtn").hide();
                    $("#verifytxt,#otpbtn").show();
                    $("#registernumber").prop('disabled', true);
                }
            } else {
                return false;
            }
        }
            else {
            shakeModal(value = null, data = 'Please enter correct Phone Number');
        }
    } else {
        shakeModal(value = null, data = 'Please enter details');
    }

}

function VerifyOtp() {

    $('.error').removeClass('alert alert-danger').empty();
    var otp = $("#verifytxt").val();
    if (otp.length === 6) {
        const code = otp;
        confirmationResult.confirm(code).then((result) => {
            // User signed in successfully.
            var credential = firebase.auth.PhoneAuthProvider.credential(confirmationResult.verificationId, code);
            firebase.auth().signInWithCredential(credential);
            $("#verifytxt,#otpbtn").hide();
            $("#password,#password_confirmation,#registerbtn").show();
            shakeModal(data = null, data = "Otp Verified Successfully");
            // ...
        }).catch((error) => {
            shakeModal(value = null, data = error);
        });
    } else {
        shakeModal(value = null, data = 'Please Insert Valid Otp');
    }
}

function CreateUser() {

    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var registernumber = $("#registernumber").val();
    var password = $("#password").val();
    var confirm_password = $("#password_confirmation").val();

    if (password !== confirm_password) {
        shakeModal(value = null, data = "Password/Confirm Password does not match");
    } else {
        $.ajax({
            type: "POST",
            url: "/phoneregister",
            data: { 'fname': fname, 'lname': lname, 'customer_number': registernumber, 'customer_password': password },
            dataType: "json",
            success: function (response) {
                if (response.msg == 200) {
                    location.reload();
                } else if (response.msg == 301) {
                    alert("User Already Registered");
                }
                else {
                    alert("Error in Registering");
                }

            }
        });
    }
}

//SignIn with Google

function GoogleRegister() {

    var provider = new firebase.auth.GoogleAuthProvider();

    firebase.auth()
        .signInWithPopup(provider)
        .then((result) => {
            /** @type {firebase.auth.OAuthCredential} */

            var user = firebase.auth().currentUser;
            var name, email, uid;
            if (user != null) {
                name = user.displayName;
                email = user.email;
                uid = user.uid;
            }


            // var user = firebase.auth().currentUser;
            // if (user) {
            //     alert(user.uid);
            //   // User is signed in.
            // } else {
            //   // No user is signed in.
            // }
            $.ajax({
                type: "post",
                url: "/GoogleAuth",
                data: { 'uid': uid, 'name': name, 'customer_email': email },
                dataType: "json",
                success: function (response) {
                    if (response.msg == 200) {
                        $('#loginModal').modal('hide');
                        location.reload();
                    } else {
                        alert('Error in user authetication');
                    }
                }
            });
        }).catch((error) => {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // The email of the user's account used.
            var email = error.email;
            // The firebase.auth.AuthCredential type that was used.
            var credential = error.credential;
            // ...
        });
}
//LOGIN CODE

function loginAjax() {

    var loginnumber = $("#loginnumber").val();
    var loginpassword = $("#loginpassword").val();
    var pattern = /^\+?([0-9]{2})\)?([0-9]{10})$/;

    if (loginnumber.length > 1 & loginpassword.length > 1) {

        if (pattern.test(loginnumber)) {

            $.ajax({
                type: "post",
                url: "/phonelogin",
                data: {'customer_number': loginnumber, 'customer_password': loginpassword },
                dataType: "json",
                success: function (response) {
                    if (response.msg === 200) {
                        $('#loginModal').modal('hide');
                        location.reload();
                    }else if(response.msg === 201){
                        shakeModal(value='login',data = 'Invalid Password');
                    }else{
                        shakeModal(value = 'login',data = 'Invalid PhoneNumber/Password Combination');
                    }
                }
            });
        } else {
            shakeModal(value = 'login', data = 'Please Insert Valid Phone Number');

        }
    } else {

        shakeModal(value = 'login', data = 'Please insert Phone Number/Password Combination');
    }
}




