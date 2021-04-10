
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function NewAddress()
{
    let flatno = $("#flatno").val();
    let landmark = $("#landmark").val();
    let state = $("#state").val();
    let city = $("#city").val();
    let zipcode = $("#zipcode").val();

    $.ajax({
        type: "POST",
        url: '/add_address',
        data: {"flatno": flatno, "landmark": landmark, "state": state, "city": city, "zipcode": zipcode},
        dataType: "json",
        success: function (response) {
            if(response.web === 200){
                alert('Successfully Added');
                location.reload();
            }
        }
    });
}

function MakeDefault(id)
{
    if(id)
    {
        $.ajax({
            type: "POST",
            url: '/default_address',
            data: {"id": id},
            dataType: "json",
            success: function (response) {
                if(response.web === 200){
                    alert('Successfully');
                }
            }
        });
    }
    return false;
}

$('.cart-btn').on('click',function(){
var hsn = $(this).data('value');
$.ajax({
    type: "POST",
    url: "/add_cart",
    data: {"productid" : hsn},
    dataType: "json",
    success: function (response) {
        if(response.status == 200)
        {
            alert(response.msg);
            $(".cartcounter").text(response.cartcount);
        }else{
            alert(response.msg);
            $(".cartcounter").text(response.cartcount);
        }

    }
});
});

$('.pro-remove').on('click',function(){
    var hsn = $(this).data('hsn');
    $.ajax({
        type: "POST",
        url: "/remove_from_cart",
        data: {"productid" : hsn},
        dataType: "json",
        success: function (response) {
            if(response.status == 200)
            {
                alert(response.msg);
                location.reload();
            }else{
                alert(response.msg);
            }
    
        }
    });
    });

$("#checkout-address").on('submit',function(e){
    e.preventDefault();
    NewAddress();
});

$(".pvariantbtn").on('click',function(){
var val = $(this).val();
$(".product-actions div").css('display','none');
$(".dummyclass div").css('display','none');
$("."+val).css('display','block');
});
  
//Feedback Form
$("#feedbackform").on('submit',function(e)
{
e.preventDefault();
var email = $("#email").val();
var review = $("#your-review").val();
var rating =  $("input[name='rating']:checked").val();
var pid = $("#pid").val();
var name = $("#name").val();

$.ajax({
    type: "POST",
    url: "/add_feedbackreview",
    data: {"email" :email,"review" : review, "rating" : rating, "pid" : pid},
    dataType: "json",
    success: function (response) {
        if(response.status == 200){
            var data = '<div class="sin-ratings">'+
             + '<div class="rating-author">'+
               +' <h3>'+name+'</h3>'+
              + '</div>'+
              '<p>Rated:'+rating+'</p>'+
              + '<p>'+review+'</p>'+
                     + '</div>+';
                     $(".ratings-wrapper").append(data);  
                     $("#email").val('');
                     $("#your-review").val('');
                     $("input[name='rating']").prop('checked',false);
                     $("#name").val('');
    }else{
        alert("error");
    }
}
});
});


// cart update btn
$(".minus").on('click',function(){
var getid = $(this).data('value');
var count = $("#pcount_"+getid).val();
count--;
if(count <= 1){
    $("#pcount_"+getid).val(1);
}else{
    $("#pcount_"+getid).val(count);
}
});

$(".plus").on('click',function(){
    var getid = $(this).data('value');
    var count = $("#pcount_"+getid).val();
    count++;
    if(count <= 1){
        $("#pcount_"+getid).val(1);
    }else{
        $("#pcount_"+getid).val(count);
    }
    });

    $('.addressarea input[type=radio]').on('click',function() {
        $('.addressarea').css({'background-image':'','opacity':''});
        if ($(this).is(':checked')) {
            imageUrl = 'assets/img/success_tick2.png';
          $(this).closest('label').css({'background-image':'url(' + imageUrl + ')','opacity':'0.2'});
        }else{
        }
      });

//Coupon Code
$("#couponform").on('submit',function(e){
    e.preventDefault();
    var coupon = $("#couponcode").val();
    $.ajax({
        type: "POST",
        url: '/check_coupon',
        data: {"couponcode" : coupon},
        dataType: "json",
        success: function (response) {
            if(response.status == 200){
                alert(response.msg);
                var output = '<span style="color:green;">'+response.msg+'</span>';
                $("#couponrow").append(output);
            }else{
                alert(response.msg);
            }
        }
    });
})
$(document).ready(function(){
    $("#ajax_loader").hide();
});