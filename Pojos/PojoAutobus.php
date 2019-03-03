<?php
	/**
	* 
	*/
	class PojoAutobus
	{
		//Definiendo atributos
		public $idAutobus;
		public $nAsientos;
		public $nombre;

		function __construct1(){}

		function __construct2($idAutobus,$nAsientos,$nombre)
		{
			$this->idAutobus=$idAutobus;
			$this->nAsientos=$nAsientos;
			$this->nombre=$nombre;
		}
	}
?>