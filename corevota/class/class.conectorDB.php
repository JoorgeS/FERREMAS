<?php
//session_start();
/**
 * @author elporfirio.com
 * @copyright 2013
 *
 * #############################
 * Archivo de clases principales
 */
 
//Se requiere el archivo de configuracion
//require("cfg/config.php");

	$PATH_TO_ROOT = "./";


require($PATH_TO_ROOT."cfg/config.php");
//require("cfg/config.php");

class conectorDB extends configuracion //clase principal de conexion y consultas
{
	private $conexion;
		
	public function __construct(){
		$this->conexion = parent::conectar(); //creo una variable con la conexión
		return $this->conexion;										
	}
	
	public function consultarBD($consulta, $valores = array()){  //funcion principal, ejecuta todas las consultas
		$resultado = false;
		
		if($statement = $this->conexion->prepare($consulta)){  //prepara la consulta
			
			if(preg_match_all("/(:\w+)/", $consulta, $campo, PREG_PATTERN_ORDER)){ //tomo los nombres de los campos iniciados con :xxxxx
				$campo = array_pop($campo); //inserto en un arreglo
				foreach($campo as $parametro){
					$statement->bindValue($parametro, $valores[substr($parametro,1)]);
				}
			}
			try {
				if (!$statement->execute()) { //si no se ejecuta la consulta...
					print_r($statement->errorInfo()); //imprimir errores
					$resultado = false;
				}else{
					$resultado = $statement->fetchAll(PDO::FETCH_ASSOC); //si es una consulta que devuelve valores los guarda en un arreglo.
					$statement->closeCursor();
				}
			}
			catch(PDOException $e){
				echo "Error de ejecución: \n";
				print_r($e->getMessage());
			}	
		}
		return $resultado;
		$this->conexion = null; //cerramos la conexión
	} /// Termina funcion consultarBD
}/// Termina clase conectorDB
