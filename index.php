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
<title>Inserte titulo de la pagina</title>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------->

			<section id="principal">

				<section id="publicaciones">
				
<!-- traer publicacion  --> 				
						<?php 
							require ("DB/conectar.php");
							$consulta="SELECT * FROM publicaciones WHERE Id_Usuario='$controlar' ORDER BY Fecha DESC";
							if ($resultado=mysqli_query($conectar, $consulta)) {
								while ($registro=mysqli_fetch_assoc($resultado)) {
									
									$titulo=$registro['Titulo']; 
									$data = explode(" ", $registro['Fecha']);
									$fecha= $data[0];
									$nombrefoto= $registro['NombreFoto'];
									$texto= $registro['Texto'];
									publicar($titulo, $fecha, $nombrefoto, $texto);
									
								}
							}
 						?>
				

			
<!-- mostrar publicacion --> 
						<?php 
							function publicar($titulo, $fecha, $nombrefoto, $texto)
							{
								?>
								<html><body>
									<article class="post"> 
										<h2 class="titulo-post"><?php echo $titulo; ?></h2>
										<p>
						
									<strong class="fech">Publicado el:</strong>  <span class="fecha"> <span><?php echo $fecha; ?></span>
									</p>
									<img id="fotop" src="DBFotos/<?php echo $nombrefoto; ?>" class="img-post">
									<p class="parrafo-post"> <?php echo str_replace("\n", "<br>", $texto); ?></p>
									</article>
								</body></html>

								<?php
							}
						
						 ?>



				</section>		
			</section>
	</body>
</html>