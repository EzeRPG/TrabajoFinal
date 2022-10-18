<?php 

    class Publicacion {

        //Atributos
        private $Id;
        private $Id_Usuario;
        private $Titulo;
        private $Texto;
        private $NombreFoto;
        private $Fecha;


        //Metodos (funciones)

        
        //Id de las publicaciones
        public function GetId ()
        {
            return $this->Id;
        }
        public function SetId ($Id)
        {
            $this->Id=$Id;
        }
        //Id de los usuarios
        public function GetIdU ()
        {
            return $this->Id_Usuario;
        }
        public function SetIdU ($IdU)
        {
            $this->Id_Usuario=$IdU;
        }
        //Titulo
        public function GetTitulo ()
        {
            return $this->Titulo;
        }
        public function SetTitulo ($Titulo)
        {
            $this->Titulo=$Titulo;
        }

        //Texto
        public function GetTexto ()
        {
            return $this->Texto;
        }
        public function SetTexto ($Texto)
        {
            $this->Texto=$Texto;
        }

        //Nombre de la foto
        public function GetNFoto ()
        {
            return $this->NombreFoto;
        }
        public function SetNFoto ($NFoto)
        {
            $this->NombreFoto=$NFoto;
        }


        //Fecha
        public function GetFecha ()
        {
            return $this->Fecha;
        }
        public function SetFecha ($Fecha)
        {
            $this->Fecha=$Fecha;
        }
    }
    



 ?>
