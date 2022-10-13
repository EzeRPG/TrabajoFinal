<?php 
	require ("conectar.php");
	session_start();
	$controlar= $_SESSION['usuario'];

	if ($controlar == null || $controlar == "") {
		echo "no se encuentra conectado";
		die();
	}
	//TEXTO
	//recibir datos
	$Titulo= $_POST['titulo'];
	
	$consulta="SELECT * FROM publicaciones  WHERE Titulo = '$Titulo'";
			
	if ($resultado=mysqli_query($conectar, $consulta)) {
		while ($registro=mysqli_fetch_assoc($resultado)) {
			$Id=$registro['Id']; 
			$nombrefoto= $registro['NombreFoto'];
	    }

	}

	if (unlink('../DBFotos/'.$nombrefoto)) { //esta linea elimina la foto de nuestra carpeta
		//elimina los datos de la base de datos
		$Eliminar ="DELETE FROM publicaciones WHERE Id= '$Id'";

		if ($conectar->query($Eliminar)===true) {
			mysqli_close($conectar);
			header("Location:../subir.php");

		} else{
			mysqli_close($conectar);
			die("error al insertar los datos");
		}


	}else {
		mysqli_close($conectar);
		echo "no se elimino";
	}
	


	

 ?> 