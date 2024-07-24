<?php	class conexion{	private $servidor;
		private $usuario;
		private $contrasena;
		private $basedatos;
		public $tabla;
		public $sql;
		public $driver;
		public function __construct(){
		    $this->servidor = "";
			$this->usuario ="";
			$this->contrasena = "";
			$this->basedatos = "";
			$this->tabla = "";
			$this->sql = "";
			$this->driver ="";

		}
	function conectar(){
		if($this->driver=="mysql"){
			$this->conexion = new mysqli($this->servidor,$this->usuario,$this->contrasena,$this->basedatos);
			
			$this->conexion->set_charset("utf8");
		}else{
			$this->conexion = pg_connect("host=$this->servidor port=5432 dbname=$this->basedatos user=$this->usuario password=$this->basedatos");
		}
	}
	
	function cerrar(){
			$this->conexion->close();	
	}
}
?> 