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
    }
?>