
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

$('.cart-item').on('click',function(){
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

$.ajax({
    type: "POST",
    url: "/add_feedbackreview",
    data: {"email" :email,"review" : review, "rating" : rating, "pid" : pid},
    dataType: "json",
    success: function (response) {
        if(response.status == 200){
            alert("Successfully Added");
        //     var data = '<div class="sin-ratings">'+
        //      + '<div class="rating-author">'+
        //        +' <h3>tesing</h3>'+
        //       + '</div>'+
        //       + '<p>enim ipsam voluptatem quia voluptas</p>'+
        //              + '</div>+';
        // }
        // $(".sin-ratings").append(data);        
    }
}
});
});

$(document).ready(function(){
    $("#ajax_loader").hide();
});