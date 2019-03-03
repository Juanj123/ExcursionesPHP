var visible = 0;
var asientosActivo1 = 0; var asientosActivo2 = 0; var asientosActivo3 = 0; var asientosActivo4 = 0; var asientosActivo5 = 0; var
    asientosActivo6 = 0; var asientosActivo7 = 0; var asientosActivo8 = 0; var asientosActivo9 = 0; var asientosActivo10 = 0; var
        asientosActivo11 = 0; var asientosActivo12 = 0; var asientosActivo13 = 0; var asientosActivo14 = 0; var asientosActivo15 = 0; var
            asientosActivo16 = 0; var asientosActivo17 = 0; var asientosActivo18 = 0; var asientosActivo19 = 0; var asientosActivo20 = 0; var
                asientosActivo21 = 0; var asientosActivo22 = 0; var asientosActivo23 = 0; var asientosActivo24 = 0; var asientosActivo25 = 0; var
                    asientosActivo26 = 0; var asientosActivo27 = 0; var asientosActivo28 = 0; var asientosActivo29 = 0; var asientosActivo30 = 0; var
                        asientosActivo31 = 0; var asientosActivo32 = 0; var asientosActivo33 = 0; var asientosActivo34 = 0; var asientosActivo35 = 0; var
                            asientosActivo36 = 0; var asientosActivo37 = 0; var asientosActivo38 = 0; var asientosActivo39 = 0; var asientosActivo40 = 0; var
                                asientosActivo41 = 0; var asientosActivo42 = 0; var asientosActivo43 = 0; var asientosActivo44 = 0; var asientosActivo45 = 0; var
                                    asientosActivo46 = 0; var asientosActivo47 = 0; var asientosActivo48 = 0;
var asientosSeleccionados = [];
Array.prototype.unique = function (a) {
    return function () {
        return this.filter(a);
    };
}
    (function (a, b, c) {
        return c.indexOf(a, b + 1) < 0;
    });

$(document).ready(function () {
    $("#Validacion").modal("show");
    $("#txtTotal").val(Sumar());
    $("#lblTotalNinos").html("$" + pagoNino().toString());
    $("#lblTotalAdultos").html("$" + pagoAdulto().toString());

    $("#btnCerrar").click(function () {
        //$("#exampleModal").modal("hide");
        $(document).html('<div class="modal fade" id="btnCancelarProceso" tabindex="-1" role="dialog" aria-labelledby="btnCancelarProceso" aria-hidden="true">' +
            '<div class= "modal-dialog" role = "document" >' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<h5 class="modal-title" id="Cancelar">Cancelar Registro de Lugar en este Viaje</h5>' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>' +
            '<div class="modal-body">' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>' +
            '<button type="button" class="btn btn-success">Continuar</button>' +
            '</div>' +
            '</div>' +
            '</div >' +
            '</div >');
        $("#btnCancelarProceso").modal("show");
        //location.reload();
    });

    $('#exampleModal').on('hidden.bs.modal', function () {
        jQuery(this).find('.modal-body').empty();
        $(".modal-body").html('<div class="alert alert-light" role="alert">' +
            '<h3 style="color:black; text-align:center;">Lugares Apartados</h3>' +
            '</div>' +
            '<div class="alert alert-primary" role="alert">' +
            '<h3 style="color:black; text-align:center;">Adultos</h3>' +
            '</div>' +
            '<h3 style="color:black; text-align:center;">' + document.getElementById('cmbAdultos').value + '</h3>' +
            '<div class="alert alert-info" role="alert">' +
            '<h3 style="color:black; text-align:center;">Niños</h3>' +
            '</div>' +
            '<h3 style="color:black; text-align:center;">' + document.getElementById('cmbNinos').value + '</h3>' +
            '<div class="alert alert-dark" role="alert">' +
            '<h3 style="color:black; text-align:center;">Total a pagar</h3>' +
            '</div>' +
            '<h3 style="color:black; text-align:center; font-weight: bold;">$' + (parseFloat(pagoAdulto()) + parseFloat(pagoNino())) + '</h3>' +
            '<div class="alert alert-dark" role="alert">' +
            '<h3 style="color:black; text-align:center;">Asientos Seleccionados</h3>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="Nota">Deja una Nota</label>' +
            '<textarea class="form-control" id="Nota" rows="3"></textarea>' +
            '</div>'+
            '<div id="Padre"></div>');
    });
});

