<?php 
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../Pojos/PojoApartaTuLugar.php'; /*importa el modelo */
require_once '../Pojos/PojoUsuarios.php';
require_once '../Pojos/PojoViaje.php';
require_once '../Pojos/PojoAutobus.php';
 class DatosViajes{
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

	public function obtenerviajes(){
		try
    	{
    		$this->conectar();

    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT * FROM viajes "); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoViaje();
    			$obj->idViaje = $fila->idViaje;
    			$obj->dia = $fila->dia;
    			$obj->mes= $fila->mes;
    			$obj->año = $fila->año;
    			$obj->destino = $fila->destino;
    			$obj->hora = $fila->hora_salida;
    			$obj->descripcion = $fila->descripcion;
    			$obj->nota= $fila->nota;
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
 }
 ?>