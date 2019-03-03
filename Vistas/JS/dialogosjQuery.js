(function($) {

    $.dialogos = {

        // Public methods
        info: function(mensaje, titulo, callback) {
            if (!titulo) titulo = 'Informaci&oacute;n';
            $.dialogos._mostrar(titulo, mensaje, 'info', function(result) {
                if (callback) callback(result);
            });
        },

        error: function(mensaje, titulo, callback) {
            if (!titulo) titulo = 'Error';
            $.dialogos._mostrar(titulo, mensaje, 'error', function(result) {
                if (callback) callback(result);
            });
        },

        warning: function(mensaje, titulo, callback) {
            if (!titulo) titulo = 'Alerta';
            $.dialogos._mostrar(titulo, mensaje, 'warning', function(result) {
                if (callback) callback(result);
            });
        },

        success: function(mensaje, titulo, callback) {
            if (titulo == null) titulo = 'Informaci&oacute;n';
            $.dialogos._mostrar(titulo, mensaje, 'success', function(result) {
                if (callback) callback(result);
            });
        },

        confirm: function(mensaje, titulo, callback) {
            if (titulo == null) titulo = 'Confirmaci&oacute;n';
            $.dialogos._mostrar(titulo, mensaje, 'confirm', function(result) {
                if (callback) callback(result);
            });
        },


        // Private methods
        _mostrar: function(titulo, msg, tipo, callback) {
            $("#djMod").remove();
            
            var c = tipo, bt='';
            if (tipo == 'error')
                c = "danger";
            else if (tipo == 'confirm') {
                c = "primary";
                bt = '<button type="button" class="btn btn-secondary btn_cancel" data-dismiss="modal">Cancelar</button>'
            }

            if (tipo != 'info' && tipo != 'warning') c += " text-white";

            var dial = '<div class="modal fade" id="djMod" tabindex="-1" role="dialog" aria-labelledby="djModLab" aria-hidden="true">' +
                '<div class="modal-dialog" role="document"><div class="modal-content" style="border:none;">' +
                '<div class="bg-'+c+' modal-header"><h5 class="modal-title" id="djModLab">'+titulo+'</h5>' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>' +
                '</button></div><div class="modal-body">' + msg + '</div><div class="modal-footer">' + bt +
                '<button type="button" class="btn btn-primary btn_ok">Aceptar</button></div></div></div></div>';

            $("body").append(dial);
            $("#djMod .btn_ok").click(function () {
                callback(true);
                $("#djMod").modal('hide');
                $("#djMod").remove();
                $('.modal-backdrop').remove();
            });
            $("#djMod .btn_cancel").click(function () {
                callback(false);
                $("#djMod").modal('hide');
                $("#djMod").remove();
                $('.modal-backdrop').remove();
            });

            $("#djMod").modal({ backdrop: 'static' });
        },

        _quitarDialogo: function() {
            $("#djMod").remove();
        }
    }

    // Shortuct functions
    jInfo = function(mensaje, titulo, callback) {
        $.dialogos.info(mensaje, titulo, callback);
    }

    jError = function(mensaje, titulo, callback) {
        $.dialogos.error(mensaje, titulo, callback);
    }

    jWarning = function(mensaje, titulo, callback) {
        $.dialogos.warning(mensaje, titulo, callback);
    }

    jSuccess = function(mensaje, titulo, callback) {
        $.dialogos.success(mensaje, titulo, callback);
    }

    jConfirm = function(mensaje, titulo, callback) {
        $.dialogos.confirm(mensaje, titulo, callback);
    };

})(jQuery);