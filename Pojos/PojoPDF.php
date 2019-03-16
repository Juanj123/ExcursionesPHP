<?php 
class PojoPDF
{
	public $nombre;
	public $n_Asiento;
	public $idReservacion;
	public $idViaje;
	public $hora_salida;
	public $totalPagar;
	public $destino;
	public $fecha;
	public $correo;
	public $direccion;
	function __construct1(){}

		function __construct2($nombre,$n_Asiento,$idReservacion,$idViaje,$hora_salida,$totalPagar,
			$destino,$fecha,$correo,$direccion)
		{
			$this->nombre=$nombre;
			$this->n_Asiento=$n_Asiento;
			$this->idReservacion=$idReservacion;
			$this->idViaje=$idViaje;
			$this->hora_salida=$hora_salida;
			$this->totalPagar=$totalPagar;
			$this->destino=$destino;
			$this->fecha=$fecha;
			$this->correo=$correo;
			$this->direccion=$direccion;
		}
}
 ?>