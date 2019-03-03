<?php
	/**
	* 
	*/
	class PojoOfertas
	{
		//Definiendo atributos
		public $idOferta;
		public $idViaje;
		public $costo_adulto;
		public $costo_niño;

		function __construct1(){}

		function __construct2($idOferta,$idViaje,$costo_adulto,$costo_niño)
		{
			$this->idOferta=$idOferta;
			$this->idViaje=$idViaje;
			$this->costo_adulto=$costo_adulto;
			$this->costo_niño=$costo_niño;
		}
	}
?>