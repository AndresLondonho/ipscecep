<?php
    require_once("conexionBD.php");

    class Cita extends ConexionBD{
        

        function __construct(){

        }

        public function listar(){
            $this->query = "
            SELECT cita.nro_cita, concat(pac.nom_pac,' ',pac.ape_pac)as Paciente, 
            concat(func.nom_user,' ',func.nom2_user,' ',func.ape_user,' ',func.ape2_user) as Medico, 
            espec.nom_espec as Tipo_cita, cita.fecha as Fecha, cita.hora as Hora, sede.nom_sede as Sede 
            from cita as cita 
            inner join funcionarios as func on (cita.id_func = func.id_func) 
            inner join pacientes as pac on (cita.id_pac = pac.id_pac) 
            inner join especialidad as espec on (cita.id_espec = espec.id_espec) 
            inner join sede as sede on (cita.id_sede = sede.id_sede)
            order by cita.nro_cita

            /*paciente, medico, tipo de cita, fecha, hora, sede*/
            ";
            $this->obtener_resultados_query();
            return $this->rows;
        }

        public function consultar($nro_cita=''){

        }

        public function editar($datos=array()){

        }

        public function nuevo($datos=array()){

        }

        public function borrar($nro_cita=''){

        }
    }
?>