function llenarAutobus(id) {
    $("#tarjetaLugarViaje").addClass("animated bounceInLeft");
    $("#opcionesApartaTuLugar").addClass("animated bounceInLeft");
    $("#asientosAutobus").addClass("animated bounceInLeft");
    $("#tarjetaLugarViaje").css({ 'position': 'absolute', 'margin-left': '65%', 'margin-top': '1px' });
    $("#opcionesApartaTuLugar").css({ 'position': 'absolute', 'margin-left': '30%', 'margin-top': '5%' });
    //Aqui cargo la imagen del autobus Volvo y genera lugares
    if (id === 12) {
        AutobusVolvo();
    } else {
        AutobusIrizar();
    } 
    $("#asientosAutobus").css({ 'display': 'block' });
    $("#btnSelectAsientos").css({ 'display': 'none' });
    var asientosOcupados;
    asientosOcupados = document.cookie.split(',');
    for (var j = 0; j < asientosOcupados.length; j++) {
        if (asientosOcupados[j].match("(:1})")) {
            $("#btnAs1").css({ 'backgroundColor': 'red' });
            $("#btnAs1").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(:2})")) {
            $("#btnAs2").css({ 'backgroundColor': 'red' });
            $("#btnAs2").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(:3})")) {
            $("#btnAs3").css({ 'backgroundColor': 'red' });
            $("#btnAs3").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(:4})")) {
            $("#btnAs4").css({ 'backgroundColor': 'red' });
            $("#btnAs4").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(:5})")) {
            $("#btnAs5").css({ 'backgroundColor': 'red' });
            $("#btnAs5").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(:6})")) {
            $("#btnAs6").css({ 'backgroundColor': 'red' });
            $("#btnAs6").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(:7})")) {
            $("#btnAs7").css({ 'backgroundColor': 'red' });
            $("#btnAs7").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(:8})")) {
            $("#btnAs8").css({ 'backgroundColor': 'red' });
            $("#btnAs8").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(:9})")) {
            $("#btnAs9").css({ 'backgroundColor': 'red' });
            $("#btnAs9").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(10)")) {
            $("#btnAs10").css({ 'backgroundColor': 'red' });
            $("#btnAs10").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(11)")) {
            $("#btnAs11").css({ 'backgroundColor': 'red' });
            $("#btnAs11").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(12)")) {
            $("#btnAs12").css({ 'backgroundColor': 'red' });
            $("#btnAs12").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(13)")) {
            $("#btnAs13").css({ 'backgroundColor': 'red' });
            $("#btnAs13").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(14)")) {
            $("#btnAs14").css({ 'backgroundColor': 'red' });
            $("#btnAs14").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(15)")) {
            $("#btnAs15").css({ 'backgroundColor': 'red' });
            $("#btnAs15").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(16)")) {
            $("#btnAs16").css({ 'backgroundColor': 'red' });
            $("#btnAs16").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(17)")) {
            $("#btnAs17").css({ 'backgroundColor': 'red' });
            $("#btnAs17").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(18)")) {
            $("#btnAs18").css({ 'backgroundColor': 'red' });
            $("#btnAs18").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(19)")) {
            $("#btnAs19").css({ 'backgroundColor': 'red' });
            $("#btnAs19").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(20)")) {
            $("#btnAs20").css({ 'backgroundColor': 'red' });
            $("#btnAs20").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(21)")) {
            $("#btnAs21").css({ 'backgroundColor': 'red' });
            $("#btnAs21").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(22)")) {
            $("#btnAs22").css({ 'backgroundColor': 'red' });
            $("#btnAs22").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(23)")) {
            $("#btnAs23").css({ 'backgroundColor': 'red' });
            $("#btnAs23").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(24)")) {
            $("#btnAs24").css({ 'backgroundColor': 'red' });
            $("#btnAs24").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(25)")) {
            $("#btnAs25").css({ 'backgroundColor': 'red' });
            $("#btnAs25").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(26)")) {
            $("#btnAs26").css({ 'backgroundColor': 'red' });
            $("#btnAs26").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(27)")) {
            $("#btnAs27").css({ 'backgroundColor': 'red' });
            $("#btnAs27").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(28)")) {
            $("#btnAs28").css({ 'backgroundColor': 'red' });
            $("#btnAs28").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(29)")) {
            $("#btnAs29").css({ 'backgroundColor': 'red' });
            $("#btnAs29").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(30)")) {
            $("#btnAs30").css({ 'backgroundColor': 'red' });
            $("#btnAs30").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(31)")) {
            $("#btnAs31").css({ 'backgroundColor': 'red' });
            $("#btnAs31").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(32)")) {
            $("#btnAs32").css({ 'backgroundColor': 'red' });
            $("#btnAs32").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(33)")) {
            $("#btnAs33").css({ 'backgroundColor': 'red' });
            $("#btnAs33").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(34)")) {
            $("#btnAs34").css({ 'backgroundColor': 'red' });
            $("#btnAs34").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(35)")) {
            $("#btnAs35").css({ 'backgroundColor': 'red' });
            $("#btnAs35").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(36)")) {
            $("#btnAs36").css({ 'backgroundColor': 'red' });
            $("#btnAs36").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(37)")) {
            $("#btnAs37").css({ 'backgroundColor': 'red' });
            $("#btnAs37").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(38)")) {
            $("#btnAs38").css({ 'backgroundColor': 'red' });
            $("#btnAs38").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(39)")) {
            $("#btnAs39").css({ 'backgroundColor': 'red' });
            $("#btnAs39").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(40)")) {
            $("#btnAs40").css({ 'backgroundColor': 'red' });
            $("#btnAs40").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(41)")) {
            $("#btnAs41").css({ 'backgroundColor': 'red' });
            $("#btnAs41").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(42)")) {
            $("#btnAs42").css({ 'backgroundColor': 'red' });
            $("#btnAs42").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(43)")) {
            $("#btnAs43").css({ 'backgroundColor': 'red' });
            $("#btnAs43").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(44)")) {
            $("#btnAs44").css({ 'backgroundColor': 'red' });
            $("#btnAs44").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(45)")) {
            $("#btnAs45").css({ 'backgroundColor': 'red' });
            $("#btnAs45").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(46)")) {
            $("#btnAs46").css({ 'backgroundColor': 'red' });
            $("#btnAs46").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(47)")) {
            $("#btnAs47").css({ 'backgroundColor': 'red' });
            $("#btnAs47").prop('disabled', true);
        }
        if (asientosOcupados[j].match("(48)")) {
            $("#btnAs48").css({ 'backgroundColor': 'red' });
            $("#btnAs48").prop('disabled', true);
        }
    }
}

