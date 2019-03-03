<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/animate.min.css">
    <link rel="stylesheet" href="CSS/apartaTuLugar.css" />

    <title>Aparta Tu Lugar</title>
</head>
<body>
    <div id="tarjetaLugarViaje" style="position: absolute; margin-left: 50%">
        <h2 id="lblDestino" style="position: center"></h2>
        <div class="card" style="width: 25rem;">
            <img id="imgViaje" class="card-img-top" src="imgPrueba/pueblos-magicos-de-Guanajuato_Header.jpg" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-text">Precios:</h4>
                <h5 id="lblPrecioAdulto" class="card-text">Adulto:</h5>
                <h5 id="lblPrecioNino" class="card-text">Niño:</h5>
                <button type="button" id="btnInfo" class="btn btn-success"><i class="fas fa-info"></i> Mas Informacion</button>
            </div>
        </div>
    </div>
    <div class="card-deck mb-3 text-center">
        <div class="col-md-4" id="opcionesApartaTuLugar" style="margin-top: 3%; margin-left: 200px">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4 class="my-0 font-weight-normal">Aparta Tu Lugar</h4>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group col-md-4">
                            <label for="inputState">Adultos</label>
                            <select id="cmbAdultos" class="form-control">
                                <option selected>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>

                        <label id="lblAdultos" style="position: absolute; margin-left: -50px; margin-top: -50px">Total a pagar</label>
                        <script>
                            function pagoAdulto() {
                                var n1 = document.getElementById('cmbAdultos').value;
                                var precio = document.getElementById('<%=lblPrecioAdulto1.ClientID%>').innerText;
                                var suma = parseInt(n1) * precio;
                                return suma;
                            }

                            function pagoNino() {
                                var precio = document.getElementById('<%=lblPrecioNino1.ClientID%>').innerText;
                                var n2 = document.getElementById('cmbNinos').value;
                                var suma = precio * parseInt(n2);
                                return suma;
                            }
                            $("#cmbAdultos").change(function () {
                                $("#txtTotal").val(Sumar());
                                $("#lblTotalAdultos1").html("$" + pagoAdulto().toString());
                            });
                            $("#cmbNinos").change(function () {
                                $("#txtTotal").val(Sumar());
                                $("#lblTotalNinos1").html("$" + pagoNino().toString());
                            });
                        </script>
                        <h1 id="lblTotalAdultos" style="position: absolute; margin-left: 250px; margin-top: -63px"></h1>
                        <div class="container">
                            <div class="well well-sm text-center">
                                <div class="btn-group" data-toggle="buttons">
                                    <label id="btnNiños" class="btn btn-success active">
                                        ¿Usted llevara niños Mayores de 6 Años?
                                        <input id="checkNiños" type="radio" name="options">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div id="oculto" class="form-group col-md-4" style="display: none">
                            <label for="inputState">Niños</label>
                            <select id="cmbNinos" class="form-control">
                                <option selected>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                        <label id="lblNinos" style="position: absolute; margin-left: 130px; margin-top: -50px; display: none">Total a pagar</label>
                        <h1 id="lblTotalNinos" style="position: absolute; margin-left: 250px; margin-top: -65px; display: none"></h1>
                    </li>
                    <li class="list-group-item">
                        <h3 style="margin-left: -70px">Total de Asientos</h3>
                        <input class="form-control" id="txtTotal" readonly="readonly" type="text" style="position: inherit; width: 50px; height: 50px; text-align: center; margin-top: -45px; margin-left: 270px" />
                        <button type="button" class="btn btn-danger" id="btnSelectAsientos">Escoge tus asientos</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="pegaAquiAutobus"></div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Lugares</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" id="btnCerrar">Cancelar</button>
                    <button type="submit" Class="btn btn-outline-dark" ID="BtnEnviar">Confirmar Lugares </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal Reposo" tabindex="-1" role="dialog" id="ModalReposo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: black; color: white">
                    <h5 class="modal-title">Se excedio el numero de Lugares Seleccionados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¡Usted excedió el número de asientos válidos para las personas que selecciono anteriormente!</p>
                    <p><b>por favor ingrese el numero de personas correctas</b></p>
                    <div id="innecesario">
                        <p id="lblLugares"><b></b></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnAceptarError">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var a = '<asp:Literal ID="idAuto" runat="server"></asp:Literal>';
        var b = '<asp:Literal ID="idViaje" runat="server"></asp:Literal>';
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/jquery-3.2.1.min.js"></script>
    <script src="JS/internos/apartaTuLugar.js"></script>
    <script src="JS/internos/Autobus.js"></script>
    <script src="JS/bootbox.min.js"></script>
</body>
</html>