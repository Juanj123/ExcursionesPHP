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
		public $img;

		function __construct1(){}

		function __construct2($idAutobus,$nAsientos,$nombre,$img)
		{
			$this->idAutobus=$idAutobus;
			$this->nAsientos=$nAsientos;
			$this->nombre=$nombre;
			$this->img=$img;
		}
	}
?>