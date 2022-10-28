<?php  
	
	session_start();
	$controlar= $_SESSION['usuario'];

	if ($controlar == null || $controlar == "") {
	
		header("Location:login.php");
	}
    include_once ("DB/conectar.php");
	$conectar = new Conexion();
    include_once("Objetos/POO_ManejoPubli.php");
?>

<!DOCTYPE html>
<html>
<head>
<?php include("header.php") ?>
<title>Nuestra Bitacora</title>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------->

			<section id="principal">

				<section id="publicaciones">
				
<!-- traer publicacion  --> 
                    <?php  
				        $ManejoPublicacion= new ManejoDePublicacion($conectar->Conectar());

                        $DatosPubli= $ManejoPublicacion->GetPublicacionIDU($controlar);

                        if (empty($DatosPubli)) {
                            echo"No hay registros que mostrar";
                        }else {
                            foreach ($DatosPubli as $value) {
                                ?>
                                <html><body>
									<article class="post"> 
										<h2 class="titulo-post"><?php echo $value->GetTitulo(); ?></h2>
										<p>
						
									<strong class="fech">Publicado el:</strong>  <span class="fecha"> <span><?php echo $value->GetFecha(); ?></span>
									</p>
									<img id="fotop" src="DBFotos/<?php echo $value->GetNFoto(); ?>" class="img-post">
									<p class="parrafo-post"> <?php echo str_replace("\n", "<br>", $value->GetTexto()); ?></p>
									</article>
								</body></html>
                                <?php  
                            }
                        }
						$conectar->CerrarConexion();
                    ?>

				</section>		
			</section>
	</body>
</html>