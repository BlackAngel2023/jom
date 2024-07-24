<?php
 
  $fh = fopen("conexion.php", 'w') or die("Se produjo un error al crear el archivo");
  
  $texto =  '<?php	class conexion{	private $servidor;
		private $usuario;
		private $contrasena;
		private $basedatos;
		public $tabla;
		public $sql;
		public $driver;
		public function __construct(){
		    $this->servidor = "'.$_POST['server'].'";
			$this->usuario ="'.$_POST['usuario'].'";
			$this->contrasena = "'.$_POST['password'].'";
			$this->basedatos = "'.$_POST['bd'].'";
			$this->tabla = "'.$_POST['tabla'].'";
			$this->sql = "'.$_POST['sql'].'";
			$this->driver ="'.$_POST['driver'].'";

		}
	function conectar(){
		if($this->driver=="'.mysql.'"){
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
?> ';
  
  fwrite($fh, $texto) or die("No se pudo escribir en el archivo");
  
  fclose($fh);
  
  echo "Se ha escrito sin problemas";
?>