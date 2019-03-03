<?php
	/**
	* 
	*/
	class PojoPagos
	{
		//Definiendo atributos
		public $idPagos;
		public $idReservacion;
		public $idUsuario;
		public $monto;
		public $fecha_pago;
		public $estado;
		public $img_ticket;

		function __construct1(){}

		function __construct2($idPagos,$idReservacion,$idUsuario,$monto,$fecha_pago,$estado,$img_ticket)
		{
			$this->idPagos=$idPagos;
			$this->idReservacion=$idReservacion;
			$this->idUsuario=$idUsuario;
			$this->monto=$monto;
			$this->fecha_pago=$fecha_pago;
			$this->estado=$estado;
			$this->img_ticket=$img_ticket;
		}
	}
?>