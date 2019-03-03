<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../Pojos/PojoApartaTuLugar.php'; /*importa el modelo */

class DaoApartaTuLugar
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
	public function registrarAsientos(PojoApartaTuLugar $obj)
	{

		$clave=0;
		try 
		{
			$sql = "INSERT INTO asientosselect (idUsuario, idAutobus, idViaje,n_asientos) values(?, ?, ?, ?)";

			$this->conectar();
			$this->conexion->prepare($sql)
			->execute(
				array(
					$obj->idUsuario,
					$obj->idAutobus,
					$obj->idViaje,
					$obj->n_asientos
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
    public function registrarReservacion(PojoApartaTuLugar $obj)
    {

    	$clave=0;
    	try 
    	{
    		$sql = "INSERT INTO reservacion (idAutobus, idViaje, totalAPagar) values(?, ?, ?)";

    		$this->conectar();
    		$this->conexion->prepare($sql)
    		->execute(
    			array(
    				$obj->idAutobus,
    				$obj->idViaje,
    				$obj->totalAPagar
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
    public function registrarReservacionUsuario(PojoApartaTuLugar $obj)
    {

    	$clave=0;
    	try {
    		$sql = "INSERT INTO reservacionusuario values(?, ?)";

    		$this->conectar();
    		$this->conexion->prepare($sql)
    		->execute(
    			array(
    				$obj->idUsuario,
    				$obj->idReservacion
    			)
    		);
    		$clave=$this->conexion->lastInsertId();
    		return $clave;
    	} catch (Exception $e) 
    	{
    		return $clave;
    	}finally
    	{

            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
    }
    public function getAsientosOcupados($id)
    {
    	try
    	{ 
    		$this->conectar();

    		$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT distinct s.n_asientos as Seleccionados FROM asientosselect s join viajes v WHERE (s.idViaje = v.idViaje and s.idViaje = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
    		$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Obtiene los datos*/
    		$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);

    		$registro = new asientos();
    		$registro->n_Asiento = $fila->Seleccionados;

    		return $registro;
    	}
    	catch(Exception $e){
    		echo $e->getMessage();
    		return null;
    	}finally{
    		Conexion::cerrarConexion();
    	}
    }
    public function getNomApe($id)
    {
    	try
    	{
    		$this->conectar();

    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT nombres,apellidos  FROM usuarios where idUsuario = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoUsuarios();
    			$obj->Nombres = $fila->Nombres;
    			$obj->Apellidos = $fila->Apellidos;

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
    public function getDatosViajeUsuario($id)
    {
    	try
    	{
    		$this->conectar();

    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT destino, hora_regreso, hora_salida, dia, mes, año as ano FROM viajes where idViaje = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoViajes();
    			$obj->Destino = $fila->destino;
    			$obj->Horaregreso = $fila->hora_regreso;
    			$obj->Horasalida = $fila->hora_salida;
    			$obj->Dia = $fila->dia;
    			$obj->Mes = $fila->mes;
    			$obj->Año = $fila->ano;

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
    public function getDatosViaje($id)
    {
    	try
    	{
    		$this->conectar();

    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT img, destino, costo_adulto, costo_niño as costoNino FROM viajes where idViaje = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoApartaTuLugar();
    			$obj->Img = $fila->img;
    			$obj->Destino = $fila->destino;
    			$obj->Costo_adulto = $fila->costo_adulto;
    			$obj->CostoNino = $fila->costoNino;

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
    public function getAsientosUsuario($id)
    {
    	try
    	{
    		$this->conectar();

    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT n_asientos FROM asientosselect where idUsuario = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoAutobus();
    			$obj->NAsientos = $fila->n_asientos;

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
    public function getTotalReservacion($id)
    {
    	try
    	{
    		$this->conectar();

    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT idReservacion, totalAPagar FROM reservacion where idReservacion = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoApartaTuLugar();
    			$obj->IdReservacion = $fila->idReservacion;
    			$obj->TotalPagar = $fila->idReservacion;

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
    public function getTipoAutobus($id)
    {
    	$idAutobus;
    	try
    	{
    		$this->conectar();

    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT idAutobus FROM autoviaje where idViaje = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoAutobus();
    			$idAutobus = $obj->IdAutobus = $fila->idAutobus;
    		}

    		return $idAutobus;
    	}
    	catch(Exception $e){
    		echo $e->getMessage();
    		return null;
    	} finally {
    		Conexion::cerrarConexion();
    	}
    }
    public function getIdReservacion(PojoApartaTuLugar $obj)
    {
    	$idReservacion;
    	try
    	{
    		$this->conectar();

    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT max(idReservacion) as idReservacion FROM reservacion"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoAutobus();
    			$idReservacion = $obj->IdReservacion = $fila->idReservacion;
    		}

    		return $idReservacion;
    	}
    	catch(Exception $e){
    		echo $e->getMessage();
    		return null;
    	} finally {
    		Conexion::cerrarConexion();
    	}
    }
    public function getIdUsuario($usuario)
    {
    	$concept;
    	try
    	{
    		$this->conectar();

    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT idUsuario FROM usuarios where Usuario = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoAutobus();
    			$concept = $obj->Id = $fila->idUsuario;
    		}
    		return $concept;
    	}
    	catch(Exception $e)
    	{
    		echo $e->getMessage();
    		return null;
    	}
    	finally 
    	{
    		Conexion::cerrarConexion();
    	}
    }
}