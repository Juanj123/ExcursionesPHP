<?php
	/**
	* 
	*/
	class PojoVideo
	{
		//Definiendo atributos
		public $nombre;
		public $estado;
		public $url;
		public $idVideo;
		public $idUsuario;
		

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