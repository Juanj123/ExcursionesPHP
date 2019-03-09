<?php
	/**
	* 
	*/
	class PojoOfertas
	{
		//Definiendo atributos
		public $idOferta;
		public $idViaje;
		public $costo;
		public $costoNinio;
		public $costoAd;

		function __construct1(){}

		function __construct2($idOferta,$idViaje,$costo,$costoNinio, $costoAd)
		{
			$this->idOferta=$idOferta;
			$this->idViaje=$idViaje;
			$this->costo=$costo;
			$this->costoNinio=$costoNinio;
			$this->costoAd=$costoAd;
		}
	}
?>