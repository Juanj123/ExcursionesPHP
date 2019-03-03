<?php
	/**
	* 
	*/
	class PojoPrincipal
	{
		//Definiendo atributos
		public $idPrincipal;
		public $idUsuario;
		public $descripcion;
		public $estado;
		public $fecha_pago;
		public $estado;
		public $img_ticket;

		function __construct1(){}

		function __construct2($idPrincipal,$idUsuario,$descripcion)
		{
			$this->idPrincipal=$idPrincipal;
			$this->idUsuario=$idUsuario;
			$this->descripcion=$descripcion;
			$this->estado=$estado;
		}
	}
?>