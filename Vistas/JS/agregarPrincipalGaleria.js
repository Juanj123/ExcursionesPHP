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
            data[i].Titulo,
            data[i].Img_galeria,
            '<button value="Ver" title="Ver" class="btn btn-primary btn-edit" data-target="#exampleModalCenter" data-toggle="modal">Ver</button>&nbsp;'
        ]);
    }
}

function sendDataAjax() {

    $.ajax({
        type: "POST",
        url: "AgregarPrincipalGaleria.aspx/ListImg",
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

function insertDataAjax() {
    var obj = JSON.stringify({ url: $("#txtRuta").val(), titulo: $("#txtTitulo").val() });

    console.log(obj);
    $.ajax({
        type: "POST",
        url: "AgregarPrincipalGaleria.aspx/insertImagen",
        data: obj,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
        },
        success: function (response) {

            if (response.d) {
                alert("imagen agregada correcto");
            } else {
                alert("Error al guardar");

            }
        }

    });
}

function llenar()
{

    $.ajax({
        type: "POST",
        url: "AgregarPrincipalGaleria.aspx/cardarDatos",
        data: {},
        contentType: "application/json; charset=utf-8",
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
        },
        success: function (data) {
            llenarCombo(data.d);
            

        }

    });
}

function llenarCombo(data)
{

    for (var i = 0; i < data.length; i++)
    {
        $("#dpdlIdDescripcion").append($("<option></option>").text(data[i].IdPrincipal));
          
    }
}


// evento click para boton actualizar
$(document).on('click', '.btn-edit', function (e) {
    e.preventDefault();
    var row = $(this).parent().parent()[0];
    data = tabla.fnGetData(row);
    fillModalData();
    llenar();

});



function fillModalData() {
    
    $("#txtTitulo").val(data[0]);
    $("#txtRuta").val(data[1]);
    $("#imgGale").attr("src",data[1]);  
}

// enviar la informacion al servidor
$("#btnSeleccionar").click(function (e) {
    e.preventDefault();
    insertDataAjax();
});

$("#tablePrincipalGleria").dataTable().fnDestroy();
sendDataAjax();