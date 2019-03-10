<!DOCTYPE html>
<html>
<head>
	<title>Recuperar Contraseña</title>
</head>
<body>
	<h2>Recuperar Contraseña</h2>
	
	<div class="container-fluid">
           <div class="row">
             
                   <LABEL class="col-2">Introduce tu correo:</LABEL>
               
               
                   <input type="text" name="" placeholder="Introduce Correo" class="form-control col-10">
              
           </div>
       </div>
</body>
</html>


<?php

// El mensaje
$mensaje = "Esto es una prueba 1\r\nA ver si te llega correctamente 2\r\nUn saludo 3\r\n\n\n\nwww.ejemplocodigo.com";

// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
$mensaje = wordwrap($mensaje, 70, "\r\n");

// Enviamos el email
mail('tu@direcciondeemail.com', 'Probando la funcion MAIL desde PHP', $mensaje);


echo "EMAIL ENVIADO...";

?>