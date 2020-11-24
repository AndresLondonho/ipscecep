    <?php
    require_once("conexionBD.php");

    class Paciente extends ConexionBD{
        private $id_pac;
        private $nom_pac;
        private $ape_pac;
        private $cc_pac;
        private $email_pac;
        private $tel_pac;
        private $dir_pac;
        private $id_ciu;
        private $nom_ciu;
        private $Paciente;
        

        function __construct(){

        }

        public function getID_PAC(){
            return $this->id_pac;
        }
        public function getNOM_PAC(){
            return $this->nom_pac;
        }
        public function getAPE_PAC(){
            return $this->ape_pac;
        }
        public function getEMAIL_PAC(){
            return $this->email_pac;
        }
        public function getTEL_PAC(){
            return $this->tel_pac;
        }
        public function getDIR_PAC(){
            return $this->dir_pac;
        }
        public function getID_CIU(){
            return $this->id_ciu;
        }
        public function getCC_PAC(){
            return $this->cc_pac;
        }
        public function getNOM_CIU(){
            return $this->nom_ciu;
        }

        public function getCEDULA(){
            return $this->Cedula;
        }
        public function getPACIENTE(){
            return $this->Paciente;
        }
        public function getEMAIL(){
            return $this->Email;
        }
        public function getTELEFONO(){
            return $this->Telefono;
        }
        public function getDIRECCION(){
            return $this->Direccion;
        }
        public function getCIUDAD(){
            return $this->Ciudad;
        }

        public function consultar($cc_pac=''){
            if ($cc_pac != ''):
                $this->query = "
                    SELECT pac.id_pac, pac.cc_pac as Cedula, pac.nom_pac, pac.ape_pac, concat(pac.nom_pac,' ',pac.ape_pac) as Paciente,
                    pac.email_pac as Email, pac.tel_pac as Telefono, pac.dir_pac as Direccion, ciu.nom_ciu as Ciudad
                    FROM pacientes as pac
                    INNER JOIN ciudad as ciu ON (pac.id_ciu = ciu.id_ciu)
                    WHERE pac.cc_pac = '$cc_pac'
                    ORDER BY Paciente
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
                SELECT pac.cc_pac as Cedula, pac.nom_pac, pac.ape_pac, concat(pac.nom_pac,' ',pac.ape_pac) as Paciente,
                pac.email_pac as Email, pac.tel_pac as Telefono, pac.dir_pac as Direccion, ciu.nom_ciu as Ciudad
                FROM pacientes as pac
                INNER JOIN ciudad as ciu ON (pac.id_ciu = ciu.id_ciu)
                ORDER BY Paciente
                ";
            $this->obtener_resultados_query();
            return $this->rows;
        }

        public function nuevo($datos=array()){
            if(array_key_exists('cc_pac', $datos)):
                foreach ($datos as $campo => $valor):
                    $$campo = $valor;
                endforeach;
                $nom_pac = utf8_decode($nom_pac);
                $ape_pac = utf8_decode($ape_pac);
                $this->query = "
                    insert into pacientes
                    (id_pac, nom_pac, ape_pac, cc_pac, email_pac, tel_pac, dir_pac, id_ciu)
                    values
                    ('$id_pac', '$nom_pac', '$ape_pac', '$cc_pac', '$email_pac', '$tel_pac', '$dir_pac', '$id_ciu')
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
                update pacientes 
                set
                nom_pac = '$nom_pac',
                ape_pac = '$ape_pac',
                email_pac = '$email_pac',
                tel_pac = '$tel_pac',
                dir_pac = '$dir_pac',
                id_ciu = '$id_ciu'
                where cc_pac = '$cc_pac'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        public function borrar($cc_pac=''){
            $this->query = "
                delete from pacientes
                where cc_pac = '$cc_pac'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }

    }
?>