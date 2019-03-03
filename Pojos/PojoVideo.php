<?php
	/**
	* 
	*/
	class PojoVideo
	{
		//Definiendo atributos
		public $idVideo;
		public $idUsuario;
		public $nombre;
		public $estado;
		public $url;

		function __construct1(){}

		function __construct2($idVideo,$idUsuario,$nombre,$estado,$url)
		{
			$this->idVideo=$idVideo;
			$this->idUsuario=$idUsuario;
			$this->nombre=$nombre;
			$this->estado=$estado;
			$this->url=$url;
		}
	}
?>