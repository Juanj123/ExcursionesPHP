<?php 
class PojoLugaresOcupados
{
	public $idReservacion;
	public $nombre;
	public $nota;
	public $totalPagar;
	
	function __construct1()
	{

	}
	function __construct2($idReservacion,$nombre,$nota,$totalPagar)
	{
		$this->idReservacion=$idReservacion;
		$this->nombre=$nombre;
		$this->nota=$nota;
		$this->totalPagar=$totalPagar;
	}
}
?>