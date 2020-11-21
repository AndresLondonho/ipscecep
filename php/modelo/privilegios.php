<?php
    require_once("conexionBD.php");

    class Privilegios extends ConexionBD{

        public function listar(){
            $this->query = "
                select id_priv, nom_priv
                from privilegios
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