<?php
    require_once("conexionBD.php");

    class Medicamento extends ConexionBD{

        private $id_medcto;
        private $nom_medcto;
        private $stock;
        private $id_pac;
        
        function __construct(){

        }

        public function getID_medcto(){
            return $this->id_medcto;
        }
        public function getNom_medcto(){
            return $this->nom_medcto;
        }
        public function getStock(){
            return $this->stock;
        }
        public function getID_pac(){
            return $this->id_pac;
        }

        public function consultar($id_medcto=''){
            if($id_medcto != ''):
                $this->query = "
                    select id_medcto, nom_medcto, stock
                    from medicamentos
                    where id_medcto = '$id_medcto'
                ";
                $this->obtener_resultados_query();
            endif;
            if(count($this->rows) == 1):
                foreach($this->rows[0] as $propiedad => $valor):
                    $this-> $propiedad = $valor;
                endforeach;
            endif;
        }

        public function listar(){
            $this->query = "
                select id_medcto, nom_medcto, stock
                from medicamentos
            ";
            $this->obtener_resultados_query();
            return $this->rows;
        }

        public function nuevo($datos=array()){
            if(array_key_exists('id_medcto', $datos)):
                foreach($datos as $campo => $valor):
                    $$campo = $valor;
                endforeach;
                $this->query = "
                    insert into medicamentos
                    (id_medcto, nom_medcto, stock)
                    values
                    ('', '$nom_medcto','$stock')
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
                update medicamentos
                set
                stock = '$stock'
                where
                id_medcto = '$id_medcto'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        public function borrar($id_medcto=''){
            $this->query = "
                delete from medicamentos
                where id_medcto = '$id_medcto'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        
        public function buscarmedcto($id_pac=''){
                $this->query = "
                    select c.nro_cita, m.id_medcto, m.nom_medcto, c.stock 
                    from medicamentos as m 
                    inner join cita as c on (m.id_medcto = c.id_medcto) 
                    where c.id_pac = '$id_pac' and c.stock > 0
                ";
                $this->obtener_resultados_query();
                return $this->rows;
        }
    }
?>