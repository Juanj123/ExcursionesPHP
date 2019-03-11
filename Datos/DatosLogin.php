<?php 
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../Pojos/PojoApartaTuLugar.php'; /*importa el modelo */
require_once '../Pojos/PojoRegistros.php';
require_once '../Pojos/PojoUsuarios.php';
require_once '../Pojos/PojoViaje.php';
require_once '../Pojos/PojoAutobus.php';

class DatosLogin
   {
    private $conexion; /*Crea una variable conexion*/
    private function conectar()
    {
        //try{
            $this->conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando el metodo abrirConexion(); de la clase Conexion por medio de una instancia*/
        //}
        //catch(Exception $e)
        //{
        //    die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
       // }
    }

    public function obtenerUsuario($nombre, $clave){
            $this->conectar();
            $select=$this->conexion->prepare("SELECT * FROM usuarios WHERE Usuario='$nombre'");//AND clave=:clave
            //$select->bindValue('nombre',$nombre);
            $select->execute();
            $registro=$select->fetch();
            $usuario=new PojoUsuarios();
            var_dump($registro);
            //verifica si la clave es conrrecta
            if($registro['tipo'] != "cliente"){
                if (password_verify($clave, $registro['passadmin'])) {              
                //si es correcta, asigna los valores que trae desde la base de datos
                      $usuario->id = $registro['idUsuario'];
                      $usuario->nombre= $registro['nombres'];
                      $usuario->apellidos= $registro['apellidos'];
                      $usuario->telefono = $registro['telefono'];
                      $usuario->edad = $registro['edad'];
                      $usuario->correo = $registro['correo'];
                      $usuario->direccion = $registro['direccion'];
                      $usuario->usuario = $registro['Usuario'];
                      $usuario->contraseña = $registro['contraseña'];
                      $usuario->tipo = $registro['tipo'];
                      $usuario->passadmin = $registro['passadmin'];
                               
                return $usuario;
                }
                
                 }
                  else{
                    echo "<script>alert('entre')</script>";
                     if(password_verify($clave, $registro['contraseña'])){
                        
                        $usuario->id = $registro['idUsuario'];
                        $usuario->nombre= $registro['nombres'];
                        $usuario->apellidos= $registro['apellidos'];
                        $usuario->telefono = $registro['telefono'];
                        $usuario->edad = $registro['edad'];
                        $usuario->correo = $registro['correo'];
                        $usuario->direccion = $registro['direccion'];
                        $usuario->usuario = $registro['Usuario'];
                        $usuario->contraseña = $registro['contraseña'];
                        $usuario->tipo = $registro['tipo'];
                        $usuario->passadmin = $registro['passadmin'];
                        }           
                    return $usuario;
                     }
            }

public function obtenerUsuariobyid($usuario){
        try
        {
            $this->conectar();

            $lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

            $sentenciaSQL = $this->conexion->prepare("SELECT * FROM usuarios where Usuario='$usuario'"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

            $sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

            /*Se recorre el cursor para obtener los datos*/
            foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
            {
                $usuario = new PojoRegistros();

                      $usuario->id = $fila->idUsuario;
                      $usuario->nombres= $fila->nombres;
                      $usuario->apellidos= $fila->apellidos;
                      $usuario->telefono = $fila->telefono;
                      $usuario->edad = $fila->edad;
                      $usuario->correo = $fila->correo;
                      $usuario->direccion = $fila->direccion;
                     

                $lista[] = $usuario;
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



