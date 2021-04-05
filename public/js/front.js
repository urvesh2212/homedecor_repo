
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
        }else{
            alert(response.msg);
        }

    }
});
});

$(document).ready(function(){
    $("#ajax_loader").hide();
});