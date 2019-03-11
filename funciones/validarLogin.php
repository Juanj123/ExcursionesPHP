<?php 
	include("../Datos/Conexion.php");
	require_once("../Datos/DatosLogin.php");
	 session_start();

	 $crud = new DatosLogin();

	if(isset($_POST['Entrar'])){
		
      $username= $_POST['nombreusuario'];
	  $pass=$_POST['contrasena'];
	  
	  $usuarioss= $crud->obtenerUsuario($username,$pass);
      
	  if($usuarioss->id != NULL){
	  	   
	  		$_SESSION['login'] = $usuarioss->usuario;
	  		echo $_SESSION['login'];

	  		if($usuarioss->contraseña == null and $usuarioss->passadmin != null){
                 header('Location: ../vistas/index_Aministrator.php');
	  		}
	  		else{
	  			if($usuarioss->contraseña != null and $usuarioss->passadmin == null){
	  				//echo "<script>alert('entre')</script>";
                    header('Location: ../vistas/index_User.php');
	  			}
	  		}
	  }else{
	  	echo "<script>
        $(document).ready(function(){
             alertify.alert('Hola', 'Hola Mundo');
        });
      </script>";
	  	header('Location: ../vistas/login.php');
	  }
	 
	}else
	{
		if(isset($_POST['Registrar'])){
			header("Location: ../vistas/Registro_Clientes.php");
		}
	}
?>