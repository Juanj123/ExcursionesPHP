<?php
//require_once '../../ExcursionesPHP/Datos/DatosRegistroClientes.php'; /*importa Conexion.php*/
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
   $usuario= $_POST['usuarios'];
   $password= $_POST['pw'];

   $obj= new PojoRegistros();
   $obj->nombres= $nombre;
   $obj->apellidos= $apellido;
   $obj->correo= $correo;
   $obj->direccion = $direccion;
   $obj->telefono = $telefono;
   $obj->edad = $edad;
   $obj->usuario = $usuario;
   $obj->pw = $password;
   $obj->tipo = "cliente";
   $objDaoAparta=new DatosRegistroClientes();
   $objDaoAparta->agregar($obj);

   header('Location: ../vistas/login.php');

class DatosRegistroClientes
{

private $conexion; /*Crea una variable conexion*/
        
    private function conectar(){
        try{
			$this->conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando el metodo abrirConexion(); de la clase Conexion por medio de una instancia*/
		}
		catch(Exception $e)
		{
			die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
		}
    }

    	public function agregar(PojoRegistros $obj)
	{
        $clave=0;
		//try 
		//{
        if($obj->pw == null){
            $con2= password_hash($obj->passadmin, PASSWORD_DEFAULT);
            $con1= $obj->pw;
        }
        else{
          if($obj->passadmin == null){
            $con1= password_hash($obj->pw,PASSWORD_DEFAULT);
            $con2= $obj->passadmin;
          }
          
        }
        
        

        echo "<script>alert('$con1')</script>";
            $sql = "INSERT INTO usuarios (nombres,apellidos,telefono,edad,correo,direccion,Usuario, contraseña,tipo, passadmin) values('$obj->nombres', '$obj->apellidos','$obj->telefono', '$obj->edad', '$obj->correo', '$obj->direccion','$obj->usuario', '$con1', '$obj->tipo', '$con2')";
            
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute();
            $clave=$this->conexion->lastInsertId();
            return $clave;
	//} catch (Exception $e) { 
			//return $clave;
	//}finally{
            
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
      }
	