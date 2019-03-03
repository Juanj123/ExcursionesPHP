var data;
var tabla;
function addRowDT(data) {
    tabla = $("#tableGaleria").dataTable({
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
            '<button value="Eliminar" title="Eliminar" class="btn btn-danger btn-delete col-5">Eliminar</button>'
        ]);
    }
}

function sendDataAjax() {

    $.ajax({
        type: "POST",
        url: "GaleriaAdministrator.aspx/ListGaleria",
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

function deleteDataAjax(data) {

    var obj = JSON.stringify({ id: data });

    $.ajax({
        type: "POST",
        url: "GaleriaAdministrator.aspx/EliminarDatos",
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

$(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    var row = $(this).parent().parent()[0];
    data = tabla.fnGetData(row);
    console.log(data[0]);

    // paso 1: enviar el id al servidor por medio de ajax
    deleteDataAjax(data[0]);
    // paso 2: renderizar el datatable
    $("#tableGaleria").dataTable().fnDestroy();
    sendDataAjax();

}); 

//Llamando a la funcion de ajax
$("#tableGaleria").dataTable().fnDestroy();
sendDataAjax();