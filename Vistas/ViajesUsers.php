<!DOCTYPE html>
<html>
<head>
    <title>Viajes</title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../Vistas/CSS/animate.min.css">
    <link rel="stylesheet" href="../vistas/CSS/apartaTuLugar.css" />
    <link rel="stylesheet" type="text/css" href="../Vistas/CSS/estilosPrincipal.css">
<link href="../Vistas/JS/bootstrap.min.js" rel="stylesheet" type="text/js" />

            <?php 
                include "../Datos/DatosViajes.php";
                require_once "../Pojos/PojoViaje.php";      
            ?>
</head>
<body>
     <div class="container-fluid">
        <div class="row">
            <div class="col-12"> 
            <fieldset style="border-style: solid; border: solid;" class="col-12">
              
               <legend>Buscar Viajes</legend>
                     <div class="row"><p class="col-8">Buscar: <input type="text" name="Busqueda:" class=" form-control" id="buscar" placeholder="Ingresa Busqueda"></p>

                    <p class="col-1 offset-0"> <input type="radio" name="checkbox" id="checkbox_1" value="value">
                   <label for="checkbox_1">Destino</label></p>
                   <p class="col-1 offset-0"> <input type="radio" name="checkbox" id="checkbox_2" value="value">
                   <label for="checkbox_2" class="Success Checkbox">Mes</label></p>
                   <p class="col-1 offset-0"> <input type="radio" name="checkbox" id="checkbox_3" value="value">
                   <label for="checkbox_3">Año</label></p></div>
                   

              </fieldset>  
              
            </div>
        </div>
        <div class="row col-12">
            <?php 
                $objviajes= new DatosViajes();

                $lista= $objviajes->obtenerviajes();
                foreach ($lista as $list ) {
                    
                   echo "<div class='promo' style='float:left;overflow:hid
                   den;margin-left:25px;margin-top:15px;'>";
                    echo "<div class='imge'><img src='$list->img' style='width:400px;height:200px;'></div> ";
                    echo "<h3>$list->destino</h3>";
                    echo "<div class='txt'><p class='text-justifype pe'>BALNEARIO LA GRUTA👙 Y A DISFRUTAR DE UNA TARDE EN SAN MIGUEL DE ALLENDE🏦 DOMINGO 12 DE MAYO 2019 Vamos a disfrutar de las aguas termales del balneario la gruta en San Miguel de Allende y como el lugar lo cierran temprano nos vamos a disfrutar de una tarde-noche en San Miguel de Allende..te late ?? !!</p></div>";
                    echo "<div class='pi' style='overflow: hidden'><h4 style='float: left'>$ $list->costoad Adultos</h4><Button class='btn btn-success IdViaje' style='float: right'><i class='fas fa-bus'></i>Reservar</Button></div>";
                    echo "</div>";
                }
               
             ?>
        </div>
      </div>
    <script >
      $("buscar").typea
    </script>
</body>
</html>