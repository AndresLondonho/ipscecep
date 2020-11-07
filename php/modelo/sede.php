<?php
    require_once("conexionBD.php");

    class Sede extends ConexionBD {
        private $id_sede;
        private $nom_sede;
        private $dir_sede;
        private $tel_sede;
        private $id_ciu;
        private $id_rol;

        function __construct(){

        }

        public function getID_sede(){
            return $this->id_sede;
        }
        public function getNom_sede(){
            return $this->nom_sede;
        }
        public function getDir_sede(){
            return $this->dir_sede;
        }
        public function getTel_sede(){
            return $this->tel_sede;
        }
        public function getID_ciu(){
            return $this->id_ciu;
        }
        public function getID_rol(){
            return $this->id_role;
        }

        public function listar(){
            $this->query = "
                select s.id_sede as Codigo, s.nom_sede as Sede, s.dir_sede as Direccion,
                s.tel_sede as Telefono
                from sede as s
                order by s.id_sede
            ";
            $this->obtener_resultados_query();
            return $this->rows;
        }

        public function consultar(){

        }

        public function nuevo(){

        }

        public function editar(){

        }

        public function borrar(){

        }
    }
?>