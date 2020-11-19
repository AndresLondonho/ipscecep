<?php
    require_once("conexionBD.php");

    class Pais extends ConexionBD{
        private $id_pais;
        private $nom_pais;
        private $cap_pais;
         
        function __construct(){

        }

        public function getID_PAIS(){
            return $this->id_pais;
        }
        public function getNOM_PAIS(){
            return $this->nom_pais;
        }
        public function getCAP_PAIS(){
            return $this->cap_pais;
        }
        
        public function consultar($id_pais=''){
            if ($id_pais != ''):
                $this->query = "
                SELECT pais.id_pais Codigo, pais.nom_pais as pais, pais.cap_pais as Capital
                FROM pais
                WHERE pais.id_pais = '$id_pais'
                ORDER BY Codigo
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
                SELECT pais.id_pais Codigo, pais.nom_pais as pais, pais.cap_pais as Capital
                FROM pais
                ORDER BY Codigo
            ";
            $this->obtener_resultados_query();
            return $this->rows;
        }

        public function nuevo($datos=array()){
            if(array_key_exists('id_pais', $datos)):
                foreach ($datos as $campo => $valor):
                    $$campo = $valor;
                endforeach;

                $this->query = "
                    insert into pais
                    (id_pais, nom_pais, cap_pais)
                    values
                    ('$id_pais', '$nom_pais', '$cap_pais')
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
                update pais
                set
                nom_pais = '$nom_pais',
                cap_pais = '$cap_pais'
                where id_pais = '$id_pais'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        public function borrar($id_pais=''){
            $this->query = "
                delete from pais
                where id_pais = '$id_pais'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
    }
?>