$("#btnSelectAsientos").click(function () {
    llenarAutobus(a);
});

function AutobusVolvo() {
    $("#pegaAquiAutobus").html(
        '<div id="asientosAutobus" style="display: none">' +
        '<div class="col-md-2" style="margin-top: 1%; margin-left: 50px">' +
        '<img src="img/Autobus-Volvo.png" />' +
        '</div>' +
        '<button id="btnConfirmar" type="button" class="btn btn-dark">' +
        'Confirmar Lugares' +
        '</button>' +
        '<table style="margin-left: 90px; margin-top: -570px; position: absolute; z-index: auto; text-align: center;">' +
        ' <tr>' +
        '<td width="35" height="35">'+
        '<button id="btnAs1" type="button" class="btn btn-light">01</button></td>' +
        '</td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs2" type="button" class="btn btn-light">02</button></td >' +
        '</td >' +
        '</tr >' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs5" type="button" class="btn btn-light">05</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs6" type="button" class="btn btn-light">06</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs9" type="button" class="btn btn-light">09</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs10" type="button" class="btn btn-light">10</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs13" type="button" class="btn btn-light">13</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs14" type="button" class="btn btn-light">14</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs17" type="button" class="btn btn-light">17</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs18" type="button" class="btn btn-light">18</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs21" type="button" class="btn btn-light">21</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs22" type="button" class="btn btn-light">22</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs25" type="button" class="btn btn-light">25</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs26" type="button" class="btn btn-light">26</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs29" type="button" class="btn btn-light">29</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs30" type="button" class="btn btn-light">30</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs33" type="button" class="btn btn-light">33</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs34" type="button" class="btn btn-light">34</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs37" type="button" class="btn btn-light">37</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs38" type="button" class="btn btn-light">38</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs41" type="button" class="btn btn-light">41</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs42" type="button" class="btn btn-light">42</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs43" type="button" class="btn btn-light">43</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs44" type="button" class="btn btn-light">44</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs45" type="button" class="btn btn-light">45</button></td>' +
        '</tr>' +
        '</table>' +

        '<table style="margin-left: 230px; margin-top: -570px; position: absolute; z-index: auto; text-align: center;">' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs3" type="button" class="btn btn-light">03</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs4" type="button" class="btn btn-light">04</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs7" type="button" class="btn btn-light">07</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs8" type="button" class="btn btn-light">08</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs11" type="button" class="btn btn-light">11</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs12" type="button" class="btn btn-light">12</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs15" type="button" class="btn btn-light">15</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs16" type="button" class="btn btn-light">16</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs19" type="button" class="btn btn-light">19</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs20" type="button" class="btn btn-light">20</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs23" type="button" class="btn btn-light">23</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs24" type="button" class="btn btn-light">24</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs27" type="button" class="btn btn-light">27</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs28" type="button" class="btn btn-light">28</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs31" type="button" class="btn btn-light">31</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs32" type="button" class="btn btn-light">32</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs35" type="button" class="btn btn-light">35</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs36" type="button" class="btn btn-light">36</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs39" type="button" class="btn btn-light">39</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs40" type="button" class="btn btn-light">40</button></td>' +
        '</tr>' +
        '</table>' +
        '</div>');
    $("#btnAs1").click(function () {
        asientosActivo1++;
        if (asientosActivo1 % 2 === 0) {
            $("#btnAs1").css({ 'backgroundColor': 'transparent' });
            var index1 = asientosSeleccionados.indexOf("1");
            asientosSeleccionados.splice(index1, 1);
        }
        else {
            $("#btnAs1").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("1");
            validarLugares();
        }
    });

    $("#btnAs2").click(function () {
        asientosActivo2++;
        if (asientosActivo2 % 2 === 0) {
            $("#btnAs2").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("2");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs2").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("2");
            validarLugares();
        }
    });

    $("#btnAs3").click(function () {
        asientosActivo3++;
        if (asientosActivo3 % 2 === 0) {
            $("#btnAs3").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("3");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs3").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("3");
            validarLugares();
        }
    });

    $("#btnAs4").click(function () {
        asientosActivo4++;
        if (asientosActivo4 % 2 === 0) {
            $("#btnAs4").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("4");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs4").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("4");
            validarLugares();
        }
    });

    $("#btnAs5").click(function () {
        asientosActivo5++;
        if (asientosActivo5 % 2 === 0) {
            $("#btnAs5").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("5");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs5").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("5");
            validarLugares();
        }
    });

    $("#btnAs6").click(function () {
        asientosActivo6++;
        if (asientosActivo6 % 2 === 0) {
            $("#btnAs6").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("6");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs6").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("6");
            validarLugares();
        }
    });

    $("#btnAs7").click(function () {
        asientosActivo7++;
        if (asientosActivo7 % 2 === 0) {
            $("#btnAs7").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("7");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs7").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("7");
            validarLugares();
        }
    });

    $("#btnAs8").click(function () {
        asientosActivo8++;
        if (asientosActivo8 % 2 === 0) {
            $("#btnAs8").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("8");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs8").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("8");
            validarLugares();
        }
    });

    $("#btnAs9").click(function () {
        asientosActivo9++;
        if (asientosActivo9 % 2 === 0) {
            $("#btnAs9").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("9");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs9").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("9");
            validarLugares();
        }
    });

    $("#btnAs10").click(function () {
        asientosActivo10++;
        if (asientosActivo10 % 2 === 0) {
            $("#btnAs10").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("10");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs10").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("10");
            validarLugares();
        }
    });

    $("#btnAs11").click(function () {
        asientosActivo11++;
        if (asientosActivo11 % 2 === 0) {
            $("#btnAs11").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("11");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs11").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("11");
            validarLugares();
        }
    });

    $("#btnAs12").click(function () {
        asientosActivo12++;
        if (asientosActivo12 % 2 === 0) {
            $("#btnAs12").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("12");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs12").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("12");
            validarLugares();
        }
    });

    $("#btnAs13").click(function () {
        asientosActivo13++;
        if (asientosActivo13 % 2 === 0) {
            $("#btnAs13").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("13");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs13").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("13");
            validarLugares();
        }
    });

    $("#btnAs14").click(function () {
        asientosActivo14++;
        if (asientosActivo14 % 2 === 0) {
            $("#btnAs14").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("14");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs14").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("14");
            validarLugares();
        }
    });

    $("#btnAs15").click(function () {
        asientosActivo15++;
        if (asientosActivo15 % 2 === 0) {
            $("#btnAs15").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("15");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs15").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("15");
            validarLugares();
        }
    });

    $("#btnAs16").click(function () {
        asientosActivo16++;
        if (asientosActivo16 % 2 === 0) {
            $("#btnAs16").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("16");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs16").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("16");
            validarLugares();
        }
    });

    $("#btnAs17").click(function () {
        asientosActivo17++;
        if (asientosActivo17 % 2 === 0) {
            $("#btnAs17").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("17");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs17").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("17");
            validarLugares();
        }
    });

    $("#btnAs18").click(function () {
        asientosActivo18++;
        if (asientosActivo18 % 2 === 0) {
            $("#btnAs18").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("18");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs18").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("18");
            validarLugares();
        }
    });

    $("#btnAs19").click(function () {
        asientosActivo19++;
        if (asientosActivo19 % 2 === 0) {
            $("#btnAs19").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("19");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs19").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("19");
            validarLugares();
        }
    });

    $("#btnAs20").click(function () {
        asientosActivo20++;
        if (asientosActivo20 % 2 === 0) {
            $("#btnAs20").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("20");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs20").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("20");
            validarLugares();
        }
    });

    $("#btnAs21").click(function () {
        asientosActivo21++;
        if (asientosActivo21 % 2 === 0) {
            $("#btnAs21").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("21");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs21").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("21");
            validarLugares();
        }
    });

    $("#btnAs22").click(function () {
        asientosActivo22++;
        if (asientosActivo22 % 2 === 0) {
            $("#btnAs22").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("22");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs22").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("22");
            validarLugares();
        }
    });

    $("#btnAs23").click(function () {
        asientosActivo23++;
        if (asientosActivo23 % 2 === 0) {
            $("#btnAs23").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("23");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs23").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("23");
            validarLugares();
        }
    });

    $("#btnAs24").click(function () {
        asientosActivo24++;
        if (asientosActivo24 % 2 === 0) {
            $("#btnAs24").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("24");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs24").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("24");
            validarLugares();
        }
    });

    $("#btnAs25").click(function () {
        asientosActivo25++;
        if (asientosActivo25 % 2 === 0) {
            $("#btnAs25").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("25");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs25").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("25");
            validarLugares();
        }
    });

    $("#btnAs26").click(function () {
        asientosActivo26++;
        if (asientosActivo26 % 2 === 0) {
            $("#btnAs26").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("26");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs26").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("26");
            validarLugares();
        }
    });

    $("#btnAs27").click(function () {
        asientosActivo27++;
        if (asientosActivo27 % 2 === 0) {
            $("#btnAs27").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("27");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs27").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("27");
            validarLugares();
        }
    });

    $("#btnAs28").click(function () {
        asientosActivo28++;
        if (asientosActivo28 % 2 === 0) {
            $("#btnAs28").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("28");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs28").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("28");
            validarLugares();
        }
    });

    $("#btnAs29").click(function () {
        asientosActivo29++;
        if (asientosActivo29 % 2 === 0) {
            $("#btnAs29").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("29");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs29").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("29");
            validarLugares();
        }
    });

    $("#btnAs30").click(function () {
        asientosActivo30++;
        if (asientosActivo30 % 2 === 0) {
            $("#btnAs30").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("30");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs30").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("30");
            validarLugares();
        }
    });

    $("#btnAs31").click(function () {
        asientosActivo31++;
        if (asientosActivo31 % 2 === 0) {
            $("#btnAs31").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("31");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs31").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("31");
            validarLugares();
        }
    });

    $("#btnAs32").click(function () {
        asientosActivo32++;
        if (asientosActivo32 % 2 === 0) {
            $("#btnAs32").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("32");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs32").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("32");
            validarLugares();
        }
    });

    $("#btnAs33").click(function () {
        asientosActivo33++;
        if (asientosActivo33 % 2 === 0) {
            $("#btnAs33").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("33");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs33").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("33");
            validarLugares();
        }
    });

    $("#btnAs34").click(function () {
        asientosActivo34++;
        if (asientosActivo34 % 2 === 0) {
            $("#btnAs34").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("34");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs34").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("34");
            validarLugares();
        }
    });

    $("#btnAs35").click(function () {
        asientosActivo35++;
        if (asientosActivo35 % 2 === 0) {
            $("#btnAs35").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("35");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs35").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("35");
            validarLugares();
        }
    });

    $("#btnAs36").click(function () {
        asientosActivo36++;
        if (asientosActivo36 % 2 === 0) {
            $("#btnAs36").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("36");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs36").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("36");
            validarLugares();
        }
    });

    $("#btnAs37").click(function () {
        asientosActivo37++;
        if (asientosActivo37 % 2 === 0) {
            $("#btnAs37").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("37");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs37").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("37");
            validarLugares();
        }
    });

    $("#btnAs38").click(function () {
        asientosActivo38++;
        if (asientosActivo38 % 2 === 0) {
            $("#btnAs38").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("38");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs38").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("38");
            validarLugares();
        }
    });

    $("#btnAs39").click(function () {
        asientosActivo39++;
        if (asientosActivo39 % 2 === 0) {
            $("#btnAs39").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("39");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs39").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("39");
            validarLugares();
        }
    });

    $("#btnAs40").click(function () {
        asientosActivo40++;
        if (asientosActivo40 % 2 === 0) {
            $("#btnAs40").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("40");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs40").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("40");
            validarLugares();
        }
    });

    $("#btnAs41").click(function () {
        asientosActivo41++;
        if (asientosActivo41 % 2 === 0) {
            $("#btnAs41").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("41");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs41").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("41");
            validarLugares();
        }
    });

    $("#btnAs42").click(function () {
        asientosActivo42++;
        if (asientosActivo42 % 2 === 0) {
            $("#btnAs42").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("42");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs42").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("42");
            validarLugares();
        }
    });

    $("#btnAs43").click(function () {
        asientosActivo43++;
        if (asientosActivo43 % 2 === 0) {
            $("#btnAs43").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("43");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs43").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("43");
            validarLugares();
        }
    });

    $("#btnAs44").click(function () {
        asientosActivo44++;
        if (asientosActivo44 % 2 === 0) {
            $("#btnAs44").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("44");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs44").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("44");
            validarLugares();
        }
    });

    $("#btnAs45").click(function () {
        asientosActivo45++;
        if (asientosActivo45 % 2 === 0) {
            $("#btnAs45").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("45");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs45").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("45");
            validarLugares();
        }
    });

    $("#btnAs46").click(function () {
        asientosActivo46++;
        if (asientosActivo46 % 2 === 0) {
            $("#btnAs46").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("46");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs46").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("46");
            validarLugares();
        }
    });

    $("#btnAs47").click(function () {
        asientosActivo47++;
        if (asientosActivo47 % 2 === 0) {
            $("#btnAs47").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("47");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs47").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("47");
            validarLugares();
        }
    });

    $("#btnAs48").click(function () {
        asientosActivo48++;
        if (asientosActivo48 % 2 === 0) {
            $("#btnAs48").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("48");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs48").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("48");
            validarLugares();
        }
    });
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
            '</div>' +
            '<div id="Padre"></div>');
        $("#exampleModal").modal("show");
        for (var j = 0; j < asientosSeleccionados.length; j++) {
            var asiento = '<button type="button" class="btn btn-primary"><h4>Asiento <span class="badge badge-light">' + asientosSeleccionados.unique()[j] + '</span></h4></button>';
            $("#Padre").append(asiento);
        }
        var Json = JSON.stringify(asientosSeleccionados.unique());
        document.cookie = 'Asientos = {"Asiento":"' + Json + '"};';
        document.cookie = 'Total =' + (parseFloat(pagoAdulto()) + parseFloat(pagoNino())) + ';';
    });


}

