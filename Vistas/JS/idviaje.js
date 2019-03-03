
    $(document).on('click', '.btnIdViaje', function (e) {
        e.preventDefault();

    var value = $(this).attr("data-id");
    alert(value);
            if (value !== null) {
        sendIdViaje(value);
    }
});

        function sendIdViaje(data) {
    var obj = JSON.stringify({idViaje: data });

    $.ajax({
        type: "POST",
    url: "ViajesUsers.aspx/setIdViaje",
    data: obj,
    dataType: "json",
    contentType: "application/json; charset=utf-8",
        error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
    },
        success: function () {
            window.location ="apartaTuLugar.aspx";
            
}

});
}
   