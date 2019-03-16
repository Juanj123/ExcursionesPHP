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
		public $costo;
		public $costoNinio;
		public $costoAd;
		public $totalPagar;
		public $destino;
		public $img;
		public $repeticion;

		function __construct1(){}

		function __construct2($idUsuario,$idAutobus,$n_Asiento,$idReservacion,$idViaje,$nota,
			$costo,$costoNinio,$costoAd,$totalPagar,$destino,$img, $repeticion)
		{
			$this->idUsuario=$idUsuario;
			$this->idAutobus=$idAutobus;
			$this->n_Asiento=$n_Asiento;
			$this->idReservacion=$idReservacion;
			$this->idViaje=$idViaje;
			$this->nota=$nota;
			$this->costo=$costo;
			$this->costoNinio=$costoNinio;
			$this->costoAd=$costoAd;
			$this->totalPagar=$totalPagar;
			$this->destino=$destino;
			$this->img=$img;
			$this->repeticion = $repeticion;
		}
	}
?>