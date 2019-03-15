<?php include 'headerUser.php'; ?>
    
<body>
	<link rel="stylesheet" type="text/css" href="CSS/estilosPrincipal.css">
<div class="container col-md-12 col-lg-12 col-sm-12 col-xl-12" style="overflow: hidden; background-color: white; border-radius: 15px; box-shadow: 1px 1px 2px 1px #818181;" id="conte1">

	<?php  
		require_once '../Datos/DaoVideo.php';
		require_once '../Pojos/PojoVideo.php'; 
        $daovideo = new DaoVideo();
        
		$videos = $daovideo-> obtenerTodos();

		foreach ($videos as $clave) {

				echo "<iframe width='100%' height='500' src='".$clave->{'url'}."' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
		}



	?>
            
                   


                   <div class="col-4">
                        <h5>Fotos</h5>
                     
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="float:left; border-radius: 15px; width: 100%; height: 100%;">
                        <div class="carousel-inner">
                            <asp:Literal runat="server" ID="ltImg" Text=""></asp:Literal>
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
                        <asp:Literal runat="server" ID="ltParrafo" Text=""></asp:Literal>
                       <%-- <p class="text-justify e">
                            viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro. Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca. Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no te cabe
                        </p>--%>
                    </div>
        
  </div>
</body>
<?php include'footerUser.html'; ?>