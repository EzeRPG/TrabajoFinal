<?php  
	session_start();
	$controlar= $_SESSION['usuario'];

	if ($controlar == null || $controlar == "") {
	
		header("Location:login.php");
	}
	require ("conectar.php");
	$conectar = new Conexion();
    include_once("../Objetos/POO_ManejoPubli.php");
?>

<?php
$Titulo= $_POST['titulo'];

$ManejoPublicacion= new ManejoDePublicacion($conectar->Conectar());

$DatosPubli= $ManejoPublicacion->TraerPorTitulo($Titulo);

$conectar->CerrarConexion();
?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, intitial-scale=1.0, maximum-scale=1.0, minium-scale=1.0">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	
	<link rel="stylesheet" type="text/css" href="../css/Principal.css">
	<link rel="stylesheet" type="text/css" href="../css/Modificaciones.css">
	<title></title>

</head>
<body>
	<center>
	<section id="seccion">
		<article class="articulo">
			<form action="ModificarBD.php" method="post" enctype="multipart/form-data">
				


			<?php
				if (empty($DatosPubli)) {
					die("No se pudo traer de la base de datos intente en un rato");
				}else {
					foreach ($DatosPubli as $value) {
						?>
						<h1 class="instrucciones">Titulo</h1><br>
						<input type="hidden" name="Id" value=<?php echo $value->GetId(); ?>>
						<input type="text" name="titulo" autofocus class="ingresa" required  value= "<?php echo $value->GetTitulo(); ?>"> 
						<br><br>
						
						<h1 class="instrucciones">Texto</h1><br>
						<textarea class="muchotexto"  name="Texto" sentences required> <?php echo $value->GetTexto(); ?> </textarea>
						
						<br><br>
						<h1 class="instrucciones">Foto</h1><br>
						<img id="foto" src="subidas/<?php echo $value->GetNFoto(); ?>" class="foto">
						<input class="SubFotito" type="file" name="foto" accept="image/png, image/jpeg">
						
						<br><br>
					
						<button type="submit" value="Submit" name="Submit" class="boton">Confirmar Modificacion</button>
				
						<?php  
					}
				}
			?>
			
			</form>
			

		</article>
	</section>
	</center>
</body>
</html>