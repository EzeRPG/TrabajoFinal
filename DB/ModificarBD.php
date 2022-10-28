<?php 
	session_start();
	$controlar= $_SESSION['usuario'];

	if ($controlar == null || $controlar == "") {
		echo "no se encuentra conectado";
		die();
	}
    include_once("../DB/conectar.php");
	$conectar = new Conexion();

    include_once("../Objetos/POO_ManejoPubli.php");
    include_once("../Objetos/POO_Publicacion.php");

	//TEXTO
	//recibir datos
	
    $Id= $_POST['Id'];
    //traermoas los datos que nos van a faltar
    $ManejoPublicacion= new ManejoDePublicacion($conectar->Conectar());
    $DatosPubli= $ManejoPublicacion->GetPublicacionID($Id);

    
    if (empty($DatosPubli)) {
        echo"algo fallo";
    }else {
        foreach ($DatosPubli as $value) {
            
        }
    }



    /* se elimina
	if ($resultado=mysqli_query($conectar->Conectar(), $consulta)) {
		while ($registro=mysqli_fetch_assoc($resultado)) {
			$nombrefoto= $registro['NombreFoto'];
	    }

	}
    */
	$Titulo= $_POST['titulo'];
	$Texto = $_POST['Texto'];


	
	//IMAGEN

	//recibir datos imagen
    $Nombre_imagen= $_FILES['foto']['name'];



    //Sin foto editada
    if ($Nombre_imagen==null) {

        $ManejoPublicacion->ModificarPubliTT($Id,$Titulo,$Texto);
        $conectar->CerrarConexion();	
    }
    //con foto editada
    else {
        if (unlink('../DBFotos/'.$DatosPubli[0]->GetNFoto())) { //esta linea elimina la foto de nuestra carpeta
            
            $destino= '../DBFotos/';
	        $tipoArchivo = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
            $NNombreFoto= $Titulo .".". $tipoArchivo;
	        move_uploaded_file ($_FILES['foto'] ['tmp_name'], $destino . $NNombreFoto);//Guardamos la fotografia con el nombre en la publicacion
            $ManejoPublicacion->ModificarPubliTTF($Id,$Titulo,$Texto, $NNombreFoto);
            $conectar->CerrarConexion();	
        }
        else{
            $conectar->CerrarConexion();	
            echo"Error no se pudo eliminar la foto volver a intentar";
        }
        

    }


    ?>