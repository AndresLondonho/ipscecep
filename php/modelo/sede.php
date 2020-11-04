<?php
    require_once("conexionBD.php");

    class Sede extends ConexionBD {
        private $id_sede;
        private $noom_sede;

        function __construct(){

        }

        public function getID_sede(){
            return $this->id_sede;
        }
    }
?>