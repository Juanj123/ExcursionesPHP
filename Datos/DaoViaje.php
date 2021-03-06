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
   $sql = "INSERT INTO viajes (img, destino, hora_salida, costo_adulto, costo_niño, costo_ad, descripcion, dia, mes, año, nota, itinerario) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

   $this->conectar();
   $this->conexion->prepare($sql)
   ->execute(
    array(
     $obj->img,
     $obj->destino,
     $obj->hora,
     $obj->costo,
     $obj->costoNinio,
     $obj->costoAd,
     $obj->descripcion,
     $obj->dia,
     $obj->mes,
     $obj->anio,
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
        public function eliminarViaje($id)
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

        public function getIdViaje($id)
        {
         $idViaje = 0;
         try
         {
          $this->conectar();

          $lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

          $sentenciaSQL = $this->conexion->prepare("SELECT idViaje FROM viajes where destino like ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

          $sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

          /*Se recorre el cursor para obtener los datos*/
          foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
          {
           $obj = new PojoAutobus();
           $idViaje = $fila->idViaje;
         }

         return $idViaje;
       }
       catch(Exception $e){
        echo $e->getMessage();
        return null;
      } finally {
        Conexion::cerrarConexion();
      }
    }
    
    public function getDatosViajeOri()
    {
    	try
    	{
    		$this->conectar();

    		$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    		$sentenciaSQL = $this->conexion->prepare("SELECT img, destino, hora_salida, costo_adulto, costo_niño as costo_ninio, costo_ad, descripcion, dia, mes, año as ano, nota, itinerario, idViaje FROM viajes"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    		$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    		/*Se recorre el cursor para obtener los datos*/
    		foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    		{
    			$obj = new PojoViaje();
          $obj->img = $fila->img;
          $obj->destino = $fila->destino;
          $obj->hora = $fila->hora_salida;
          $obj->costo = $fila->costo_adulto;
          $obj->costoNinio = $fila->costo_ninio;
          $obj->costoAd = $fila->costo_ad;
          $obj->descripcion = $fila->descripcion;
          $obj->dia = $fila->dia;
          $obj->mes = $fila->mes;
          $obj->anio = $fila->ano;
          $obj->nota = $fila->nota;
          $obj->itinerario = $fila->itinerario;
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
    public function editarViaje(PojoViaje $obj)
    {
      $sql = "UPDATE viajes SET 
      img= ?,
      destino= ?,
      hora_salida= ?,
      costo_adulto= ?,
      costo_niño= ?,
      costo_ad= ?,
      descripcion= ?,
      dia= ?,
      mes= ?,
      año= ?,
      nota= ?,
      itinerario= ? 
      WHERE idViaje = ?";

      $this->conectar();

      $sentenciaSQL = $this->conexion->prepare($sql); 

      $sentenciaSQL->execute(
        array(
          $obj->img,
          $obj->destino,
          $obj->hora,
          $obj->costo,
          $obj->costoNinio,
          $obj->costoAd,
          $obj->descripcion,
          $obj->dia,
          $obj->mes,
          $obj->anio,
          $obj->nota,
          $obj->itinerario,
          $obj->idViaje
        ));
      return true;
      Conexion::cerrarConexion();
    }

    public function obtenerDestinos()
    {
      try
      {
        $this->conectar();

        $lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

        $sentenciaSQL = $this->conexion->prepare("SELECT destino FROM viajes"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

        $sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

        /*Se recorre el cursor para obtener los datos*/
        foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
        {
          $obj = new PojoAutobus();
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

    public function registrarPromocion(PojoViaje $obj)
    {
      var_dump($obj);
      $clave=0;
      try 
      {
       $sql = "INSERT INTO `ofertas`(`idViaje`, `costo_adulto`, `costo_niño`, `costo_ad`) VALUES(?,?,?,?)";

       $this->conectar();
       $this->conexion->prepare($sql)
       ->execute(
        array(
          $obj->idViaje,
          $obj->costo,
          $obj->costoNinio,
          $obj->costoAd
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

      }
