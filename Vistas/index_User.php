<?php include 'headerUser.php'; ?>
    
<body>
	<link rel="stylesheet" type="text/css" href="CSS/estilosPrincipal.css">


	<?php  
		require_once '../Datos/DaoVideo.php';
		require_once '../Pojos/PojoVideo.php'; 
        $daovideo = new DaoVideo();
        
		$videos = $daovideo-> obtenerTodos();

		foreach ($videos as $clave) {

				echo "<iframe width='100%' height='500' src='".$clave->{'url'}."' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
		}

	?>
    <hr>
    <div class="container col-md-12 col-lg-12 col-sm-12 col-xl-12" style="overflow: hidden; background-color: white; border-radius: 15px; box-shadow: 1px 1px 2px 1px #818181;" id="conte1">
                   <div class="col-4">
                        <h5>Fotos</h5>
                     
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="float:left; border-radius: 15px; width: 100%; height: 100%;">
                        <div class="carousel-inner">
                            <?php 
                                require_once '../Datos/DaoPrincipalGaleria.php';

                                $datoscarrusel= new DaoPrincipalGaleria();

                                $imagenes= $datoscarrusel->obtenerimagenes();
                                $i = 0;
                                foreach ($imagenes as $key) {
                                     if ($i == 0){
                                        echo "<div class='carousel-item active'>";
                            echo "<img src='".$key->{'img'}."' alt='Third slide' style='width: 100%; height: 100%;' />";
                            echo "</div>";
                        }else
                        {
                            echo "<div class='carousel-item'>";
                            echo "<img src='".$key->{'img'}."' alt='Third slide' style='width: 100%; height: 100%;' />";
                            echo "</div>";
                        }
                          $i++;
                            
                        
                    }
                                

                            ?>
                            
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    
                    
                        </div>
                     
                    <div class="col-8"  id="texto" style=" overflow: hidden; float:left; border-radius: 20px;">
                    
                        <p class="text-justify e">
                            viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro. Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca. Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no te cabe
                        </p>
                    </div>

                    
 </div>
 <hr>
 <h1 class="text-center">Promociones</h1>

<div class="container col-md-12 col-lg-12 col-sm-12 col-xl-12" style="overflow:hidden;">
      <?php 
      require_once '../Datos/DaoPromociones.php';
      require_once '../Pojos/PojoViaje.php';              

                $objviajes= new DaoPromociones();

                $lista= $objviajes->obtenerpromociones();
                foreach ($lista as $list ) {
                    
                   echo "<div class='promo' style='float:left;overflow:hid
                   den;margin-left:25px;margin-top:15px;'>";
                    echo "<div class='imge'><img src='$list->img' style='width:400px;height:200px;'></div> ";
                    echo "<h3>$list->destino</h3>";
                    echo "<div class='txt'><p class='text-justifype pe'>hola</p></div>";
                    echo "<div class='pi' style='overflow: hidden'><h4 style='float: left'>$ $list->costoad Adultos</h4><Button class='btn btn-success IdViaje' name='id' value='$list->idViaje' type='submit' style='float: right'><i class='fas fa-bus'></i>Reservar</Button></div>";
                    echo "</div>";
                }
               
             ?>
           
        </div>


</body>
<?php include'footerUser.html'; ?>