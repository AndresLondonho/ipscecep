<?php
    require_once("conexionBD.php");

    class Medico extends ConexionDB{
        private $id_med;
        private $cc_med;
        private $nom_med;
        private $ape_med;
        private $tel_med;
        private $sede;
        private $espec;
        private $img_med;

        function __construct(){

        }

        public function getID_med(){
            return $this->id_med;
        }
        public function getCC_med(){
            return $this->cc_med;
        }
        public function getNom_med(){
            return $this->nom_med;
        }
        public function getApe_med(){
            return $this->ape_med;
        }
        public function getTel_med(){
            return $this->tel_med;
        }
        public function getSede(){
            return $this->sede;
        }
        public function getEspec(){
            return $this->espec;
        }
        public function getImg_med(){
            return $this->img_med;
        }

        public function consultar($cc_med=''){
            if ($cc_med != ''):
                $this->query = "
                    select cc_med, concat(nom_med,' ', ape_med) as medico, tel_med,
                    sede, espec, img_med
                    from medico
                    where cc_med = '$cc_med'
                    order by medico
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
                select cc_med, concat(nom_med,' ', ape_med) as medico, tel_med,
                sede, espec, img_med
                from medico
                order by medico
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
                    insert into medico
                    (id_med, cc_med, nom_med, ape_med, tel_med, sede, espec, img_med)
                    values
                    (null, '$cc_med', '$nom_med', '$ape_med', '$tel_med', '$sede', '$espec', '$img_med')
                ";
                $resultado = $this->ejecutar_query_simple();
                return $resultado;
            endif;
        }
        public function editar($datos=array()){
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            $nom_med = utf8_decode($nom_med);
            $ape_med = utf8_decode($ape_med);
            $this->query = "
                update medico 
                set
                nom_emp = '$nom_emp',
                ape_emp = '$ape_emp',
                tel_emp = '$tel_emp',
                sede = '$sede',
                espec = '$espec'
                where cc_emp = '$cc_emp'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        public function borrar($cc_med=''){
            $this->query = "
                delete from medico
                where cc_emp = '$cc_med'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }

    }
?>