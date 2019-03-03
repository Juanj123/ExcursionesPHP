var data;
var tabla;
function addRowDT(data) {
    tabla = $("#tableImagen").dataTable({
        'order': [[0, 'asc']],
        'language': { 'url': 'scripts/datatables/jquery.dataTables_i18n.spanish.json' },
        'bSort': true,
        'aoColumnDefs': [{ 'bSortable': false, 'aTargets': [4] }]
    });

    tabla.fnClearTable();

    for (var i = 0; i < data.length; i++) {
        tabla.fnAddData([
            data[i].Titulo,
            data[i].Descripcion,
            data[i].Url,
            data[i].Estado,
            '<button value="Actualizar" title="Actualizar" class="btn btn-primary btn-edit" data-target="#exampleModalCenter" data-toggle="modal">Actualizar</button>&nbsp;' +
            '<button value="Eliminar" title="Eliminar" class="btn btn-danger btn-delete">Eliminar</button>'
        ]);
    }
}

function sendDataAjax() {

    $.ajax({
        type: "POST",
        url: "Imagen.aspx/ListImagen",
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
    var obj = JSON.stringify({ titulo: $("#txtTitulo").val(), url: $("#txtRuta").val(), descripcion: $("#txtDescripcion").val(), estado: $("#dplActivo").val() });

    console.log(obj);
    $.ajax({
        type: "POST",
        url: "Imagen.aspx/ActualizarImagen",
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

function deleteDataAjax(data) {

    var obj = JSON.stringify({ id: data });

    $.ajax({
        type: "POST",
        url: "Imagen.aspx/EliminarDatos",
        data: obj,
        dataType: "json",
        contentType: 'application/json; charset=utf-8',
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
        },
        success: function (response) {
            if (response.d) {
                alert("Registro eliminado de manera correcta.");
            } else {
                alert("No se pudo eliminar el registro.");
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

$(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    var row = $(this).parent().parent()[0];
    data = tabla.fnGetData(row);

    // paso 1: enviar el id al servidor por medio de ajax
    deleteDataAjax(data[0]);
    // paso 2: renderizar el datatable
    $("#tableImagen").dataTable().fnDestroy();
    sendDataAjax();

}); 

function fillModalData() {
    $("#txtTitulo").val(data[0]);
    $("#txtDescripcion").val(data[1]);
    $("#txtRuta").val(data[2]);
    $("#dplActivo").val(data[3]);
    document.getElementById("imgGale").src = data[2];
    //$("#imgGale").attr("src","img/park.jpg");

    //data[2]
}

// enviar la informacion al servidor
$("#btnSeleccionar").click(function (e) {
    e.preventDefault();
    updateDataAjax();
});

//Llamando a la funcion de ajax
$("#tableImagen").dataTable().fnDestroy();
sendDataAjax();