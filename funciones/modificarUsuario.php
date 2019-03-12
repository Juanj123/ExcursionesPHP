<?php 
require_once '../Datos/Conexion.php';
require_once '../Pojos/PojoRegistros.php';
require_once '../Vistas/login.php';
require_once '../Datos/DatosLogin.php';

 /*importa el modelo */
  
   $objlogin=new DatosLogin();
   $nombre= $_POST['nombre'];
   $apellido= $_POST['apellido'];
   $correo= $_POST['correo'];
   $direccion = $_POST['direccion'];
   $telefono= $_POST['telefono'];
   $edad= $_POST['edad'];
   $id= $_POST['btn'];
   echo "<script>alert('$id')</script>";
   
   $obj= new PojoRegistros();
   $obj->id= $id;
   $obj->nombres= $nombre;
   $obj->apellidos= $apellido;
   $obj->telefono = $telefono;
   $obj->edad = $edad;
   $obj->correo= $correo;
   $obj->direccion = $direccion;
   $objlogin->modificar($obj);

   //header("Location: ../vistas/login.php");
   echo "<script>location.href= '../vistas/Perfil_usuario.php'</script>";
?>