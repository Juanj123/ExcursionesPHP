        <?php
	/**
	* 
	*/
	class PojoGaleria
	{
		//Definiendo atributos
		public $idGaleria;
		public $idUsuario;
		public $titulo;
		public $img_galeria;
		public $destino;

		function __construct1(){}

		function __construct2($idGaleria,$idUsuario,$titulo,$img_galeria,$destino)
		{
			$this->idGaleria=$idGaleria;
			$this->idUsuario=$idUsuario;
			$this->titulo=$titulo;
			$this->img_galeria=$img_galeria;
			$this->destino=$destino;
		}
	}
?>