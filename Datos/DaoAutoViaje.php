<?php
require_once '../Datos/Conexion.php'; /*importa Conexion.php*/
require_once '../Pojos/PojoAutoViaje.php'; /*importa el modelo */
require_once '../Pojos/PojoViaje.php'; /*importa el modelo */
require_once '../Pojos/PojoAutobus.php'; /*importa el modelo */ 

/**
 * 
 */
class DaoAutoViaje
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
	public function agregar(autoViaje $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO autoViaje (idAutobus, idViaje) values(?, ?)";
            
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array(
                		$obj->idAutobus,
                		$obj->idViaje
                	));
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

		//Funcion para obtener datos de Viajes retornando una liste
	public function obtenerViajes()
	{
		/*
		try
		{
			*/
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT idViaje, destino FROM viajes"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new PojoViaje();
	            $obj->idViaje = $fila->idViaje;
	            $obj->destino = $fila->destino;

                
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

		//Funcion para obtener datos de Autobus retornando una liste
	public function obtenerAutobus()
	{
				/*
		try
		{
			*/
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT idAutobus, nombre FROM autobus"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new PojoAutobus();
	            $obj->idAutobus = $fila->idAutobus;
	            $obj->nombre = $fila->nombre;

                
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

		//Funcion para obtener datos de autoViaje retornando una liste
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT idAutobus, idViaje FROM autoViaje"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new autoViaje();
	            $obj->idAutobus = $fila->idAutobus;
	            $obj->idViaje = $fila->idViaje;

                
				$lista[] = $obj;
			}
            
			return $lista;
		}
		catch(Exception $e){
			echo $e->getMessage();
			return null;
		} finally {
            Conexion::cerrarConexion();
        }
	}

	public function eliminar($id)
        {
        
          try 
          {
          
            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM autoViaje WHERE idAutobus = ?");                     
            
            $sentenciaSQL->execute([$id]);

            return true;
           
          } catch (Exception $e) 
          {
            return false;
          }finally{
          	
            Conexion::cerrarConexion();
           
          }
          

        }
}
 ?>