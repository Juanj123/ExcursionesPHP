<?php 
require_once '../Datos/Conexion.php';
require_once '../Pojos/PojoRegistros.php';
require_once '../Vistas/login.php';
 /*importa el modelo */
   $nombre= $_POST["nombre"];
   $apellido= $_POST['apellido'];
   $correo= $_POST['correo'];
   $direccion = $_POST['direccion'];
   $telefono= $_POST['telefono'];
   $edad= $_POST['edad'];
   

   $obj= new PojoRegistros();
   $obj->nombres= $nombre;
   $obj->apellidos= $apellido;
   $obj->correo= $correo;
   $obj->direccion = $direccion;
   $obj->telefono = $telefono;
   $obj->edad = $edad;
   
   $objDaoAparta=new DatosRegistroClientes();
   $objDaoAparta->modificar($obj);

   //header("Location: ../vistas/login.php");
   echo "<script>location.href= '../vistas/login.php'</script>";
?>