<?php
    require_once("conexionBD.php");

    class Ciudad extends ConexionBD{
        private $id_ciu;
        private $nom_ciu;
        private $id_pais;
         
        function __construct(){

        }

        public function getID_CIU(){
            return $this->id_ciu;
        }
        public function getNOM_CIU(){
            return $this->nom_ciu;
        }
        public function getID_PAIS(){
            return $this->id_pais;
        }

        public function getCIUDAD(){
            return $this->Ciudad;
        }
        public function getPAIS(){
            return $this->Pais;
        }
        
        public function consultar($id_ciu=''){
            if ($id_ciu != ''):
                $this->query = "
                SELECT ciu.nom_ciu as Ciudad, pai.nom_pais as Pais
                FROM ciudad as ciu
                INNER JOIN pais as pai ON (ciu.id_pais=pai.id_pais)
                WHERE ciu.id_ciu = '$id_ciu'
                ORDER BY Ciudad
                ";
            $this->obtener_resultados_query();
            endif;
            if(count($this->rows) == 1):
                foreach ($this->rows[0] as $propiedad => $valor):
                    $this-> $propiedad = $valor;
                endforeach;
            endif;
                
        }

        public function listar(){
            $this->query = "
                SELECT ciu.nom_ciu as Ciudad, pai.nom_pais as Pais
                FROM ciudad as ciu
                INNER JOIN pais as pai ON (ciu.id_pais=pai.id_pais)
                ORDER BY Ciudad
            ";
            $this->obtener_resultados_query();
            return $this->rows;
        }

        public function nuevo($datos=array()){
            if(array_key_exists('cc_med', $datos)):
                foreach ($datos as $campo => $valor):
                    $$campo = $valor;
                endforeach;
                $nom_med = utf8_decode($nom_med);
                $ape_med = utf8_decode($ape_med);
                $this->query = "
                    insert into ciudad
                    (id_ciu, nom_ciu, id_pais)
                    values
                    ('$id_ciu', '$nom_ciu', '$id_pais')
                ";
                $resultado = $this->ejecutar_query_simple();
                return $resultado;
            endif;
        }
        public function editar($datos=array()){
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            $this->query = "
                update ciudad
                set
                nom_ciu = '$nom_ciu',
                id_pais = '$id_pais'
                where id_ciu = '$id_ciu'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        public function borrar($id_ciu=''){
            $this->query = "
                delete from ciudad
                where id_ciu = '$id_ciu'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
    }
?>