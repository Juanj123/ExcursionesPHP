<?php 
/**
 * 
 */
class PojoReservacion
{
	public $idReservacion;
	public $idAutobus;
	public $idViaje;
	public $totalApagar;
	public $nota;
	
		function __construct1(){}

		function __construct2($idReservacion,$idAutobus,$idViaje,$totalApagar,$nota)
		{
			$this->idReservacion=$idReservacion;
			$this->idAutobus=$idAutobus;
			$this->idViaje=$idViaje;
			$this->totalApagar=$totalApagar;
			$this->nota=$nota;
		}
}
 ?>