function Sumar() {
    var n1 = document.getElementById('cmbAdultos').value;
    var n2 = document.getElementById('cmbNinos').value;
    var suma = parseInt(n1) + parseInt(n2);
    return suma;
}

function pagoTotal() {
    var n1 = document.getElementById('cmbAdultos').value;
    var n2 = document.getElementById('cmbNinos').value;
    var suma = parseInt(n1) + parseInt(n2);
    return suma;
}

$("#cmbAdultos").change(function () {
    $("#txtTotal").val(Sumar());
    $("#lblTotalAdultos").html("$" + pagoAdulto().toString());
});
$("#cmbNinos").change(function () {
    $("#txtTotal").val(Sumar());
    $("#lblTotalNinos").html("$" + pagoNino().toString());
});

$("#btnNiños").click(function () {
    visible++;
    if (visible % 2 === 0) {
        Ocultar();
    }
    else {
        mostrar();
    }
});

function validarLugares() {
    if (asientosSeleccionados.length > Sumar()) {
        $("#ModalReposo").modal("show");
        $("#lblLugares").html('<h3 style="color:black; text-align:center;"> Número de asientos que debió seleccionar <br style="color:red">' + Sumar() + '</br></h3>');
        $("#btnAceptarError").click(function () {
            location.reload();
        });
    }
}

function mostrar() {
    $('#oculto').addClass('animated bounceInUp form-group col-md-4');
    $('#lblNinos').addClass('animated bounceInUp');
    $('#lblTotalNinos').addClass('animated bounceInUp');
    $('#oculto').css({ 'display': 'block' });
    $('#lblTotalNinos').css({ 'display': 'block' });
    $('#lblNinos').css({ 'display': 'block' });
    $('.btn.btn-dark').css({ 'margin-top': '-200px' });
    $('#oculto').css({ 'display': 'block' });
}

function Ocultar() {
    $('#oculto').css({ 'display': 'none' });
    $('#lblTotalNinos').css({ 'display': 'none' });
    $('#lblNinos').css({ 'display': 'none' });
    $('.btn.btn-dark').css({ 'margin-top': '-300px' });
    document.getElementById("cmbNinos").value = '0';
    $("#txtTotal").val(Sumar());
}

$("#btnConfirmar").click(function () {
    $(".modal-body").html('<div class="alert alert-light" role="alert">' +
        '<h3 style="color:black; text-align:center;">Lugares Apartados</h3>' +
        '</div>' +
        '<div class="alert alert-primary" role="alert">' +
        '<h3 style="color:black; text-align:center;">Adultos</h3>' +
        '</div>' +
        '<h3 style="color:black; text-align:center;">' + document.getElementById('cmbAdultos').value + '</h3>' +
        '<div class="alert alert-info" role="alert">' +
        '<h3 style="color:black; text-align:center;">Niños</h3>' +
        '</div>' +
        '<h3 style="color:black; text-align:center;">' + document.getElementById('cmbNinos').value + '</h3>' +
        '<div class="alert alert-dark" role="alert">' +
        '<h3 style="color:black; text-align:center;">Total a pagar</h3>' +
        '</div>' +
        '<h3 style="color:black; text-align:center; font-weight: bold;">$' + (parseFloat(pagoAdulto()) + parseFloat(pagoNino())) + '</h3>' +
        '<div class="alert alert-dark" role="alert">' +
        '<h3 style="color:black; text-align:center;">Asientos Seleccionados</h3>' +
        '</div>' +
        '<div class="form-group">' +
        '<label for="Nota">Deja una Nota</label>' +
        '<textarea class="form-control" id="Nota" rows="3"></textarea>' +
        '</div>'+
        '<div id="Padre"></div>');

    $("#exampleModal").modal("show");
    for (var j = 0; j < asientosSeleccionados.length; j++) {
        var asiento = '<button type="button" class="btn btn-primary"><h4>Asiento <span class="badge badge-light">' + asientosSeleccionados.unique()[j] + '</span></h4></button>';
        $("#Padre").append(asiento);
    }
});