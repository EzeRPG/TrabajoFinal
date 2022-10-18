<?php 
    include("POO_Publicacion.php");
    class ManejoDePublicacion{
        private $Conexion; 

        public function __construct($Conexion){
            $this->SetConexion($Conexion);

        }

        public function SetConexion($Conexion){
            $this->Conexion=$Conexion;
        }

        public function GetPublicacionIDU($IDU){
            $matriz=array();
            $contador=0;
            $Resultado=$this->Conexion->query("SELECT * FROM publicaciones WHERE Id_Usuario='$IDU' ORDER BY Fecha DESC");
            while ($Registro=mysqli_fetch_assoc($Resultado)) {
                $Publi= New Publicacion();
                $Publi->SetId($Registro["Id"]);
                $Publi->SetTitulo($Registro["Titulo"]);
                $Publi->SetTexto($Registro["Texto"]);
                $Publi->SetNFoto($Registro["NombreFoto"]);
                $Publi->SetFecha($Registro["Fecha"]);
                $matriz[$contador]= $Publi;
                $contador++;
            }
            return $matriz;
        }

        public function GetPublicacionID($ID){
            $matriz=array();
            $contador=0;
            $Resultado=$this->Conexion->query("SELECT * FROM publicaciones WHERE Id='$ID'");
            while ($Registro=mysqli_fetch_assoc($Resultado)) {
                $Publi= New Publicacion();
                $Publi->SetId($Registro["Id"]);
                $Publi->SetTitulo($Registro["Titulo"]);
                $Publi->SetTexto($Registro["Texto"]);
                $Publi->SetNFoto($Registro["NombreFoto"]);
                $Publi->SetFecha($Registro["Fecha"]);
                $matriz[$contador]= $Publi;
                $contador++;
            }
            return $matriz;
        }

        public function SetPublicacionBD(Publicacion $Publi){
            $GuardarBD ="INSERT INTO publicaciones(Id_Usuario, Titulo, Texto, NombreFoto, fecha) Values('".$Publi->GetIdU()."', 
            '".$Publi->GetTitulo()."', '".$Publi->GetTexto()."', '".$Publi->GetNFoto()."', '".$Publi->GetFecha()."')";

            if ($this->Conexion->query($GuardarBD)===true) {
                mysqli_close($this->Conexion);
                header("Location:../index.php");
        
            } else{
                mysqli_close($this->Conexion);
                die("error al insertar los datos");
            }
        }

        public function TraerPorTitulo($Titulo){
            $matriz=array();
            $contador=0;
            $Resultado=$this->Conexion->query("SELECT * FROM publicaciones  WHERE Titulo = '$Titulo'");
	        if ($Resultado) {
		        while ($Registro=mysqli_fetch_assoc($Resultado)) {
                    $Publi= New Publicacion();
                    $Publi->SetId($Registro["Id"]);
                    $Publi->SetTitulo($Registro["Titulo"]);
                    $Publi->SetTexto($Registro["Texto"]);
                    $Publi->SetNFoto($Registro["NombreFoto"]);
                    $matriz[$contador]= $Publi;
                    $contador++;
	            }
                return $matriz;
	        }
        }

        public function ModificarPubliTT($Id, $Titulo, $Texto){

            $ActualizarBD ="UPDATE publicaciones SET Titulo='$Titulo',Texto='$Texto' WHERE Id= '$Id'";

            if ($this->Conexion->query($ActualizarBD)===true) {
                mysqli_close($this->Conexion);
                header("Location:../index.php");
        
            } else{
                mysqli_close($this->Conexion);
                die("error al actualizar los datos");
            }
        }

        public function ModificarPubliTTF($Id, $Titulo, $Texto, $Nombre_imagen){

            $ActualizarBD ="UPDATE publicaciones SET `Titulo`='$Titulo',`Texto`='$Texto',`NombreFoto`='$Nombre_imagen' WHERE Id='$Id'";

            if ($this->Conexion->query($ActualizarBD)===true) {
                mysqli_close($this->Conexion);
                header("Location:../index.php");
        
            } else{
                mysqli_close($this->Conexion);
                die("error al actualizar los datos");
            }
        }

        public function EliminarPubli($Id){
            $Eliminar ="DELETE FROM publicaciones WHERE Id= '$Id'";
            if ($this->Conexion->query($Eliminar)===true) {
                mysqli_close($this->Conexion);
                header("Location:../index.php");
        
            } else{
                mysqli_close($this->Conexion);
                die("error al actualizar los datos");
            }
        }

        




    }
    

 ?>
