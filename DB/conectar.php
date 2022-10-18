<?php 

class Conexion {

	//Atributos
	private $host ="localhost";
	private $nombre="trabajofinal";
	private $usuario="root";
	private $contraseña="";
	private $Conex;

	//Metodos (funciones)
	//Id de las publicaciones
	public function Conectar()
	{
		$conectar=mysqli_connect($this->host, $this->usuario, $this->contraseña, $this->nombre);
		if (mysqli_connect_errno()) {
			die("fallo al conectar la base de datos");
		}
		$this->Conex= $conectar;
		return $conectar;
	}
	public function CerrarConexion()
	{
		mysqli_close($this->Conex);
	}
	
}
 ?>