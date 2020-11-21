<?php
    require_once("conexionBD.php");

    class Cargo extends ConexionBD {
        private $id_cargo;
        private $nom_cargo;

        function __construct(){

        }

        public function getID_cargo(){
            return $this->id_cargo;
        }
        public function getNom_cargo(){
            return $this->nom_cargo;
        }

        public function listar(){
            $this->query ="
                select id_cargo, nom_cargo
                from cargo
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