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
                     <div class="row"><p class="col-8">: <input type="text" name="Ingresa Busqueda:" class="col-9 form-control"></p>

                    <p class="col-1"> <input type="checkbox" name="checkbox" id="checkbox_id" value="value">
                   <label for="checkbox_id">Destino</label></p>
                   <p class="col-1"> <input type="checkbox" name="checkbox" id="checkbox_id" value="value">
                   <label for="checkbox_id">Mes</label></p>
                   <p class="col-1"> <input type="checkbox" name="checkbox" id="checkbox_id" value="value">
                   <label for="checkbox_id">Año</label></p></div>
                   

              </fieldset>  
            </div>
        </div>
        <div class="row">
            <?php 
                $objviajes= new DatosViajes();

                $lista= $objviajes->obtenerviajes();

                
                foreach ($lista as $list ) {
                     echo "entre";
                   echo "<div class=promo style=float:left overflow:hidden margin-left:25px margin-top:15px>";
                    echo "<div class=imge><img  style=width:400px height:200px></div> ";
                    echo "<h3>$list->destino</h3>";
                    echo "<div class=txt><p class=text-justify pe>BALNEARIO LA GRUTA👙 Y A DISFRUTAR DE UNA TARDE EN SAN MIGUEL DE ALLENDE🏦 DOMINGO 12 DE MAYO 2019 Vamos a disfrutar de las aguas termales del balneario la gruta en San Miguel de Allende y como el lugar lo cierran temprano nos vamos a disfrutar de una tarde-noche en San Miguel de Allende..te late ?? !!</p> </div>";
                    echo "<div class=pi style=overflow:hidden><h4 style=float:left></h4><Button class=btn btn-success btnIdViaje style=float:right><i class=fas fa-bus></i>Reservar</Button></div>";
                    echo "</div>";
                    echo "sali";
                }
               
             ?>
        </div>
      </div>
    
</body>
</html>