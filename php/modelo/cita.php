<?php
    require_once("conexionBD.php");

    class Cita extends ConexionBD{
        private $nro_cita;
        private $id_func;
        private $id_pac;
        private $id_sede;
        private $id_espec;
        private $fecha;
        private $hora;
        private $detalle;

        function __construct(){

        }

        public function getNro_cita(){
            return $this->nro_cita;
        }
        public function getID_func(){
            return $this->id_func;
        }
        public function getID_pac(){
            return $this->id_pac;
        }
        public function getID_sede(){
            return $this->id_sede;
        }
        public function getID_espec(){
            return $this->id_espec;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getHora(){
            return $this->hora;
        }
        public function getDetalle(){
            return $this->detalle;
        }

        public function listar(){
            $this->query = "
            SELECT cita.nro_cita, concat(pac.nom_pac,' ',pac.ape_pac)as Paciente, 
            concat(func.nom_user,' ',func.nom2_user,' ',func.ape_user,' ',func.ape2_user) as Medico, 
            espec.nom_espec as Tipo_cita, date_format(cita.fecha, '%d/%b/%Y') Fecha, date_format(cita.hora, '%h:%m %p') Hora, sede.nom_sede as Sede 
            from cita as cita 
            inner join funcionarios as func on (cita.id_func = func.id_func) 
            inner join pacientes as pac on (cita.id_pac = pac.id_pac) 
            inner join especialidad as espec on (cita.id_espec = espec.id_espec) 
            inner join sede as sede on (cita.id_sede = sede.id_sede)
            order by cita.nro_cita
            ";
            $this->obtener_resultados_query();
            return $this->rows;
        }

        public function consultar($nro_cita=''){

        }

        public function editar($datos=array()){
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            $this->query = "
                update cita 
                set
                detalle = '$detalle'
                where nro_cita = '$nro_cita'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }

        public function nuevo($datos=array()){
            if(array_key_exists('nro_cita', $datos)):
                foreach ($datos as $campo => $valor):
                    $$campo = $valor;
                endforeach;
                $this-> query="
                    insert into cita
                    (nro_cita, id_func, id_pac, id_sede, id_espec, fecha, hora, detalle)
                    values
                    ('$nro_cita','$id_func','$id_pac','$id_sede','$id_espec','$fecha','$hora','$detalle')
                ";
                $resultado = $this->ejecutar_query_simple();
                return $resultado;
            endif;
        }

        public function borrar($nro_cita=''){

        }
    }
?>