function AutobusIrizar() {
    $("#pegaAquiAutobus").html(
        '<div id="asientosAutobus" style="display: none">' +
        '<div class="col-md-2" style="margin-top: 1%; margin-left: 50px">' +
        '<img src="img/Autobus-Irizar.png" alt="">' +
        '</div>' +
        '<button id="btnConfirmar" type="button" class="btn btn-dark">' +
        'Confirmar Lugares' +
        '</button>' +
        '<table style="margin-left: 90px; margin-top: -570px; position: absolute; z-index: auto; text-align: center;">' +
        ' <tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs3" type="button" class="btn btn-light">03</button></td>' +
        '</td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs4" type="button" class="btn btn-light">04</button></td >' +
        '</td >' +
        '</tr >' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs7" type="button" class="btn btn-light">07</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs8" type="button" class="btn btn-light">08</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs11" type="button" class="btn btn-light">11</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs12" type="button" class="btn btn-light">12</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs15" type="button" class="btn btn-light">15</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs16" type="button" class="btn btn-light">16</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs19" type="button" class="btn btn-light">19</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs20" type="button" class="btn btn-light">20</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs21" type="button" class="btn btn-light">21</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs22" type="button" class="btn btn-light">22</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs23" type="button" class="btn btn-light">23</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs24" type="button" class="btn btn-light">24</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs27" type="button" class="btn btn-light">27</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs28" type="button" class="btn btn-light">28</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs31" type="button" class="btn btn-light">31</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs32" type="button" class="btn btn-light">32</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs35" type="button" class="btn btn-light">35</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs36" type="button" class="btn btn-light">36</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs39" type="button" class="btn btn-light">39</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs40" type="button" class="btn btn-light">40</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs43" type="button" class="btn btn-light">43</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs44" type="button" class="btn btn-light">44</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs45" type="button" class="btn btn-light">45</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs45" type="button" class="btn btn-light">46</button></td>' +
        '</tr>' +
        '</table>' +

        '<table style="margin-left: 230px; margin-top: -570px; position: absolute; z-index: auto; text-align: center;">' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs1" type="button" class="btn btn-light">01</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs2" type="button" class="btn btn-light">02</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs5" type="button" class="btn btn-light">05</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs6" type="button" class="btn btn-light">06</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs9" type="button" class="btn btn-light">09</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs10" type="button" class="btn btn-light">10</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs13" type="button" class="btn btn-light">13</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs14" type="button" class="btn btn-light">14</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs17" type="button" class="btn btn-light">17</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs18" type="button" class="btn btn-light">18</button></td>' +
        '</tr>' +
        '<tr><td>&nbsp;</td></tr>' +
        '<tr><td>&nbsp;</td></tr>' +
        '<tr><td>&nbsp;</td></tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs25" type="button" class="btn btn-light">25</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs26" type="button" class="btn btn-light">26</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs29" type="button" class="btn btn-light">29</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs30" type="button" class="btn btn-light">30</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs33" type="button" class="btn btn-light">33</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs34" type="button" class="btn btn-light">34</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs37" type="button" class="btn btn-light">37</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs38" type="button" class="btn btn-light">38</button></td>' +
        '</tr>' +
        '<tr>' +
        '<td width="35" height="35">' +
        '<button id="btnAs41" type="button" class="btn btn-light">41</button></td>' +
        '<td width="35" height="35">' +
        '<button id="btnAs42" type="button" class="btn btn-light">42</button></td>' +
        '</tr>' +
        '</table>' +
        '</div>');
    $("#btnAs1").click(function () {
        asientosActivo1++;
        if (asientosActivo1 % 2 === 0) {
            $("#btnAs1").css({ 'backgroundColor': 'transparent' });
            var index1 = asientosSeleccionados.indexOf("1");
            asientosSeleccionados.splice(index1, 1);
        }
        else {
            $("#btnAs1").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("1");
            validarLugares();
        }
    });

    $("#btnAs2").click(function () {
        asientosActivo2++;
        if (asientosActivo2 % 2 === 0) {
            $("#btnAs2").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("2");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs2").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("2");
            validarLugares();
        }
    });

    $("#btnAs3").click(function () {
        asientosActivo3++;
        if (asientosActivo3 % 2 === 0) {
            $("#btnAs3").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("3");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs3").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("3");
            validarLugares();
        }
    });

    $("#btnAs4").click(function () {
        asientosActivo4++;
        if (asientosActivo4 % 2 === 0) {
            $("#btnAs4").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("4");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs4").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("4");
            validarLugares();
        }
    });

    $("#btnAs5").click(function () {
        asientosActivo5++;
        if (asientosActivo5 % 2 === 0) {
            $("#btnAs5").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("5");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs5").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("5");
            validarLugares();
        }
    });

    $("#btnAs6").click(function () {
        asientosActivo6++;
        if (asientosActivo6 % 2 === 0) {
            $("#btnAs6").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("6");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs6").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("6");
            validarLugares();
        }
    });

    $("#btnAs7").click(function () {
        asientosActivo7++;
        if (asientosActivo7 % 2 === 0) {
            $("#btnAs7").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("7");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs7").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("7");
            validarLugares();
        }
    });

    $("#btnAs8").click(function () {
        asientosActivo8++;
        if (asientosActivo8 % 2 === 0) {
            $("#btnAs8").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("8");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs8").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("8");
            validarLugares();
        }
    });

    $("#btnAs9").click(function () {
        asientosActivo9++;
        if (asientosActivo9 % 2 === 0) {
            $("#btnAs9").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("9");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs9").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("9");
            validarLugares();
        }
    });

    $("#btnAs10").click(function () {
        asientosActivo10++;
        if (asientosActivo10 % 2 === 0) {
            $("#btnAs10").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("10");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs10").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("10");
            validarLugares();
        }
    });

    $("#btnAs11").click(function () {
        asientosActivo11++;
        if (asientosActivo11 % 2 === 0) {
            $("#btnAs11").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("11");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs11").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("11");
            validarLugares();
        }
    });

    $("#btnAs12").click(function () {
        asientosActivo12++;
        if (asientosActivo12 % 2 === 0) {
            $("#btnAs12").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("12");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs12").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("12");
            validarLugares();
        }
    });

    $("#btnAs13").click(function () {
        asientosActivo13++;
        if (asientosActivo13 % 2 === 0) {
            $("#btnAs13").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("13");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs13").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("13");
            validarLugares();
        }
    });

    $("#btnAs14").click(function () {
        asientosActivo14++;
        if (asientosActivo14 % 2 === 0) {
            $("#btnAs14").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("14");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs14").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("14");
            validarLugares();
        }
    });

    $("#btnAs15").click(function () {
        asientosActivo15++;
        if (asientosActivo15 % 2 === 0) {
            $("#btnAs15").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("15");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs15").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("15");
            validarLugares();
        }
    });

    $("#btnAs16").click(function () {
        asientosActivo16++;
        if (asientosActivo16 % 2 === 0) {
            $("#btnAs16").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("16");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs16").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("16");
            validarLugares();
        }
    });

    $("#btnAs17").click(function () {
        asientosActivo17++;
        if (asientosActivo17 % 2 === 0) {
            $("#btnAs17").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("17");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs17").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("17");
            validarLugares();
        }
    });

    $("#btnAs18").click(function () {
        asientosActivo18++;
        if (asientosActivo18 % 2 === 0) {
            $("#btnAs18").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("18");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs18").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("18");
            validarLugares();
        }
    });

    $("#btnAs19").click(function () {
        asientosActivo19++;
        if (asientosActivo19 % 2 === 0) {
            $("#btnAs19").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("19");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs19").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("19");
            validarLugares();
        }
    });

    $("#btnAs20").click(function () {
        asientosActivo20++;
        if (asientosActivo20 % 2 === 0) {
            $("#btnAs20").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("20");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs20").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("20");
            validarLugares();
        }
    });

    $("#btnAs21").click(function () {
        asientosActivo21++;
        if (asientosActivo21 % 2 === 0) {
            $("#btnAs21").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("21");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs21").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("21");
            validarLugares();
        }
    });

    $("#btnAs22").click(function () {
        asientosActivo22++;
        if (asientosActivo22 % 2 === 0) {
            $("#btnAs22").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("22");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs22").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("22");
            validarLugares();
        }
    });

    $("#btnAs23").click(function () {
        asientosActivo23++;
        if (asientosActivo23 % 2 === 0) {
            $("#btnAs23").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("23");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs23").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("23");
            validarLugares();
        }
    });

    $("#btnAs24").click(function () {
        asientosActivo24++;
        if (asientosActivo24 % 2 === 0) {
            $("#btnAs24").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("24");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs24").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("24");
            validarLugares();
        }
    });

    $("#btnAs25").click(function () {
        asientosActivo25++;
        if (asientosActivo25 % 2 === 0) {
            $("#btnAs25").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("25");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs25").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("25");
            validarLugares();
        }
    });

    $("#btnAs26").click(function () {
        asientosActivo26++;
        if (asientosActivo26 % 2 === 0) {
            $("#btnAs26").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("26");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs26").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("26");
            validarLugares();
        }
    });

    $("#btnAs27").click(function () {
        asientosActivo27++;
        if (asientosActivo27 % 2 === 0) {
            $("#btnAs27").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("27");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs27").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("27");
            validarLugares();
        }
    });

    $("#btnAs28").click(function () {
        asientosActivo28++;
        if (asientosActivo28 % 2 === 0) {
            $("#btnAs28").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("28");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs28").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("28");
            validarLugares();
        }
    });

    $("#btnAs29").click(function () {
        asientosActivo29++;
        if (asientosActivo29 % 2 === 0) {
            $("#btnAs29").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("29");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs29").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("29");
            validarLugares();
        }
    });

    $("#btnAs30").click(function () {
        asientosActivo30++;
        if (asientosActivo30 % 2 === 0) {
            $("#btnAs30").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("30");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs30").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("30");
            validarLugares();
        }
    });

    $("#btnAs31").click(function () {
        asientosActivo31++;
        if (asientosActivo31 % 2 === 0) {
            $("#btnAs31").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("31");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs31").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("31");
            validarLugares();
        }
    });

    $("#btnAs32").click(function () {
        asientosActivo32++;
        if (asientosActivo32 % 2 === 0) {
            $("#btnAs32").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("32");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs32").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("32");
            validarLugares();
        }
    });

    $("#btnAs33").click(function () {
        asientosActivo33++;
        if (asientosActivo33 % 2 === 0) {
            $("#btnAs33").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("33");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs33").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("33");
            validarLugares();
        }
    });

    $("#btnAs34").click(function () {
        asientosActivo34++;
        if (asientosActivo34 % 2 === 0) {
            $("#btnAs34").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("34");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs34").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("34");
            validarLugares();
        }
    });

    $("#btnAs35").click(function () {
        asientosActivo35++;
        if (asientosActivo35 % 2 === 0) {
            $("#btnAs35").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("35");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs35").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("35");
            validarLugares();
        }
    });

    $("#btnAs36").click(function () {
        asientosActivo36++;
        if (asientosActivo36 % 2 === 0) {
            $("#btnAs36").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("36");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs36").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("36");
            validarLugares();
        }
    });

    $("#btnAs37").click(function () {
        asientosActivo37++;
        if (asientosActivo37 % 2 === 0) {
            $("#btnAs37").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("37");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs37").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("37");
            validarLugares();
        }
    });

    $("#btnAs38").click(function () {
        asientosActivo38++;
        if (asientosActivo38 % 2 === 0) {
            $("#btnAs38").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("38");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs38").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("38");
            validarLugares();
        }
    });

    $("#btnAs39").click(function () {
        asientosActivo39++;
        if (asientosActivo39 % 2 === 0) {
            $("#btnAs39").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("39");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs39").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("39");
            validarLugares();
        }
    });

    $("#btnAs40").click(function () {
        asientosActivo40++;
        if (asientosActivo40 % 2 === 0) {
            $("#btnAs40").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("40");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs40").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("40");
            validarLugares();
        }
    });

    $("#btnAs41").click(function () {
        asientosActivo41++;
        if (asientosActivo41 % 2 === 0) {
            $("#btnAs41").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("41");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs41").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("41");
            validarLugares();
        }
    });

    $("#btnAs42").click(function () {
        asientosActivo42++;
        if (asientosActivo42 % 2 === 0) {
            $("#btnAs42").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("42");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs42").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("42");
            validarLugares();
        }
    });

    $("#btnAs43").click(function () {
        asientosActivo43++;
        if (asientosActivo43 % 2 === 0) {
            $("#btnAs43").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("43");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs43").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("43");
            validarLugares();
        }
    });

    $("#btnAs44").click(function () {
        asientosActivo44++;
        if (asientosActivo44 % 2 === 0) {
            $("#btnAs44").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("44");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs44").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("44");
            validarLugares();
        }
    });

    $("#btnAs45").click(function () {
        asientosActivo45++;
        if (asientosActivo45 % 2 === 0) {
            $("#btnAs45").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("45");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs45").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("45");
            validarLugares();
        }
    });

    $("#btnAs46").click(function () {
        asientosActivo46++;
        if (asientosActivo46 % 2 === 0) {
            $("#btnAs46").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("46");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs46").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("46");
            validarLugares();
        }
    });

    $("#btnAs47").click(function () {
        asientosActivo47++;
        if (asientosActivo47 % 2 === 0) {
            $("#btnAs47").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("47");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs47").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("47");
            validarLugares();
        }
    });

    $("#btnAs48").click(function () {
        asientosActivo48++;
        if (asientosActivo48 % 2 === 0) {
            $("#btnAs48").css({ 'backgroundColor': 'transparent' });
            var index = asientosSeleccionados.indexOf("48");
            asientosSeleccionados.splice(index, 1);
        }
        else {
            $("#btnAs48").css({ 'backgroundColor': 'green' });
            asientosSeleccionados.push("48");
            validarLugares();
        }
    });
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
            '</div>' +
            '<div id="Padre"></div>');
        $("#exampleModal").modal("show");
        for (var j = 0; j < asientosSeleccionados.length; j++) {
            var asiento = '<button type="button" class="btn btn-primary"><h4>Asiento <span class="badge badge-light">' + asientosSeleccionados.unique()[j] + '</span></h4></button>';
            $("#Padre").append(asiento);
        }
        var Json = JSON.stringify(asientosSeleccionados.unique());
        document.cookie = 'Asientos = {"Asiento":"' + Json + '"};';
        document.cookie = 'Total =' + (parseFloat(pagoAdulto()) + parseFloat(pagoNino())) + ';';
    });
}