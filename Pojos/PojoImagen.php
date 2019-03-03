        <?php
	/**
	* 
	*/
	class PojoImagen
	{
		//Definiendo atributos
		public $idImagen;
		public $idGaleria;
		public $titulo;
		public $descripcion;
		public $url;
		public $estado;

		function __construct1(){}

		function __construct2($idImagen,$idGaleria,$titulo,$descripcion,$url,$estado)
		{
			$this->idImagen=$idImagen;
			$this->idGaleria=$idGaleria;
			$this->titulo=$titulo;
			$this->descripcion=$descripcion;
			$this->url=$url;
			$this->estado=$estado;
		}
	}
?>