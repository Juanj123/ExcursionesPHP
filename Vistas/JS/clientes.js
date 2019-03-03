var data;
var tabla;
function addRowDT(data) {
    tabla = $("#tableClientes").dataTable({
        'order': [[0, 'asc']],
        'language': { 'url': 'scripts/datatables/jquery.dataTables_i18n.spanish.json' },
        'bSort': true,
        'aoColumnDefs': [{ 'bSortable': false, 'aTargets': [4] }]
    });

    tabla.fnClearTable();

    for (var i = 0; i < data.length; i++) {

        tabla.fnAddData([
            data[i].Nombres,
            data[i].Apellidos,
            data[i].Correo,
            data[i].Usuario,
            '<button value="Ver" title="Ver" class="btn btn-primary btn-edit" data-target="#exampleModalCenter" data-toggle="modal">Ver</button>&nbsp;'
        ]);
    }
}

function sendDataAjax() {

    $.ajax({
        type: "POST",
        url: "Clientes.aspx/List",
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

// evento click para boton actualizar
$(document).on('click', '.btn-edit', function (e) {
    e.preventDefault();

    var row = $(this).parent().parent()[0];
    data = tabla.fnGetData(row);
    fillModalData();

});

function fillModalData() {
    $("#txtNombres").val(data[0]);
    $("#txtApellidos").val(data[1]);
    $("#txtCorreo").val(data[2]);
    $("#txtUsuario").val(data[3]);
}

//Llamando a la funcion de ajax
$("#tableClientes").dataTable().fnDestroy();
sendDataAjax();