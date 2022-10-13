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
	
    $Id= $_POST['Id'];
    $consulta="SELECT * FROM publicaciones  WHERE Id = '$Id'";
			
	if ($resultado=mysqli_query($conectar, $consulta)) {
		while ($registro=mysqli_fetch_assoc($resultado)) {
			$nombrefoto= $registro['NombreFoto'];
	    }

	}

	$titulo= $_POST['titulo'];
	$texto = $_POST['Texto'];


	
	//IMAGEN

	//recibir datos imagen
    $Nombre_imagen= $_FILES['foto']['name'];



    //Sin foto editada
    if ($Nombre_imagen==null) {

        $actualizarBD ="UPDATE publicaciones SET Titulo='$titulo',Texto='$texto' WHERE Id= '$Id'";
        
        

        if ($conectar->query($actualizarBD)===true) {
            mysqli_close($conectar);
            header("Location:../index.php");

        } else{
            mysqli_close($conectar);
            die("error al insertar los datos");
        }
    }
    //con foto editada
    else {
        if (unlink('../DBFotos/'.$nombrefoto)) { //esta linea elimina la foto de nuestra carpeta
            $destino= '../DBFotos/'. $Nombre_imagen;
	        move_uploaded_file ($_FILES['foto'] ['tmp_name'], $destino); 

            $actualizarBD ="UPDATE publicaciones SET `Titulo`='$titulo',`Texto`='$texto',`NombreFoto`='$Nombre_imagen' WHERE Id='$Id'";

            if ($conectar->query($actualizarBD) === TRUE) {
                header("Location:../index.php");
                mysqli_close($conectar);

            }else{
                mysqli_close($conectar);
                die("Error al borrar los datos en la base de datos");
        }
        }
        else{
            echo"Error no se pudo eliminar la foto volver a intentar";
        }
        

    }


