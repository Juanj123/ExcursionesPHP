var data;
var tabla;
function addRowDT(data) {
    tabla = $("#tableImagen").dataTable({
        'order': [[0, 'asc']],
        'language': { 'url': 'scripts/datatables/jquery.dataTables_i18n.spanish.json' },
        'bSort': true,
        'aoColumnDefs': [{ 'bSortable': false, 'aTargets': [2] }]
    });

    tabla.fnClearTable();

    for (var i = 0; i < data.length; i++) {
        tabla.fnAddData([
            data[i].Titulo,
            data[i].Img_galeria,
            '<button value="Ver" title="Ver" class="btn btn-primary btn-edit" data-target="#exampleModalCenter" data-toggle="modal">Ver</button>'
        ]);
    }
}

function sendDataAjax() {

    $.ajax({
        type: "POST",
        url: "AgregarImagen.aspx/ListGaleria",
        data: {},
        contentType: "application/json; charset=utf-8",
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
        },
        success: function (data) {
            addRowDT(data.d);
            //console.log(data.d);

        }

    });
}


function updateDataAjax() {
    var obj = JSON.stringify({ titulo: $("#txtTitulo").val(), url: $("#txtRuta").val(), descripcion: $("#txtDescripcion").val(), estado: $("#dplActivo").val()  });

    console.log(obj);
    $.ajax({
        type: "POST",
        url: "AgregarImagen.aspx/insertarImagen",
        data: obj,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
        },
        success: function (response) {

            if (response.d) {
                alert("imagen guardada correcto");
            } else {
                alert("Error al guardar");

            }
        }

    });
}

// evento click para boton actualizar
$(document).on('click', '.btn-edit', function (e) {
    e.preventDefault();
    var row = $(this).parent().parent()[0];
    data = tabla.fnGetData(row);
    fillModalData();

});

function fillModalData() {
    $("#txtTitulo").val(data[0]);
    $("#txtRuta").val(data[1]);
    //document.getElementById("imgGale").src = data[1];
    $("#imgGale").attr("src",data[1]);  
}

// enviar la informacion al servidor
$("#btnSeleccionar").click(function (e) {
    e.preventDefault();
    updateDataAjax();
});


//Llamando a la funcion de ajax
$("#tableImagen").dataTable().fnDestroy();
sendDataAjax();