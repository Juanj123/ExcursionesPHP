<?php
	/**
	* 
	*/
	class pojoMostrarGaleria
	{
		//Definiendo atributos
		public $titulo;
		public $img_galeria;
		public $nombre;

		function __construct1(){}

		function __construct2($titulo,$img_galeria)
		{
			$this->titulo=$titulo;
			$this->img_galeria=$img_galeria;
		}
	}
?>