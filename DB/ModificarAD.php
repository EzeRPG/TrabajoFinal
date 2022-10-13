<?php  
	require ("conectar.php");
	session_start();
	$controlar= $_SESSION['usuario'];

	if ($controlar == null || $controlar == "") {
	
		header("Location:login.php");
	}
?>

<?php
$Titulo= $_POST['titulo'];
		
$consulta="SELECT * FROM publicaciones  WHERE Titulo = '$Titulo'";
			
	if ($resultado=mysqli_query($conectar, $consulta)) {
		while ($registro=mysqli_fetch_assoc($resultado)) {
			
			$Id=$registro['Id']; 										
			$tituloDB=$registro['Titulo']; 
			$nombrefoto= $registro['NombreFoto'];
			$texto= $registro['Texto'];
			
	    }

	}

?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, intitial-scale=1.0, maximum-scale=1.0, minium-scale=1.0">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	
	<link rel="stylesheet" type="text/css" href="css/subir.css">
	<title></title>

</head>
<body>
	<section id="seccion">
		<article class="articulo">
			<form action="ModificarBD.php" method="post" enctype="multipart/form-data">

				<h1 class="instrucciones">Titulo</h1><br>
                <input type="hidden" name="Id" value=<?php echo $Id; ?>>
				<input type="text" name="titulo" autofocus class="ingresa" required  value= "<?php echo $tituloDB; ?>"> 
				<br><br>
				
				<h1 class="instrucciones">Texto</h1><br>
				<textarea class="muchotexto"  name="Texto" sentences required> <?php echo $texto; ?> </textarea>
				
				<br><br>
				<h1 class="instrucciones">Foto</h1><br>
                <img id="foto" src="subidas/<?php echo $nombrefoto; ?>" class="foto">
				<input class="SubFotito" type="file" name="foto" accept="image/png, image/jpeg">
				
				<br><br>
			
				<button type="submit" value="Submit" name="Submit" class="boton">Confirmar Modificacion</button>
				
				
			</form>
			<a class="href" href="cerrar.php">Cerrar sesion</a>  
			<a class="href" href="Borrar.php">Borrar publicacion</a> 
			<a class="href2" href="subir.php">Subir publicacion</a> 
			<a class="href2" href="index.php">Pagina de rotaract</a> 
			

		</article>
	</section>
</body>
</html>