<?php
require_once '../Datos/Conexion.php'; /*importa Conexion.php*/
require_once '../Pojos/PojoVideo.php'; /*importa el modelo */
class DaoVideo
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

    	//Agrega un nuevo video de acuerdo al objeto recibido como parámetro
	public function agregar(PojoVideo $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO principalVideo (idVideo, idUsuario, nombre, estado, url) values(?, ?, ?, ?, ?)";
            
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array(
                		$obj->idVideo,
                		$obj->idUsuario,
                		$obj->nombre,
                		$obj->estado,
                		$obj->url));
            $clave=$this->conexion->lastInsertId();
            return $clave;
		} catch (Exception $e) 
		{
			return $clave;
		}finally{
            
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
	}

		//Función para editar al principalVideo de acuerdo al objeto recibido como parámetro
	public function editar(PojoVideo $obj)
	{
		
		//try 
		//{
			$sql = "UPDATE principalVideo SET 
					
                    idUsuario = ?,
                    nombre = ?,
                    estado = ?,
                    url = ?
                    WHERE idVideo = ? ";

            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare($sql);	

			$sentenciaSQL->execute(
				array(    
					//$obj->idVideo,
					    $obj->idUsuario,
						$obj->nombre,
						$obj->estado,
						$obj->url,
				        $obj->idVideo));
			//var_dump($sentenciaSQL);
            return true;
		//} catch (Exception $e){
			//echo $e->getMessage();
			//return false;
		//}finally{
           // Conexion::cerrarConexion();
        //}
	}

	    //Elimina el principalVideo con el id indicado como parámetro
	public function eliminar($id)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM principalVideo WHERE id = ?");			          
            
			$sentenciaSQL->execute(array($id));
            return true;
		} catch (Exception $e) 
		{
            return false;
		}finally{
            Conexion::cerrarConexion();
        }
        
	}

	//Funcion para obtener datos de principalVideo retornando una liste
	public function obtenerTodos()
	{
		/*
		try
		{
			*/
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT nombre, estado, url FROM principalVideo where estado = 'Activo'"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new PojoVideo();
	            $obj->nombre = $fila->nombre;
	            $obj->estado = $fila->estado;
	            $obj->url = $fila->url;

                
				$lista[] = $obj;

				
			}
            
			return $lista;
			/*
		}
		catch(Exception $e){
			echo $e->getMessage();
			return null;
		} finally {
			*/
            Conexion::cerrarConexion();
            /*
        }
        */
	}

	    /*Metodo que obtiene un registro de la base de datos, retorna un objeto */
	public function obtenerUno($id)
	{
		//try
		//{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT idVideo FROM principalVideo WHERE url=?"); /*Se arma la sentencia sql para seleccionar idVideo de los registros de la base de datos*/
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $obj = new PojoVideo();
            $obj->idVideo = $fila->idVideo;
            Conexion::cerrarConexion();
			return $obj;
		//}
		//catch(Exception $e){
            //echo $e->getMessage();
            //return null;
		//}finally{
            
       //}
	}


		    /*Metodo que obtiene un registro de la base de datos, retorna un objeto */
	public function obtenerIdUsuario($id)
	{
		//try
		//{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT idUsuario FROM principalVideo WHERE url=?"); /*Se arma la sentencia sql para seleccionar idVideo de los registros de la base de datos*/
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $obj = new PojoVideo();
            $obj->idUsuario = $fila->idUsuario;
            Conexion::cerrarConexion();
			return $obj;
		//}
		//catch(Exception $e){
           // echo $e->getMessage();
            //return null;
		//}finally{
            
        //}
	}


}



?>