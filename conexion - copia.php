<?php	class conexion{	private $servidor;
		private $usuario;
		private $contrasena;
		private $basedatos;
		public $tabla;
		public $sql;
		public function __construct(){
		    $this->servidor = "localhost";
			$this->usuario ="root";
			$this->contrasena = "";
			$this->basedatos = "prueba";
			$this->tabla = "prueba";
			$this->sql = "select stock y, nombre x from prueba";
		}
	function conectar(){
			$this->conexion = new mysqli($this->servidor,$this->usuario,$this->contrasena,$this->basedatos);
			
			$this->conexion->set_charset("utf8");
		}
		function cerrar(){
			$this->conexion->close();	
		}
	}
?> 