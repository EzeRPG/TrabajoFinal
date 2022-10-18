<?php 
	session_start();
	$controlar= $_SESSION['usuario'];

	if ($controlar == null || $controlar == "") {
		echo "no se encuentra conectado";
		die();
	}

    include_once("../DB/conectar.php");
	$conectar = new Conexion();

    include_once("POO_ManejoPubli.php");
    include_once("POO_Publicacion.php");
	//TEXTO
	//recibir datos
	
	$titulo= $_POST['titulo'];
	$texto = $_POST['Texto'];
	$diayhora= date("Y-m-d H:i:s");

	//IMAGEN

	//recibir datos imagen le cambiamos el nombre y guardamos 
    $tipoArchivo = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));

	$destino= '../DBFotos/';

	//Consulta si existe el titulo en la base de datos

	$consulta="SELECT Titulo FROM publicaciones WHERE Titulo='$titulo'";
	
	$ejecutar= mysqli_query($conectar->Conectar(), $consulta);

	$row=mysqli_fetch_array($ejecutar);

	if (!$row['Titulo']) {
        $tipoArchivo = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
		$NNombreFoto= $titulo .".". $tipoArchivo;
	    move_uploaded_file ($_FILES['foto'] ['tmp_name'], $destino . $NNombreFoto);//Guardamos la fotografia con el nombre en la publicacion

        $ManejoPublicacion= new ManejoDePublicacion($conectar->Conectar());

        $Publi= new Publicacion();
        $Publi->SetIdU($controlar);
        $Publi->SetTitulo($titulo);
        $Publi->SetTexto($texto);
        $Publi->SetNFoto($NNombreFoto);
        $Publi->SetFecha($diayhora);

        $ManejoPublicacion->SetPublicacionBD($Publi);

        
	    

	}else{
		$conectar->CerrarConexion();
		die("Ya hay una publicacion con ese titulo");
	}
	
 ?> 