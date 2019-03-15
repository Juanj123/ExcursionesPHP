<?php 
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../Pojos/PojoAutobus.php';

/**
 * 
 */
class DaoAutobus
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

 public function registrarAutobus(PojoAutobus $obj)
 {
  //var_dump($obj);
  $clave=0;
  try 
  {
   $sql = "INSERT INTO autobus (idAutobus, nombre, img, n_Asientos) values(?, ?, ?, ?)";

   $this->conectar();
   $this->conexion->prepare($sql)
   ->execute(
    array(
     $obj->idAutobus,
     $obj->nombre,
     $obj->img,
     $obj->nAsientos
     
     
   )
  );
   $clave=$this->conexion->lastInsertId();
   return $clave;
 } catch (Exception $e) 
 {
   return $clave;
 }finally{
    Conexion::cerrarConexion();
    }
}


	//Funcion para obtener datos de principalVideo retornando una liste
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT idAutobus, nombre, n_Asientos FROM autobus"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new PojoAutobus();
	            $obj->idAutobus = $fila->idAutobus;
	            $obj->nombre = $fila->nombre;
	            $obj->nAsientos = $fila->n_Asientos;

                
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





public function getDatosAutobus()
{
    try
    {
    	$this->conectar();

    	$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    	$sentenciaSQL = $this->conexion->prepare("SELECT idAutobus, nombre, n_Asientos FROM autobus"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    	$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    	/*Se recorre el cursor para obtener los datos*/
    	foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    	{

    		$obj = new PojoAutobus();
          	$obj->idAutobus = $fila->idAutobus;
          	$obj->nombre = $fila->nombre;
          	$obj->nAsientos = $fila->n_Asientos;


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
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM autobus WHERE idAutobus = ?");                     
            
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