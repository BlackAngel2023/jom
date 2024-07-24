
<?php
	class Modelo_Grafico{
		private $conexion;
		function __construct()
		{
			require_once('conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
        }


		function TraerDatos(){
			$sql=$this->conexion->sql;
			//$sql = "select * from prueba";	
			$arreglo = array();
			//echo 'hola0';
			if ($consulta = $this->conexion->conexion->query($sql)) {
				
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				//	echo 'hola1';
				}
				
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
	}
?>