/*
* jQuery Client Side Excel Export Plugin Library
* http://www.battatech.com/
*
* Copyright (c) 2013 Batta Tech Private Limited
* Licensed under https://github.com/battatech/battatech_excelexport/blob/master/LICENSE.txt
*/

(function ($) {
    var $defaults = {
        table: null
        , dataset: null
        , columns: null
        , returnUri: false
        , worksheetName: "My Worksheet"
        , encoding: "utf-8"
    };

    var $settings = $defaults;

    $.fn.battatech_excelexport = function (options) {
        $settings = $.extend({}, $defaults, options);

        var gridData = [];
        var excelData;

        return Initialize();

        function Initialize() {

            excelData = Export($settings.table);

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                if (window.navigator.msSaveBlob) {
                    var blob = new Blob([excelData], {
                        type: "application/csv;charset=utf-8;"
                    });
                    navigator.msSaveBlob(blob, $settings.worksheetName + '.xls');
                }
            } else {
                var tmpElemento = document.createElement('a');
                $(tmpElemento).attr('href', excelData);
                $(tmpElemento).attr('download', $settings.worksheetName + '.xls');
                tmpElemento.click();
            }
        }

        function ConvertFromTable() {
            var result = $($settings.table).clone();
            return result;
        }

        function AplicarFormato(htmlTable) {
            var estilo = $(htmlTable).attr("style");

            if ($settings.tableBorder) {
                $(htmlTable).attr("style", estilo + " " + $settings.tableBorder);
            } else {
                $(htmlTable).attr("style", estilo + " border:1px solid #000;");
            }

            if ($settings.headerStyle) {
                $(htmlTable).find("th").each(function () {
                    $(this).attr("style", $settings.headerStyle);
                });
            }
            var atribStyle = '';
            if ($settings.estilos) {
                for (var estilo in $settings.estilos) {
                    $(htmlTable).find($settings.estilos[estilo].clase).each(function (indice, elemento) {
                        atribStyle = $(elemento).attr("style") + $settings.estilos[estilo].css;
                        $(elemento).removeAttr("style");
                        $(elemento).attr("style", atribStyle);
                    });
                }
            }

            return htmlTable;
        }

        function Export(tabla) {
            var tablaConFormato = AplicarFormato(tabla);

            $('<div>').append($('#' + $settings.containerid).clone()).html();

            htmltable = $('<div>').append($(tablaConFormato)).html();

            var excelFile = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:x='urn:schemas-microsoft-com:office:excel' xmlns='http://www.w3.org/TR/REC-html40'>";
            excelFile += "<head>";
            excelFile += '<meta http-equiv="Content-type" content="text/html;charset=' + $defaults.encoding + '" />';
            excelFile += "<!--[if gte mso 9]>";
            excelFile += "<xml>";
            excelFile += "<x:ExcelWorkbook>";
            excelFile += "<x:ExcelWorksheets>";
            excelFile += "<x:ExcelWorksheet>";
            excelFile += "<x:Name>";
            excelFile += "{worksheet}";
            excelFile += "</x:Name>";
            excelFile += "<x:WorksheetOptions>";
            excelFile += "<x:DisplayGridlines/>";
            excelFile += "</x:WorksheetOptions>";
            excelFile += "</x:ExcelWorksheet>";
            excelFile += "</x:ExcelWorksheets>";
            excelFile += "</x:ExcelWorkbook>";
            excelFile += "</xml>";
            excelFile += "<![endif]-->";
            excelFile += "</head>";
            excelFile += "<body>";
            excelFile += htmltable.replace(/"/g, '\'');
            excelFile += "</body>";
            excelFile += "</html>";

            var uri = "data:application/vnd.ms-excel;base64,";
            var ctx = { worksheet: $settings.worksheetName, table: htmltable };

            return (uri + base64(format(excelFile, ctx)));
        }

        function base64(s) {
            return window.btoa(unescape(encodeURIComponent(s)));
        }

        function format(s, c) {
            return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; });
        }
    };
})(jQuery);


function exportarListado(tablaAExportar, titulo, estiloEncabezado, estiloBorde, estilosAdicionales) {

    $(tablaAExportar).find("a").each(function () {
        $(this).removeAttr("href");
    });

    if (!estiloEncabezado) {
        estiloEncabezado = "padding:2px 10px;color:#fff;border-left:1px solid #007100;border-right:1px solid #007100;border-bottom:3px solid #ccc;background-color:#008800;";
    }

    if (!estiloBorde) {
        estiloBorde = "border:1px solid #007100;";
    }

    if (!estilosAdicionales) {
        estilosAdicionales = [
                {
                    clase: ".Insuficiente",
                    css: "background-color:#DE1010; color:#fff;"
                },
                {
                    clase: ".Suficiente",
                    css: "background-color:#7710DE; color:#fff;"
                },
                {
                    clase: ".Bueno",
                    css: "background-color:#F516B9; color:#fff;"
                },
                {
                    clase: ".Notable",
                    css: "background-color:#F55B27; color:#fff;"
                },
                {
                    clase: ".Excelente",
                    css: "background-color:#0036D6; color:#fff;"
                }
        ];
    } else {
        estilosAdicionales.push([
                {
                    clase: ".Insuficiente",
                    css: "background-color:#DE1010; color:#fff;"
                },
                {
                    clase: ".Suficiente",
                    css: "background-color:#7710DE; color:#fff;"
                },
                {
                    clase: ".Bueno",
                    css: "background-color:#F516B9; color:#fff;"
                },
                {
                    clase: ".Notable",
                    css: "background-color:#F55B27; color:#fff;"
                },
                {
                    clase: ".Excelente",
                    css: "background-color:#0036D6; color:#fff;"
                }
        ]);
    }

    $(tablaAExportar).battatech_excelexport({
        worksheetName: titulo,
        table: $(tablaAExportar)[0],
        headerStyle: estiloEncabezado,
        tableBorder: estiloBorde,
        estilos: estilosAdicionales
    });
}