<?php 

	include_once ("conectar.php");
	$conectar = new Conexion();
		$Usuario= $_POST['Nombre'];
		$Contraseña= $_POST['Contraseña'];
		
		$consulta="SELECT * FROM usuarios WHERE Usuario='$Usuario' and Clave='$Contraseña'";
	

		$ejecutar= mysqli_query($conectar->Conectar(), $consulta);

		$row=mysqli_fetch_array($ejecutar);

		if (!$row['Usuario']) {
			$conectar->CerrarConexion();	
			echo "error ";
		}else{
			session_start();
			$_SESSION['usuario']=$row['Id'];
			$conectar->CerrarConexion();	
			header("Location:../index.php");
		}
		
	
 ?>