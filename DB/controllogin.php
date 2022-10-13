<?php 
	require ("conectar.php");
		$Usuario= $_POST['Nombre'];
		$Contraseña= $_POST['Contraseña'];
		
		$consulta="SELECT * FROM usuarios WHERE Usuario='$Usuario' and Clave='$Contraseña'";
	

		$ejecutar= mysqli_query($conectar, $consulta);

		$row=mysqli_fetch_array($ejecutar);

		if (!$row['Usuario']) {
			mysqli_close($conectar);
			echo "error ";
		}else{
			session_start();
			$_SESSION['usuario']=$row['Id'];
			mysqli_close($conectar);
			header("Location:../index.php");
		}
		
	
 ?>