<?php
	/**
	* 
	*/
	class PojoApartaTuLugar
	{
		//Definiendo atributos
		public $idUsuario;
		public $idAutobus;
		public $n_Asiento;
		public $idReservacion;
		public $idViaje;
		public $nota;
		public $costo_adulto;
		public $costoNino;
		public $totalPagar;
		public $destino;
		public $img;

		function __construct1(){}

		function __construct2($idUsuario,$idAutobus,$n_Asiento,$idReservacion,$idViaje,$nota,
			$costo_adulto,$costoNino,$totalPagar,$destino,$img)
		{
			$this->idUsuario=$idUsuario;
			$this->idAutobus=$idAutobus;
			$this->n_Asiento=$n_Asiento;
			$this->idReservacion=$idReservacion;
			$this->idViaje=$idViaje;
			$this->nota=$nota;
			$this->costo_adulto=$costo_adulto;
			$this->costoNino=$costoNino;
			$this->totalPagar=$totalPagar;
			$this->destino=$destino;
			$this->img=$img;
		}
	}
?>