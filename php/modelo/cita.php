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
        private $id_est;
        private $id_medcto;
        private $stock;

        function __construct(){

        }
  
        public function getID_est(){
            return $this->id_est;
        }

        public function getID_medcto(){
            return $this->id_medcto;
        }

        public function getStock(){
            return $this->stock;
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

        public function getPaciente(){
            return $this->Paciente;
        }

        public function getMedico(){
            return $this->Medico;
        }

        public function getTel_pac(){
            return $this->tel_pac;
        }

        public function getNom_espec(){
            return $this->nom_espec;
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
            if($nro_cita!=''):
                $this->query = "
                select c.nro_cita, c.id_pac, concat(pac.nom_pac,' ',pac.ape_pac)as Paciente, 
                concat(func.nom_user,' ',func.nom2_user,' ',func.ape_user,' ',func.ape2_user) as Medico, pac.tel_pac, espec.nom_espec, m.stock
                from cita as c 
                inner join funcionarios as func on (c.id_func = func.id_func) 
                inner join pacientes as pac on (c.id_pac = pac.id_pac) 
                inner join especialidad as espec on (c.id_espec = espec.id_espec) 
                inner join medicamentos as m on (c.id_medcto = m.id_medcto) 
                where c.nro_cita = '$nro_cita'
                ";
                $this->obtener_resultados_query();
            endif;
            if(count($this->rows) == 1):
                foreach ($this->rows[0] as $propiedad => $valor):
                    $this-> $propiedad = $valor;
                endforeach;
            endif;
        }

        public function editar($datos=array()){
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            $this->query = "
                update cita 
                set
                detalle = '$detalle',
                id_est = '$id_est',
                id_medcto = '$id_medcto',
                stock = '$stock'
                where nro_cita = '$nro_cita'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        public function editarMedcto($datos=array()){
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            $this->query = "
                update cita 
                set
                stock = '$stock'
                where nro_cita = '$nro_cita'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }

        public function medicamento($nom_medcto=''){
            $this->query = "
                SELECT id_medcto, nom_medcto, stock
                FROM medicamentos
            ";
            $this->obtener_resultados_query();
            return $this->rows;
        }

        public function nuevo($datos=array()){
            if(array_key_exists('nro_cita', $datos)):
                foreach ($datos as $campo => $valor):
                    $$campo = $valor;
                endforeach;
                $this-> query="
                    insert into cita
                    (nro_cita, id_func, id_pac, id_sede, id_espec, fecha, hora, detalle, id_est)
                    values
                    ('$nro_cita','$id_func','$id_pac','$id_sede','$id_espec','$fecha','$hora','$detalle', '$id_est')
                ";
                $resultado = $this->ejecutar_query_simple();
                return $resultado;
            endif;
        }

        public function borrar($nro_cita=''){
            $this->query = "
                delete from cita
                where nro_cita = '$nro_cita'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
    }
?>