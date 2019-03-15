<?php 
/**
 * 
 */
class PojoFactura
{
	public $destino;
	public $monto;
	public $totalAPagar;
	
		function __construct1(){}

		function __construct2($destino,$monto,$totalAPagar)
		{
			$this->destino=$destino;
			$this->monto=$monto;
			$this->totalAPagar=$totalAPagar;
		}
}
 ?>