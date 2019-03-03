/*FUNCION QUE PREDEFINE EL TEXTO DEL MENSAJE DE ESPERA CUANDO SE
USA EL BLOQUEO DE PANTALLA PARA EL SISTEMA SED*/
function getMensajeEspera(texto) {
    if (!texto) texto = "Procesando... Un momento por favor";

    return '<div class="card card-inverse card-success mb-3 text-center"><div class="card-block"><blockquote class="card-blockquote">'+
            '<p><i class="fa fa-refresh fa-2x fa-spin" aria-hidden="true"></i>' + texto + '</p>' +
            '</blockquote></div></div>';
}




/*Función que verifica si una imagen ubicada en la url indicada por json, existe,
si existe, entonces asigna dicha imagen al elemento actual, en caso de que no exista,
asigna la imágen predeterminada*/
$.fn.asignarImagen = function (args) {
    $(this).attr('src', args.url);
    $(this).error(function () {
        $(this).attr('src', "../images/EvaluacionDocente/user.gif");
    });
};

function bloquearPantalla(mensaje) {
    
    if (!mensaje) mensaje = "Procesando... Un momento por favor";
    $('#blockScreen').remove();
    $('.modal-backdrop').remove();
    $("body").append('<div class="modal fade" id="blockScreen" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">'
        +'<div class="modal-dialog modal-sm">'
        + '<div class="modal-content"><div class="modal-body bg-success text-white"><div class="container-fluid"><div class="row align-items-center">'
        + '<div class="col-2"><i class="fa fa-refresh fa-2x fa-spin" aria-hidden="true"></i></div>'
        + '<div class="col-10">' + mensaje + '</div></div></div></div></div></div></div>');

    $('#blockScreen').modal({backdrop: 'static', keyboard:false});
}

function desbloquearPantalla() {
    $("#blockScreen").remove();
    $('.modal-backdrop').remove();
}

