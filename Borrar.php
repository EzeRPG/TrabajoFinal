<?php  
	require ("DB/conectar.php");
	session_start();
	$controlar= $_SESSION['usuario'];

	if ($controlar == null || $controlar == "") {
	
		header("Location:login.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
	<?php include("header.php") ?>
	<link rel="stylesheet" type="text/css" href="css/Modificaciones.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, intitial-scale=1.0, maximum-scale=1.0, minium-scale=1.0">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	
	<link rel="stylesheet" type="text/css" href="css/subir.css">
	<title></title>
	

</head>
<body>
	<center>
	<section id="seccion">
		<article class="articulo">
			<form action="DB/BorrarBD.php" method="post" enctype="multipart/form-data">
				<h1 class="instrucciones">Titulo de la publicacion que desea borrar</h1><br>

				<input type="text" name="titulo" autofocus class="ingresa" required>
				<br><br>
				<button type="submit" value="Submit" name="Submit" class="boton">BORRAR</button>
				
				
			</form>
		</article>
	</section>
	</center>
</body>
</html>