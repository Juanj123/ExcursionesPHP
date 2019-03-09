<?php
	/**
	* 
	*/
	class PojoUsuarios
	{
		//Definiendo atributos
		public $id;
		public $nombres;
		public $apellidos;
		public $telefono;
		public $edad;
		public $correo;
		public $direccion;
		public $usuario;
		public $contraseña;
		public $tipo;
		public $passadmin;

		function __construct1(){}

		function __construct2($id,$nombres,$apellidos,$telefono,$edad,$correo,$direccion,$usuario,$contraseña,$tipo, $passadmin)
		{
			$this->id=$id;
			$this->nombres=$nombres;
			$this->apellidos=$apellidos;
			$this->telefono=$telefono;
			$this->edad=$edad;
			$this->correo=$correo;
			$this->direccion=$direccion;
			$this->usuario=$usuario;
			$this->contraseña=$contraseña;
			$this->tipo=$tipo;
			$this->passadmin=$passadmin;
		}
	}
?>