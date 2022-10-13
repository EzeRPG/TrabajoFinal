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
	
	$titulo= $_POST['titulo'];
	$texto = $_POST['Texto'];
	$diayhora= date("y-m-d h-i");

	//IMAGEN

	//recibir datos imagen

	$Nombre_imagen= $_FILES['foto']['name'];


	$destino= '../DBFotos/'. $_FILES['foto']['name'];

	//Consulta si existe el titulo en la base de datos

	$consulta="SELECT Titulo FROM publicaciones WHERE Titulo='$titulo'";
	

	$ejecutar= mysqli_query($conectar, $consulta);

	$row=mysqli_fetch_array($ejecutar);

	if (!$row['Titulo']) {
	
	
	move_uploaded_file ($_FILES['foto'] ['tmp_name'], $destino);//Guardamos la fotogracia con el nombre en la carpeta




	$guardarBD ="INSERT INTO publicaciones(Id_Usuario, Titulo, Texto, NombreFoto, fecha) Values('$controlar', '$titulo', '$texto', '$Nombre_imagen', '$diayhora')";

	if ($conectar->query($guardarBD)===true) {
		mysqli_close($conectar);
		header("Location:../subir.php");

	} else{
		mysqli_close($conectar);
		die("error al insertar los datos");
	}

	}else{
		mysqli_close($conectar);
		die("Ya hay una publicacion con ese titulo");
	}
	
 ?> 