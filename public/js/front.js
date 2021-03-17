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
