var data;
var tabla;
function addRowDT(data) {
    tabla = $("#tablePrincipalGleria").dataTable({
        'order': [[0, 'asc']],
        'language': { 'url': 'scripts/datatables/jquery.dataTables_i18n.spanish.json' },
        'bSort': true,
        'aoColumnDefs': [{ 'bSortable': false, 'aTargets': [2] }]
    });

    tabla.fnClearTable();


    for (var i = 0; i < data.length; i++) {

        tabla.fnAddData([
            data[i].IdGaleria,
            data[i].Img,
            '<button value="Ver" title="Ver" class="btn btn-primary btn-edit" data-target="#exampleModalCenter" data-toggle="modal">Ver</button>&nbsp;' +
            '<button value="Eliminar" title="Eliminar" class="btn btn-danger btn-delete">Eliminar</button>'
        ]);
    }
}

function sendDataAjax() {

    $.ajax({
        type: "POST",
        url: "PrincipalGaleria.aspx/ListImg",
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
        url: "PrincipalGaleria.aspx/EliminarDatos",
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

//function combo()
//{
//    $.ajax({
//        type: "POST",
//        url: "PrincipalGaleria.aspx/comboDescri",
//        data: {},
//        contentType: "application/json; charset=utf-8",
//        error: function (xhr, ajaxOptions, thrownError) {
//            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
//        },
//        success: function (data) {
//            addRowDT(data.d);

//        }

//    });
//}

//function llenar() {

//    $.ajax({
//        type: "POST",
//        url: "PrincipalGaleria.aspx/cardarDatos",
//        data: {},
//        contentType: "application/json; charset=utf-8",
//        error: function (xhr, ajaxOptions, thrownError) {
//            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
//        },
//        success: function (data) {
//            llenarCombo(data.d);


//        }

//    });
//}


//function llenarCombo(data) {

//    for (var i = 0; i < data.length; i++) {
//        $("#dpdlIdDescripcion").append($("<option></option>").text(data[i].IdPrincipal));

//    }
//}

//function updateDataAjax() {
//    var obj = JSON.stringify({ nombre: $("#txtTitulo").val(), url: $("#txtRuta").val(), descripcion: $("#dpdlIdDescripcion").val() });

//    console.log(obj);
//    $.ajax({
//        type: "POST",
//        url: "PrincipalGaleria.aspx/Actualizar",
//        data: obj,
//        dataType: "json",
//        contentType: "application/json; charset=utf-8",
//        error: function (xhr, ajaxOptions, thrownError) {
//            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
//        },
//        success: function (response) {

//            if (response.d) {
//                alert("Video actualizado correcto");
//            } else {
//                alert("Error al actualizar");

//            }
//        }

//    });
//}

// evento click para boton actualizar
$(document).on('click', '.btn-edit', function (e) {
    e.preventDefault();
    var row = $(this).parent().parent()[0];
    data = tabla.fnGetData(row);
    fillModalData();
    //llenar();
});

function fillModalData() {
    $("#txtTitulo").val(data[0]);
    $("#txtRuta").val(data[1]);
    $("#imgGale").attr("src", data[1]);

}



//enviar informacion al servidor 
//$("#btnSeleccionar").click(function (e) {
//    e.preventDefault();
//    updateDataAjax();
//});

$(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    var row = $(this).parent().parent()[0];
    data = tabla.fnGetData(row);

    // paso 1: enviar el id al servidor por medio de ajax
    deleteDataAjax(data[0]);
    // paso 2: renderizar el datatable
    $("#tablePrincipalGleria").dataTable().fnDestroy();
    sendDataAjax();

}); 

$("#tablePrincipalGleria").dataTable().fnDestroy();
sendDataAjax();