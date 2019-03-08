<?php 
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../Pojos/PojoViaje.php';
 class DaoPromociones{
 	private $conexion; /*Crea una variable conexion*/
	private function conectar()
	{
		try{
			$this->conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando el metodo abrirConexion(); de la clase Conexion por medio de una instancia*/
		}
		catch(Exception $e)
		{
			die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
		}
	}

	public function obtenerPromociones(){
		try
    	{
    		$this->conectar();

    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT A.destino, N.costo_adulto, N.costo_niño, N.costo_ad FROM viajes A INNER JOIN ofertas N ON A.idViaje = N.idViaje;"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoViaje();
    			$obj->destino = $fila->destino;
    			$obj->costo = $fila->costo_ad;
    			$obj->CostoNino = $fila->costo_niño;
    			$obj->costoad = $fila->costo_adulto;

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

    public function obtenerDestinos(){
        try
        {
            $this->conectar();

            $lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

            $sentenciaSQL = $this->conexion->prepare("SELECT destino FROM viajes"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

            $sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

            /*Se recorre el cursor para obtener los datos*/
            foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
            {
                $obj = new PojoViaje();
                $obj->destino = $fila->destino;

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

 }
 ?>