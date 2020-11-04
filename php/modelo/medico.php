<?php
    require_once("conexionBD.php");

    class Medico extends ConexionDB{
        private $id_func;
        private $id_priv;
        private $username;
        private $password;
        private $nom_user;
        private $ape_user;
        private $tel_user;
        private $cc_user;
        private $email_user;
        private $id_cargo;
        private $id_espec;
        

        function __construct(){

        }

        public function getID_func(){
            return $this->id_func;
        }
        public function getID_priv(){
            return $this->id_priv;
        }
        public function getUsername(){
            return $this->username;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getNom_user(){
            return $this->nom_user;
        }
        public function getApe_user(){
            return $this->ape_user;
        }
        public function getTel_user(){
            return $this->tel_user;
        }
        public function getCC_user(){
            return $this->cc_user;
        }
        public function getEmail_user(){
            return $this->email_user;
        }
        public function getID_cargo(){
            return $this->id_cargo;
        }
        public function getID_espec(){
            return $this->id_espec;
        }


        public function getCedula(){
            return $this->Cedula;
        }
        public function getMedico(){
            return $this->Medico;
        }
        public function getEspecialidad(){
            return $this->Especialidad;
        }
        public function getTelefono(){
            return $this->Telefono;
        }
        public function getSede(){
            return $this->Sede;
        }
        public function getImagen(){
            return $this->Imagen;
        }

        public function consultar($cc_med=''){
            if ($cc_med != ''):
                $this->query = "
                    SELECT
                    func.cc_user as Cedula, func.nom_user, func.ape_user, concat(func.nom_user,' ',func.ape_user)as Medico, car.nom_cargo as Cargo,
                    espec.nom_espec as Especialidad, func.tel_user as Telefono, func.email_user as Correo, func.username as Usuario,
                    sede.nom_sede as Sede, func.img_user as Imagen
                    FROM
                    funcionarios as func 
                    INNER JOIN especialidad as espec ON (func.id_espec = espec.id_espec)
                    INNER JOIN cargo as car on (func.id_cargo = car.id_cargo)
                    INNER JOIN sede as sede on (func.id_sede = sede.id_sede)
                    WHERE func.cc_user = '$cc_med'
                    ORDER BY Medico
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
                SELECT
                func.cc_user as Cedula, concat(func.nom_user,' ',func.ape_user)as Medico, car.nom_cargo as Cargo,
                espec.nom_espec as Especialidad, func.tel_user as Telefono, func.email_user as Correo, func.username as Usuario,
                func.img_user as Imagen
                FROM
                funcionarios as func 
                INNER JOIN especialidad as espec ON (func.id_espec = espec.id_espec)
                INNER JOIN cargo as car on (func.id_cargo = car.id_cargo)
                ORDER BY Medico
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
                    insert into funcionarios
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
            $this->query = "
                update funcionarios 
                set
                nom_user = '$nom_user',
                ape_user = '$ape_user',
                tel_user = '$tel_user'
                where cc_user = '$cc_user'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        public function borrar($cc_med=''){
            $this->query = "
                delete from funcionarios
                where cc_emp = '$cc_med'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }

    }
?>