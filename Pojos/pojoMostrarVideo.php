<?php
	/**
	* 
	*/
	class pojoMostrarVideo
	{
		//Definiendo atributos
		public $nombre;
		public $estado;
		public $url;

		function __construct1(){}

		function __construct2($nombre,$estado,$url)
		{
			$this->nombre=$nombre;
			$this->estado=$estado;
			$this->url=$url;
		}
	}
?>