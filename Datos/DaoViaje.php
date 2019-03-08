<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../Pojos/PojoViaje.php';
require_once '../Pojos/PojoAutobus.php';

class DaoViaje
{
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
	public function registrarViaje(PojoViaje $obj)
	{
        var_dump($obj);
		$clave=0;
		try 
		{
			$sql = "INSERT INTO viajes (idAutobus, img, destino, hora_salida, costo_adulto, costo_niño, costo_ad, descripcion, dia, mes, año, nota, itinerario) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$this->conectar();
			$this->conexion->prepare($sql)
			->execute(
				array(
					$obj->idAutobus,
					$obj->img,
					$obj->destino,
					$obj->hora,
                    $obj->costo,
                    $obj->costoNinio,
                    $obj->costoAd,
                    $obj->descripcion,
                    $obj->dia,
                    $obj->mes,
                    $obj->año,
                    $obj->nota,
                    $obj->itinerario
				)
			);
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
    public function eliminar($id)
    {
        try 
        {
            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM viajes WHERE idViaje = ?");                     
            
            $sentenciaSQL->execute([$id]);
            return true;
        } catch (Exception $e) 
        {
            return false;
        }finally{
            Conexion::cerrarConexion();
        }
        
    }
    public function getDatosViaje()
    {
    	try
    	{
    		$this->conectar();

    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT destino, hora_salida, dia, mes, año as ano, costo_adulto, descripcion FROM viajes"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoViaje();
    			$obj->destino = $fila->destino;
    			$obj->hora = $fila->hora_salida;
    			$obj->dia = $fila->dia;
    			$obj->mes = $fila->mes;
    			$obj->año = $fila->ano;
                $obj->costo = $fila->costo_adulto;
                $obj->descripcion = $fila->descripcion;

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
    public function obtenerAutobus($id)
    {
        try
        {
            $this->conectar();

            $lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

            $sentenciaSQL = $this->conexion->prepare("SELECT idAutobus FROM autobus"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

            $sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

            /*Se recorre el cursor para obtener los datos*/
            foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
            {
                $obj = new PojoAutobus();
                $obj->idAutobus = $fila->idAutobus;

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