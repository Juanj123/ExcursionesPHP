<!doctype html>
<html lang="en">
<head>
    <?php 
    $idvi=6;
    echo "<script>alert('$idvi')</script>";
    setcookie("idViaje", $idvi,time()+30);

    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/animate.min.css">
    <link rel="stylesheet" href="CSS/apartaTuLugar.css" />

    <title>Aparta Tu Lugar</title>
    <?php
    require_once("../Datos/DaoApartaTuLugar.php");
    require_once("../Datos/DaoPromociones.php");
    require_once("../Pojos/PojoApartaTuLugar.php");
    ?>
</head>
<body>
    <?php
    $objDaoAparta = new DaoApartaTuLugar();
    $objDaoPromociones = new DaoPromociones();
    if ($objDaoAparta->ViajeOferta($idvi) == 1 ) {
        echo "<script>alert('Este Viaje tiene Descuento');</script>";
        $lista = $objDaoAparta->getDatosOferta($idvi);
    }else{
        $lista = $objDaoAparta->getDatosViaje($idvi);
    }
    $datosAutobus = $objDaoAparta->getImgNomAutobus($objDaoAparta->getIDAutobus($idvi));
    $json = $objDaoAparta->getAsientosOcupados($idvi);
    ?>
    <div id="tarjetaLugarViaje" style="position: absolute; margin-left: 65%; margin-top: 1px">
        <h2 id="lblDestino" style="position: center"><?php echo $lista[0]->{"destino"}; ?></h2>
        <div class="card" style="width: 25rem;">
            <img id="imgViaje" class="card-img-top" src= <?php echo $lista[0]->{"img"}; ?> alt="Card image cap">
            <div class="card-body">
                <h4 class="card-text">Precios:</h4>
                <div class="alert alert-success" role="alert">
                    <h5 class="alert-link" style="text-align: center;">Precio Aduto:</h5>
                </div>

                <h5 id="lblPrecioAdulto" style="text-align: center;">
                    <?php 
                    echo $lista[0]->{"costo"};
                    ?>
                </h5>
                <div class="alert alert-info" role="alert">
                    <h5 class="alert-link" style="text-align: center;">Precio Menor de 6 Años: </h5>
                </div>
                <h5 id="lblPrecioNino" style="text-align: center;">
                    <?php echo $lista[0]->{"costoNinio"}; ?>             
                </h5>

                <div class="alert alert-info" role="alert">
                    <h5 class="alert-link" style="text-align: center;">Precio Mayor de 6 Años: </h5>
                </div>
                <h5 id="lblPrecioNino" style="text-align: center;">
                    <?php echo $lista[0]->{"costoAd"}; ?>             
                </h5>
                <button type="button" id="btnInfo" class="btn btn-success"><i class="fas fa-info"></i> Mas Informacion</button>
            </div>
        </div>
    </div>
    <div class="card-deck mb-3 text-center">
        <div class="col-md-4" id="opcionesApartaTuLugar" style="margin-top: 5%; margin-left: 30%">
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
    <div class="col-md-2" style="position: absolute; margin-top: -460px; margin-left: 50px">
        <img src=<?php echo $datosAutobus[0]->{"img"} ?>>
        <div id="tblLugares" style="display: none;">
            <?php 
            if ($datosAutobus[0]->{"nombre"} == "Irizar") {
                ?>
                <table style="margin-left: 10px; margin-top: -580px; position: absolute; z-index: auto; text-align: center;"> 
         <tr> 
        <td width="35" height="35"> 
        <button id="btnAs3" type="button" class="btn btn-light">03</button></td> 
        </td> 
        <td width="35" height="35"> 
        <button id="btnAs4" type="button" class="btn btn-light">04</button></td > 
        </td > 
        </tr > 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs7" type="button" class="btn btn-light">07</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs8" type="button" class="btn btn-light">08</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs11" type="button" class="btn btn-light">11</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs12" type="button" class="btn btn-light">12</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs15" type="button" class="btn btn-light">15</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs16" type="button" class="btn btn-light">16</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs19" type="button" class="btn btn-light">19</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs20" type="button" class="btn btn-light">20</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs21" type="button" class="btn btn-light">21</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs22" type="button" class="btn btn-light">22</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs23" type="button" class="btn btn-light">23</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs24" type="button" class="btn btn-light">24</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs27" type="button" class="btn btn-light">27</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs28" type="button" class="btn btn-light">28</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs31" type="button" class="btn btn-light">31</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs32" type="button" class="btn btn-light">32</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs35" type="button" class="btn btn-light">35</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs36" type="button" class="btn btn-light">36</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs39" type="button" class="btn btn-light">39</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs40" type="button" class="btn btn-light">40</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs43" type="button" class="btn btn-light">43</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs44" type="button" class="btn btn-light">44</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs45" type="button" class="btn btn-light">45</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs45" type="button" class="btn btn-light">46</button></td> 
        </tr> 
        </table> 

        <table style="margin-left: 180px; margin-top: -580px; position: absolute; z-index: auto; text-align: center;"> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs1" type="button" class="btn btn-light">01</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs2" type="button" class="btn btn-light">02</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs5" type="button" class="btn btn-light">05</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs6" type="button" class="btn btn-light">06</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs9" type="button" class="btn btn-light">09</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs10" type="button" class="btn btn-light">10</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs13" type="button" class="btn btn-light">13</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs14" type="button" class="btn btn-light">14</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs17" type="button" class="btn btn-light">17</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs18" type="button" class="btn btn-light">18</button></td> 
        </tr> 
        <tr><td>&nbsp;</td></tr> 
        <tr><td>&nbsp;</td></tr> 
        <tr><td>&nbsp;</td></tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs25" type="button" class="btn btn-light">25</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs26" type="button" class="btn btn-light">26</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs29" type="button" class="btn btn-light">29</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs30" type="button" class="btn btn-light">30</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs33" type="button" class="btn btn-light">33</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs34" type="button" class="btn btn-light">34</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs37" type="button" class="btn btn-light">37</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs38" type="button" class="btn btn-light">38</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs41" type="button" class="btn btn-light">41</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs42" type="button" class="btn btn-light">42</button></td> 
        </tr> 
        </table> 
        <?php  
    }else{
?>
<table style="margin-left: 90px; margin-top: -570px; position: absolute; z-index: auto; text-align: center;"> 
         <tr> 
        <td width="35" height="35">
        <button id="btnAs1" type="button" class="btn btn-light">01</button></td> 
        </td> 
        <td width="35" height="35"> 
        <button id="btnAs2" type="button" class="btn btn-light">02</button></td > 
        </td > 
        </tr > 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs5" type="button" class="btn btn-light">05</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs6" type="button" class="btn btn-light">06</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs9" type="button" class="btn btn-light">09</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs10" type="button" class="btn btn-light">10</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs13" type="button" class="btn btn-light">13</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs14" type="button" class="btn btn-light">14</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs17" type="button" class="btn btn-light">17</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs18" type="button" class="btn btn-light">18</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs21" type="button" class="btn btn-light">21</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs22" type="button" class="btn btn-light">22</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs25" type="button" class="btn btn-light">25</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs26" type="button" class="btn btn-light">26</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs29" type="button" class="btn btn-light">29</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs30" type="button" class="btn btn-light">30</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs33" type="button" class="btn btn-light">33</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs34" type="button" class="btn btn-light">34</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs37" type="button" class="btn btn-light">37</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs38" type="button" class="btn btn-light">38</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs41" type="button" class="btn btn-light">41</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs42" type="button" class="btn btn-light">42</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs43" type="button" class="btn btn-light">43</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs44" type="button" class="btn btn-light">44</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs45" type="button" class="btn btn-light">45</button></td> 
        </tr> 
        </table> 

        <table style="margin-left: 230px; margin-top: -570px; position: absolute; z-index: auto; text-align: center;"> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs3" type="button" class="btn btn-light">03</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs4" type="button" class="btn btn-light">04</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs7" type="button" class="btn btn-light">07</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs8" type="button" class="btn btn-light">08</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs11" type="button" class="btn btn-light">11</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs12" type="button" class="btn btn-light">12</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs15" type="button" class="btn btn-light">15</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs16" type="button" class="btn btn-light">16</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs19" type="button" class="btn btn-light">19</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs20" type="button" class="btn btn-light">20</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs23" type="button" class="btn btn-light">23</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs24" type="button" class="btn btn-light">24</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs27" type="button" class="btn btn-light">27</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs28" type="button" class="btn btn-light">28</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs31" type="button" class="btn btn-light">31</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs32" type="button" class="btn btn-light">32</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs35" type="button" class="btn btn-light">35</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs36" type="button" class="btn btn-light">36</button></td> 
        </tr> 
        <tr> 
        <td width="35" height="35"> 
        <button id="btnAs39" type="button" class="btn btn-light">39</button></td> 
        <td width="35" height="35"> 
        <button id="btnAs40" type="button" class="btn btn-light">40</button></td> 
        </tr> 
        </table> 
<?php  }?>
    
            
        </div>
    </div>
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/bootbox.min.js"></script>
    <script src="JS/internos/apartaTuLugar.js"></script>
    <script>
        $("#btnSelectAsientos").click(function () {
            $("#tblLugares").addClass("animated zoomIn");
            $("#tblLugares").css({ 'display': 'block' });
            var asientosOcupados = new Array();
            <?php foreach ($json as $key) {
                echo "asientosOcupados.push(".$key->{"n_Asiento"}.");";
            } ?>
            alert(asientosOcupados);
            asientosOcupados.forEach(function(element) {
        if (element == 1) {
            $("#btnAs1").css({ 'backgroundColor': 'red' });
            $("#btnAs1").prop('disabled', true);
        }
        if (element == 2) {
            $("#btnAs2").css({ 'backgroundColor': 'red' });
            $("#btnAs2").prop('disabled', true);
        }
        if (element ==3) {
            $("#btnAs3").css({ 'backgroundColor': 'red' });
            $("#btnAs3").prop('disabled', true);
        }
        if (element ==4) {
            $("#btnAs4").css({ 'backgroundColor': 'red' });
            $("#btnAs4").prop('disabled', true);
        }
        if (element == 5) {
            $("#btnAs5").css({ 'backgroundColor': 'red' });
            $("#btnAs5").prop('disabled', true);
        }
        if (element == 6) {
            $("#btnAs6").css({ 'backgroundColor': 'red' });
            $("#btnAs6").prop('disabled', true);
        }
        if (element ==7) {
            $("#btnAs7").css({ 'backgroundColor': 'red' });
            $("#btnAs7").prop('disabled', true);
        }
        if (element ==8) {
            $("#btnAs8").css({ 'backgroundColor': 'red' });
            $("#btnAs8").prop('disabled', true);
        }
        if (element ==9) {
            $("#btnAs9").css({ 'backgroundColor': 'red' });
            $("#btnAs9").prop('disabled', true);
        }
        if (element ==10) {
            $("#btnAs10").css({ 'backgroundColor': 'red' });
            $("#btnAs10").prop('disabled', true);
        }
        if (element ==11) {
            $("#btnAs11").css({ 'backgroundColor': 'red' });
            $("#btnAs11").prop('disabled', true);
        }
        if (element ==12) {
            $("#btnAs12").css({ 'backgroundColor': 'red' });
            $("#btnAs12").prop('disabled', true);
        }
        if (element ==13) {
            $("#btnAs13").css({ 'backgroundColor': 'red' });
            $("#btnAs13").prop('disabled', true);
        }
        if (element ==14) {
            $("#btnAs14").css({ 'backgroundColor': 'red' });
            $("#btnAs14").prop('disabled', true);
        }
        if (element ==15) {
            $("#btnAs15").css({ 'backgroundColor': 'red' });
            $("#btnAs15").prop('disabled', true);
        }
        if (element ==16) {
            $("#btnAs16").css({ 'backgroundColor': 'red' });
            $("#btnAs16").prop('disabled', true);
        }
        if (element ==17) {
            $("#btnAs17").css({ 'backgroundColor': 'red' });
            $("#btnAs17").prop('disabled', true);
        }
        if (element ==18) {
            $("#btnAs18").css({ 'backgroundColor': 'red' });
            $("#btnAs18").prop('disabled', true);
        }
        if (element ==19) {
            $("#btnAs19").css({ 'backgroundColor': 'red' });
            $("#btnAs19").prop('disabled', true);
        }
        if (element ==20) {
            $("#btnAs20").css({ 'backgroundColor': 'red' });
            $("#btnAs20").prop('disabled', true);
        }
        if (element ==21) {
            $("#btnAs21").css({ 'backgroundColor': 'red' });
            $("#btnAs21").prop('disabled', true);
        }
        if (element ==22) {
            $("#btnAs22").css({ 'backgroundColor': 'red' });
            $("#btnAs22").prop('disabled', true);
        }
        if (element ==23) {
            $("#btnAs23").css({ 'backgroundColor': 'red' });
            $("#btnAs23").prop('disabled', true);
        }
        if (element ==24) {
            $("#btnAs24").css({ 'backgroundColor': 'red' });
            $("#btnAs24").prop('disabled', true);
        }
        if (element ==25) {
            $("#btnAs25").css({ 'backgroundColor': 'red' });
            $("#btnAs25").prop('disabled', true);
        }
        if (element ==26) {
            $("#btnAs26").css({ 'backgroundColor': 'red' });
            $("#btnAs26").prop('disabled', true);
        }
        if (element ==27) {
            $("#btnAs27").css({ 'backgroundColor': 'red' });
            $("#btnAs27").prop('disabled', true);
        }
        if (element ==28) {
            $("#btnAs28").css({ 'backgroundColor': 'red' });
            $("#btnAs28").prop('disabled', true);
        }
        if (element ==29) {
            $("#btnAs29").css({ 'backgroundColor': 'red' });
            $("#btnAs29").prop('disabled', true);
        }
        if (element ==30) {
            $("#btnAs30").css({ 'backgroundColor': 'red' });
            $("#btnAs30").prop('disabled', true);
        }
        if (element ==31) {
            $("#btnAs31").css({ 'backgroundColor': 'red' });
            $("#btnAs31").prop('disabled', true);
        }
        if (element ==32) {
            $("#btnAs32").css({ 'backgroundColor': 'red' });
            $("#btnAs32").prop('disabled', true);
        }
        if (element ==33) {
            $("#btnAs33").css({ 'backgroundColor': 'red' });
            $("#btnAs33").prop('disabled', true);
        }
        if (element ==34) {
            $("#btnAs34").css({ 'backgroundColor': 'red' });
            $("#btnAs34").prop('disabled', true);
        }
        if (element ==35) {
            $("#btnAs35").css({ 'backgroundColor': 'red' });
            $("#btnAs35").prop('disabled', true);
        }
        if (element ==36) {
            $("#btnAs36").css({ 'backgroundColor': 'red' });
            $("#btnAs36").prop('disabled', true);
        }
        if (element ==37) {
            $("#btnAs37").css({ 'backgroundColor': 'red' });
            $("#btnAs37").prop('disabled', true);
        }
        if (element ==38) {
            $("#btnAs38").css({ 'backgroundColor': 'red' });
            $("#btnAs38").prop('disabled', true);
        }
        if (element ==39) {
            $("#btnAs39").css({ 'backgroundColor': 'red' });
            $("#btnAs39").prop('disabled', true);
        }
        if (element ==40) {
            $("#btnAs40").css({ 'backgroundColor': 'red' });
            $("#btnAs40").prop('disabled', true);
        }
        if (element ==41) {
            $("#btnAs41").css({ 'backgroundColor': 'red' });
            $("#btnAs41").prop('disabled', true);
        }
        if (element ==42) {
            $("#btnAs42").css({ 'backgroundColor': 'red' });
            $("#btnAs42").prop('disabled', true);
        }
        if (element ==43) {
            $("#btnAs43").css({ 'backgroundColor': 'red' });
            $("#btnAs43").prop('disabled', true);
        }
        if (element ==44) {
            $("#btnAs44").css({ 'backgroundColor': 'red' });
            $("#btnAs44").prop('disabled', true);
        }
        if (element ==45) {
            $("#btnAs45").css({ 'backgroundColor': 'red' });
            $("#btnAs45").prop('disabled', true);
        }
        if (element ==46) {
            $("#btnAs46").css({ 'backgroundColor': 'red' });
            $("#btnAs46").prop('disabled', true);
        }
        if (element ==47) {
            $("#btnAs47").css({ 'backgroundColor': 'red' });
            $("#btnAs47").prop('disabled', true);
        }
        if (element ==48) {
            $("#btnAs48").css({ 'backgroundColor': 'red' });
            $("#btnAs48").prop('disabled', true);
        }
});
    
        });
    </script>
</body>
</html>

