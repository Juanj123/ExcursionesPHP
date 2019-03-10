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
	  		$_SESSION['login'] = $usuarioss;

	  		if($usuarioss->contraseña == null and $usuarioss->passadmin != null){
                 header('Location: ../vistas/index_Aministrator.php');
	  		}
	  		else{
	  			if($usuarioss->contraseña != null and $usuarioss->passadmin == null){
	  				echo "<script>alert('entre')</script>";
                    header('Location: ../vistas/index_User.php');
	  			}
	  		}
	  }else{
	  	echo "<script>alert('Usuario o contraseña incorrectos')</script>";
	  	header('Location: ../vistas/login.php');
	  }
	 
	}
	//echo "hola";
	//$objDatoViajes = new DatosLogin();

	//$resultado = $objDatoViajes->validarLogin($username,$pass);


     //var_dump($resultado);

	/*if($resultado==false){
            echo "<script>alert('Bienvenido administrador')</script>";
			echo "<script>location.href='../vistas/index_Aministrator.php'</script>";
	}
	else{
		echo "<script>alert('contraseña incorrecta')</script>";
	}
/*

	/*if($f2=mysql_fetch_array($sql2)){
		if($pass=$f2['passadmin']){
			echo "<script>alert('Bienvenido administrador')</script>";
			echo "<script>window.location.href='index_Aministrador.php'</script>";
		}
	}

	$sql= mysql_query("SELECT * from usuarios where correo='$username' or Usuario='$username'", $conexionn);
	
	if($f2=mysql_fetch_array($sql)){
		if($pass=$f2['contraseña']){
			
			echo "<script>window.location.href='index_User.php'</script>";
		}
		else{
			echo "<script>alert('contraseña incorrecta')</script>";
		}
	}
	*/
?>