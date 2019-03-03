<?php
	/**
	* 
	*/
	class PojoPrincipalGaleria
	{
		//Definiendo atributos
		public $idGaleria;
		public $img;

		function __construct1(){}

		function __construct2($idGaleria,$img,$descripcion)
		{
			$this->idGaleria=$idGaleria;
			$this->img=$img;
		}
	}
?>