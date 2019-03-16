<?php 
class daoPDF
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
	public function obtenerFechaViaje($id)
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("select concat(dia,'/', mes,'/', año) as fecha from viajes where idViaje = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new PojoViaje();
	            $obj->fecha = $fila->fecha;
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
	public function getNombre($id)
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT concat(nombres,' ', apellidos) as nombre, correo, direccion from usuarios where idUsuario = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new PojoPDF();
	            $obj->nombre = $fila->nombre;
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

	public function getAsientos($idUsuario, $idViaje)
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT n_asientos from asientosselect where idUsuario = $idUsuario and idViaje = $idViaje"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
		
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new PojoPDF();
	            $obj->n_Asiento = $fila->n_asientos;
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