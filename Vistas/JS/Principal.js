var data;
var tabla;
function addRowDT(data) {
    tabla = $("#tableDescripcion").dataTable({
        'order': [[0, 'asc']],
        'language': { 'url': 'scripts/datatables/jquery.dataTables_i18n.spanish.json' },
        'bSort': true,
        'aoColumnDefs': [{ 'bSortable': false, 'aTargets': [3] }]
    });

    tabla.fnClearTable();


    for (var i = 0; i < data.length; i++) {

        tabla.fnAddData([
            data[i].IdPrincipal,
            data[i].Descripcion,
            data[i].Estado,
            '<button value="Actualizar" title="Actualizar" class="btn btn-primary btn-edit" data-target="#exampleModalCenter" data-toggle="modal">Actualizar</button>&nbsp;' +
            '<button value="Eliminar" title="Eliminar" class="btn btn-danger btn-delete">Eliminar</button>'
        ]);
    }
}

function sendDataAjax() {

    $.ajax({
        type: "POST",
        url: "Descripcion.aspx/ListDescripcion",
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

function updateDataAjax() {
    var obj = JSON.stringify({ numero: $("#txtNumero").val(), descripcion: $("#txtDescripcionM").val(), estado: $("#DropDownList1").val() });

    console.log(obj);

    $.ajax({
        type: "POST",
        url: "Descripcion.aspx/Actualizar",
        data: obj,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
        },
        success: function (response) {

            if (response.d) {
                alert("Datos actualizado correcto");
            } else {
                alert("Error al actualizar");

            }
        }

    });
}

function deleteDataAjax(data) {

    var obj = JSON.stringify({ id: data });

    $.ajax({
        type: "POST",
        url: "Descripcion.aspx/EliminarDatos",
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

    console.log(data);
    // paso 1: enviar el id al servidor por medio de ajax
    deleteDataAjax(data[0]);
     //paso 2: renderizar el datatable
    $("#tableDescripcion").dataTable().fnDestroy();
    sendDataAjax();

}); 

function fillModalData() {
    $("#txtNumero").val(data[0]);
    $("#txtDescripcionM").val(data[1]);
    $("#DropDownList1").val(data[2]);
}


// enviar la informacion al servidor
$("#btnActualizar").click(function (e) {
    e.preventDefault();
    updateDataAjax();
});

//Llamando a la funcion de ajax
$("#tableDescripcion").dataTable().fnDestroy();
sendDataAjax();