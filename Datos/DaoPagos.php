<?php 
require_once '../Datos/Conexion.php'; /*importa Conexion.php*/
require_once '../Pojos/PojoPagos.php'; /*importa el modelo */
require_once '../Pojos/PojoUsuarios.php'; /*importa el modelo */
require_once '../Pojos/PojoViaje.php'; /*importa el modelo */
require_once '../Pojos/PojoReservacion.php'; /*importa el modelo */
require_once '../Pojos/PojoPagosMos.php'; /*importa el modelo */
require_once '../Pojos/PojoFactura.php'; /*importa el modelo */





/**
 * 
 */
class DaoPagos
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
	public function agregar(PojoPagos $obj)
	{
		$clave=0;
        /*
		try 
		{
			*/
			$sql = "INSERT INTO pagos (idPagos, idReservacion, idUsuario, monto, fecha_pago, img_ticket, estado) values(?, ?, ?, ?, ?, ?, ?)";
			
			$this->conectar();
			$this->conexion->prepare($sql)
			->execute(
				array(
					$obj->idPagos,
					$obj->idReservacion,
					$obj->idUsuario,
					$obj->monto,
					$obj->fecha_pago,
					$obj->img_ticket,
					$obj->estado
				));
			$clave=$this->conexion->lastInsertId();
			return $clave;
            /*
		} catch (Exception $e) 
		{
			return $clave;
		}finally{
            */
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
            /*
        }
        */
    }

			//Función para editar al pagos de acuerdo al objeto recibido como parámetro
    public function editar(PojoPagos $obj)
    {
    	
		//try 
		//{
    	$sql = "UPDATE pagos SET 
    	
    	idReservacion = ?,
    	idUsuario = ?,
    	monto = ?,
    	fecha_pago = ?,
    	img_ticket = ?,
    	estado = ?,
    	WHERE idPagos = ? ";

    	$this->conectar();
    	
    	$sentenciaSQL = $this->conexion->prepare($sql);	

    	$sentenciaSQL->execute(
    		array(    
					//$obj->idVideo,
    			$obj->idPagos,
    			$obj->idReservacion,
    			$obj->idUsuario,
    			$obj->monto,
    			$obj->fecha_pago,
    			$obj->img_ticket,
    			$obj->estado
    		));
			//var_dump($sentenciaSQL);
    	return true;
		//} catch (Exception $e){
			//echo $e->getMessage();
			//return false;
		//}finally{
           // Conexion::cerrarConexion();
        //}
    }

	//Funcion para obtener datos de principalVideo retornando una liste
    public function obtenerViajes($usuario)
    {
    	try
    	{
    		$this->conectar();
    		
    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT distinct v.idViaje, v.destino from viajes v join reservacion r join reservacionUsuario u where (v.idViaje=r.idViaje) and (u.idUsuario = $usuario)"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
    		
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
    	}
    	catch(Exception $e){
    		echo $e->getMessage();
    		return null;
    	} finally {
    		Conexion::cerrarConexion();
    	}
    }


    /*Metodo que obtiene un registro de la base de datos, retorna un objeto */
    public function obtenerIdReserva($id)
    {
		//try
		//{ 
    	echo "id= ".$id;
    	$this->conectar();
    	
    	$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
    	
    	$sentenciaSQL = $this->conexion->prepare("SELECT idReservacion FROM reservacion WHERE idViaje=?"); /*Se arma la sentencia sql para seleccionar idVideo de los registros de la base de datos*/
    	$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
    	
    	/*Obtiene los datos*/
    	$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
    	
    	$obj = new PojoReservacion();
    	$obj->idReservacion = $fila->idReservacion;
    	Conexion::cerrarConexion();
    	echo "obj= ".$obj->idReservacion;
    	return $obj->idReservacion;
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
    	
    	$sentenciaSQL = $this->conexion->prepare("SELECT idUsuario FROM usuarios WHERE Usuario=?"); /*Se arma la sentencia sql para seleccionar idVideo de los registros de la base de datos*/
    	$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
    	
    	/*Obtiene los datos*/
    	$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
    	
    	$obj = new PojoUsuarios();
    	$obj->idUsuario = $fila->idUsuario;
    	Conexion::cerrarConexion();
    	return $obj;
		//}
		//catch(Exception $e){
            //echo $e->getMessage();
            //return null;
		//}finally{
    	
       //}
    }

    public function obtenerTotal($id)
    {
		//try
		//{ 
    	$this->conectar();
    	
    	$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
    	
    	$sentenciaSQL = $this->conexion->prepare("SELECT totalApagar FROM reservacion WHERE idReservacion=?"); /*Se arma la sentencia sql para seleccionar idVideo de los registros de la base de datos*/
    	$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
    	
    	/*Obtiene los datos*/
    	$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
    	
    	$obj = new PojoReservacion();
    	$obj->totalApagar = $fila->totalApagar;
    	Conexion::cerrarConexion();
    	return $obj->totalApagar;
		//}
		//catch(Exception $e){
            //echo $e->getMessage();
            //return null;
		//}finally{
    	
       //}
    }


    public function obtenerPagos($id)
    {
    	try
    	{
    		$this->conectar();
    		
    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT p.fecha_pago, p.idReservacion FROM pagos p where p.idUsuario=$id ORDER by p.idPagos DESC LIMIT 1"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
    		
    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
    		
    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoPagos();
    			$obj->fecha_pago = $fila->fecha_pago;
    			$obj->idReservacion = $fila->idReservacion;
    			$obj->monto = $fila->monto;

    			
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

		//Funcion para obtener datos de principalVideo retornando una liste
    public function obtenerTodos($id)
    {
    	try
    	{
    		$this->conectar();
    		
    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT distinct p.idPagos, p.idReservacion, p.monto, r.totalApagar, p.fecha_pago,v.destino, p.estado FROM pagos p join viajes v join reservacion r join reservacionUsuario u where 
    			(v.idViaje=r.idViaje) and (u.idUsuario = $id) and (p.idReservacion=r.idReservacion)"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
    		
    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
    		
    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoPagosMos();
    			$obj->idPagos = $fila->idPagos;
    			$obj->idReservacion = $fila->idReservacion;
    			$obj->monto = $fila->monto;
    			$obj->total = $fila->totalApagar;
    			$obj->fecha_pago = $fila->fecha_pago;
    			$obj->destino = $fila->destino;
    			$obj->estado = $fila->estado;

    			
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


    public function obtenerFechaViajes($id)
    {
    	try
    	{
    		$this->conectar();
    		
    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("select v.dia, v.mes, v.año from viajes v where idViaje = $id"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
    		
    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
    		
    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoViaje();
    			$obj->dia = $fila->dia;
    			$obj->mes = $fila->mes;
    			$obj->año = $fila->año;
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


    public function obtenerUsuarios($id)
    {
    	try
    	{
    		$this->conectar();
    		
    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT nombres, apellidos, correo, direccion from usuarios where idUsuario= ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
    		
    		$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
    		
    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoUsuarios();
    			$obj->nombres = $fila->nombres;
    			$obj->apellidos = $fila->apellidos;
    			$obj->correo = $fila->correo;
    			$obj->direccion = $fila->direccion;
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


    public function obtenerFactura($id, $idViaje)
    {
		/*
		try
		{
			*/
			$this->conectar();
			
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT distinct v.destino, r.totalAPagar from viajes v join reservacion r join reservacionusuario u where (u.idUsuario=$id and u.idReservacion=r.idReservacion)
				and (r.idViaje=v.idViaje and r.idViaje=$idViaje)"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
			
			/*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new PojoFactura();
				$obj->destino = $fila->destino;
				$obj->monto = $fila->totalAPagar;
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


    public function obtenerTotalF($id)
    {
    	try
    	{
    		$this->conectar();
    		
    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("select distinct r.totalAPagar, p.monto from reservacion r join pagos p where r.idReservacion=p.idReservacion and p.idUsuario=$id ORDER by p.idPagos DESC LIMIT 1;"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
    		
    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
    		
    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoFactura();
    			$obj->totalAPagar = $fila->totalAPagar;
    			$obj->monto = $fila->monto;
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


    /*Metodo que obtiene un registro de la base de datos, retorna un objeto */
    public function obtenerMonto($id)
    {
		//try
		//{ 
    	echo "id= ".$id;
    	$this->conectar();
    	
    	$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
    	
    	$sentenciaSQL = $this->conexion->prepare("select sum(monto) as monto from pagos where idUsuario=$id"); /*Se arma la sentencia sql para seleccionar idVideo de los registros de la base de datos*/
    	$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
    	
    	/*Obtiene los datos*/
    	$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
    	
    	$obj = new PojoPagos();
    	$obj->monto = $fila->monto;
    	Conexion::cerrarConexion();
    	return $obj->monto;
		//}
		//catch(Exception $e){
            //echo $e->getMessage();
            //return null;
		//}finally{
    	
       //}
    }

}
?>