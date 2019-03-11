<!doctype html>
<html lang="en">
<head>
    <?php 
    $idvi=$_POST['id'];
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
<body id="hola">
    <?php
    $objDaoAparta = new DaoApartaTuLugar();
    $objDaoPromociones = new DaoPromociones();
    if ($objDaoAparta->ViajeOferta($idvi) == 1 ) {
        echo "<script>alert('Este Viaje tiene Descuento');</script>";
        $lista = $objDaoAparta->getDatosOferta($idvi);
    }else{
        $lista = $objDaoAparta->getDatosViaje($idvi);
    }
    

    ?>
    <div id="tarjetaLugarViaje" style="position: absolute; margin-left: 50%">
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
        <form action="?add" method="POST">
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
                        <button type="submit" Class="btn btn-outline-dark" id="BtnEnviar">Confirmar Lugares </button>
                    </div>
                </div>
            </div>
        </form>
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
    <?php
    $idAutobus = $objDaoAparta->getTipoAutobus($idvi);
    echo "<script>
    var a = ".$idAutobus.";
    </script>";
    ?>

    <?php 
    try {
        $pojo = new PojoApartaTuLugar();
        if (isset($_GET['add'])) {
            if (isset($_POST)) {
                $pojo-> totalPagar= $_COOKIE["Total"];
                $pojo-> idAutobus= $objDaoAparta->getTipoAutobus($_COOKIE["idViaje"]);
                $_SESSION['Nombre']="bmxpc7";
                $pojo-> idUsuario= $objDaoAparta->getIdUsuario($_SESSION['Nombre']);
                $pojo-> idViaje= $_COOKIE["idViaje"];
                $arregloAsientos = array();
                $arregloFinal = array();
                $valores = $_COOKIE["Asientos"];
                $arr1 = str_split($valores);
                $contador = 0;
                $arregloAsientos = preg_split("[,]", $valores);
                $remp = array("Asiento","[","]","{","}",":",'"');
                $arregloFinal = str_replace($remp, "", $arregloAsientos);
                foreach ($arregloFinal as $asiento)
                {
                    $pojo-> n_Asiento = $asiento;
                    $objDaoAparta->registrarAsientos($pojo);
                }
                $objDaoAparta->registrarReservacion($pojo);
                $pojo-> idReservacion=$objDaoAparta->getIdReservacion();
                $objDaoAparta->registrarReservacionUsuario($pojo);
                echo "<script>location.href='ViajesUsers.php'</script>";
            }
        }
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }finally{
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/bootbox.min.js"></script>
    <script src="JS/internos/apartaTuLugar.js"></script>
    <script src="JS/internos/Autobus.js"></script>
    <script src="JS/internos/envio.js"></script>
</body>
</html>