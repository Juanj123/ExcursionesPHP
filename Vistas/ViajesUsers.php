
<?php include 'headerUser.php';  ?>
    <link rel="stylesheet" href="../Vistas/CSS/animate.min.css">
    <link rel="stylesheet" href="../vistas/CSS/apartaTuLugar.css" />
    <link rel="stylesheet" type="text/css" href="CSS/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="CSS/estilosPrincipal.css">
<body>
               <?php 
                include "../Datos/DatosViajes.php";
                require_once "../Pojos/PojoViaje.php";      
            ?>
     <div class="container-fluid">
      <br>
        <div class="row">
           <div class="col-8">
            <input type="text" name="buscar" class="form-control" id="buscar" placeholder="Ingresa Busqueda">
           </div>
           <div class="col-4">
             <input class="offset-1" type="radio" name="checkbox" id="checkbox_1" value="value">
             <label for="checkbox_1">Destino</label>
             <input class="offset-1" type="radio" name="checkbox" id="checkbox_2" value="value">
             <label for="checkbox_2" class="Success Checkbox">Mes</label>
             <input class="offset-1" type="radio" name="checkbox" id="checkbox_3" value="value">
             <label for="checkbox_3">Año</label>
           </div>
        </div>
        <div class="row ">
          <form method="post" action="apartaTuLugar.php">
            <?php 
                $objviajes= new DatosViajes();

                $lista= $objviajes->obtenerviajes();
                foreach ($lista as $list ) {
                    
                   echo "<div class='promo' style='float:left;overflow:hid
                   den;margin-left:25px;margin-top:15px;'>";
                    echo "<div class='imge'><img src='$list->img' style='width:400px;height:200px;'></div> ";
                    echo "<h3>$list->destino</h3>";
                    echo "<div class='txt'><p class='text-justifype pe'>BALNEARIO LA GRUTA👙 Y A DISFRUTAR DE UNA TARDE EN SAN MIGUEL DE ALLENDE🏦 DOMINGO 12 DE MAYO 2019 Vamos a disfrutar de las aguas termales del balneario la gruta en San Miguel de Allende y como el lugar lo cierran temprano nos vamos a disfrutar de una tarde-noche en San Miguel de Allende..te late ?? !!</p></div>";
                    echo "<div class='pi' style='overflow: hidden'><h4 style='float: left'>$ $list->costoad Adultos</h4><Button class='btn btn-success IdViaje' name='id' value='$list->idViaje' type='submit' style='float: right'><i class='fas fa-bus'></i>Reservar</Button></div>";
                    echo "</div>";
                }
               
             ?>
             </form>
        </div>
      </div>
      
      <script type="text/javascript" src="JS/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="JS/popper.min.js"></script>
      <script type="text/javascript" src="JS/bootstrap.js"></script>
      <script type="text/javascript" src="JS/alertify.js"></script>
      
      <script>
        $(document).ready(function(){
             //alertify.alert('Hola', 'Hola Mundo');
             var items=[
                "elemento 1",
                "elemento 2"
             ];

             $("#buscar").autocomplete({
                source: items
             });
        });
      </script>
</body>

<?php include 'footerUser.html';  ?>
