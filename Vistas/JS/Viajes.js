
var data;
var tabla;
function addRowDT(data) {
    tabla = $("#tableViajes").dataTable({
        'order': [[0, 'asc']],
        'language': { 'url': 'scripts/datatables/jquery.dataTables_i18n.spanish.json' },
        'bSort': true,
        'aoColumnDefs': [{ 'bSortable': false, 'aTargets': [5] }]
    });

    tabla.fnClearTable();

    for (var i = 0; i < data.length; i++) {

        tabla.fnAddData([
            data[i].Destino,
            data[i].Hora,
            (data[i].Dia + "/" + data[i].Mes),
            data[i].Costo,
            data[i].Descripcion,
            '<button value="Eliminar" title="Eliminar" class="btn btn-danger btn-delete">Eliminar</button>'
        ]);
    }
}

function sendDataAjax() {

    $.ajax({
        type: "POST",
        url: "ViajesAdmin.aspx/ListViajes",
        data: {},
        contentType: "application/json; charset=utf-8",
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
        },
        success: function (data) {
            addRowDT(data.d);


        }

    });
}

function deleteDataAjax(data) {

    var obj = JSON.stringify({ id: data });

    $.ajax({
        type: "POST",
        url: "ViajesAdmin.aspx/EliminarDatos",
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

    // paso 1: enviar el id al servidor por medio de ajax
    deleteDataAjax(data[0]);
    // paso 2: renderizar el datatable
    $("#tableViajes").dataTable().fnDestroy();
    sendDataAjax();

}); 

//Llamando a la funcion de ajax
$("#tableViajes").dataTable().fnDestroy();
sendDataAjax();