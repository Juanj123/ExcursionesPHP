<?php
	/**
	* 
	*/
	class PojoViaje
	{
		//Definiendo atributos
		public $idViaje;
		public $idAutobus;
		public $dia;
		public $mes;
		public $año;
		public $destino;
		public $hora;
		public $descripcion;
		public $nota;
		public $costo;
		public $costoNinio;
		public $costoAd;
		public $img;
		public $itinerario;

		function __construct1(){}

		function __construct2($idViaje,$idAutobus,$dia,$mes,$año,$destino,$hora,$descripcion,$nota,$costo,$costoNinio,$costoAd,$img,$itinerario)
		{
			$this->idViaje=$idViaje;
			$this->idAutobus=$idAutobus;
			$this->dia=$dia;
			$this->mes=$mes;
			$this->año=$año;
			$this->destino=$destino;
			$this->hora=$hora;
			$this->descripcion=$descripcion;
			$this->nota=$nota;
			$this->costo=$costo;
			$this->costoNinio=$costoNinio;
			$this->costoAd=$costoAd;
			$this->img=$img;
			$this->itinerario=$itinerario;
		}
	}
?>