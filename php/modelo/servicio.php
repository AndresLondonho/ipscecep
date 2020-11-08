<?php
    require_once("conexionBD.php");

    class Servicio extends ConexionBD{
        private $id_serv;
        private $nom_serv;
         
        function __construct(){

        }

        public function getID_SERV(){
            return $this->id_serv;
        }
        public function getNOM_SERV(){
            return $this->nom_serv;
        }

        public function getNUMERO(){
            return $this->Numero;
        }
        public function getSERVICIO(){
            return $this->Servicio;
        }
        
        public function consultar($id_serv=''){
            if ($id_serv != ''):
                $this->query = "
                    SELECT serv.id_serv as Numero, serv.nom_serv as Servicio
                    FROM servicios as serv 
                    WHERE serv.id_serv = '$id_serv'
                    ORDER BY Numero
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
                SELECT serv.id_serv as Numero, serv.nom_serv as Servicio
                FROM servicios as serv 
                ORDER BY Numero
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
                    insert into servicios
                    (id_serv, nom_serv)
                    values
                    ('$id_serv', '$nom_serv')
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
                update servicio
                set
                nom_serv = '$nom_serv',
                where id_serv = '$id_serv'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        public function borrar($id_serv=''){
            $this->query = "
                delete from servicios
                where id_serv = '$id_serv'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
    }
?>