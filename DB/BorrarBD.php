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
	$Titulo= $_POST['titulo'];
	
	$ManejoPublicacion= new ManejoDePublicacion($conectar->Conectar());

	$DatosPubli= $ManejoPublicacion->TraerPorTitulo($Titulo);

	$Id=$DatosPubli[0]->GetId(); 
	$nombrefoto= $DatosPubli[0]->GetNFoto(); 

	if (unlink('../DBFotos/'.$nombrefoto)) { //esta linea elimina la foto de nuestra carpeta
		//elimina los datos de la base de datos
		$ManejoPublicacion->EliminarPubli($Id);

	}else {
		$conectar->CerrarConexion();
		echo "no se elimino";
	}
 ?> 