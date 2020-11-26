<?php
    require_once("conexionBD.php");

    class Medico extends ConexionBD{
        private $id_func;
        private $id_priv;
        private $username;
        private $password;
        private $nom_user;
        private $ape_user;
        private $nom2_user;
        private $ape2_user;
        private $tel_user;
        private $cc_user;
        private $email_user;
        private $id_cargo;
        private $id_espec;
        private $id_sede;
        private $img_user;
        

        function __construct(){

        }

        public function getID_func(){
            return $this->id_func;
        }
        public function getID_priv(){
            return $this->id_priv;
        }
        public function getUsername(){
            return $this->Usuario;
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
        public function getNom2_user(){
            return $this->nom2_user;
        }
        public function getApe2_user(){
            return $this->ape2_user;
        }
        public function getTel_user(){
            return $this->tel_user;
        }
        public function getCC_user(){
            return $this->cc_user;
        }
        public function getEmail_user(){
            return $this->Email;
        }
        public function getID_cargo(){
            return $this->id_cargo;
        }
        public function getID_espec(){
            return $this->id_espec;
        }
        public function getID_sede(){
            return $this->id_sede;
        }
        public function getImg_User(){
            return $this->img_user;
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
                    func.cc_user as Cedula, func.nom_user, func.nom2_user, func.ape_user, func.ape2_user, 
                    concat(func.nom_user,' ',func.nom2_user,' ',func.ape_user,' ',func.ape2_user)as Medico, car.nom_cargo as Cargo,
                    func.id_espec as Especialidad, func.tel_user as Telefono, func.email_user as Email, func.username as Usuario,
                    func.id_sede as Sede, func.img_user as Imagen
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
                func.cc_user as Cedula, concat(func.nom_user,' ',func.nom2_user,' ',func.ape_user,' ',func.ape2_user)as Medico, car.nom_cargo as Cargo,
                espec.nom_espec as Especialidad, func.tel_user as Telefono, func.email_user as Email, func.username as Usuario,
                func.img_user as Imagen, sede.nom_sede as Sede
                FROM
                funcionarios as func 
                INNER JOIN especialidad as espec ON (func.id_espec = espec.id_espec)
                INNER JOIN cargo as car on (func.id_cargo = car.id_cargo)
                INNER JOIN sede as sede on (func.id_sede = sede.id_sede)
                ORDER BY Medico
            ";
            $this->obtener_resultados_query();
            return $this->rows;
        }

        public function consultarE($id_espec=''){
            if ($id_espec!=''):
                $this->query ="
                    select cc_user as Cedula, concat(nom_user,' ',ape_user) as Medico, id_espec
                    from funcionarios
                    where id_espec = '$id_espec'
                ";
                $this->obtener_resultados_query();
            endif;
            if(count($this->rows) == 1):
                foreach ($this->rows[0] as $propiedad => $valor):
                    $this-> $propiedad = $valor;
                endforeach;
            endif;
        }

        public function nuevo($datos=array()){
            if(array_key_exists('cc_user', $datos)):
                foreach ($datos as $campo => $valor):
                    $$campo = $valor;
                endforeach;
                $this->query = "
                    insert into funcionarios
                    (id_func, id_priv, username, password, nom_user, nom2_user, ape_user, ape2_user, tel_user, cc_user, email_user, id_cargo, id_espec, id_sede)
                    values
                    ('$id_func', '$id_priv', '$username', '$password', '$nom_user', '$nom2_user', '$ape_user', '$ape2_user', '$tel_user', '$cc_user', '$email_user', '$id_cargo', '$id_espec', '$id_sede')
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
                nom2_user = '$nom2_user',
                ape_user = '$ape_user',
                ape2_user = '$ape2_user',
                tel_user = '$tel_user',
                email_user = '$email_user',
                id_sede = '$id_sede'
                where cc_user = '$cc_user'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        public function borrar($cc_user=''){
            $this->query = "
                delete from funcionarios
                where cc_user = '$cc_user'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }

        public function directores(){
            $this->query = "
                SELECT id_func as Funcionario, concat(nom_user,' ',' ',ape_user)as Director 
                FROM funcionarios 
                where id_cargo = 1
            ";
            $this->obtener_resultados_query();
            return $this->rows;
        }

        public function medicos(){
            $this->query = "
                SELECT id_func as Funcionario, concat(nom_user,' ',' ',ape_user)as Medico
                FROM funcionarios 
                where id_cargo = 1 
            ";
            $this->obtener_resultados_query();
            return $this->rows;
        }

        public function medicoEsp($id_espec=''){
            if($id_espec!=''):
                $this->query = "
                    select id_func, concat(nom_user,' ',ape_user)as Medico, id_espec
                    from funcionarios
                    where id_espec = '$id_espec'
                ";
                $this->obtener_resultados_query();
            endif;
            if(count($this->rows) == 1):
                foreach($this->rows[0] as $propiedad => $valor):
                    $this-> $propiedad = $valor;
                endforeach;
            endif;
        }

        public function consultarS($id_func=''){
            if ($id_func!=''):
                $this->query ="
                select f.id_func, f.id_sede, s.nom_sede as Sede
                from funcionarios as f
                inner join sede as s on (f.id_sede = s.id_sede)
                where id_func = '$id_func'
                ";
                $this->obtener_resultados_query();
            endif;
            if(count($this->rows) == 1):
                foreach ($this->rows[0] as $propiedad => $valor):
                    $this-> $propiedad = $valor;
                endforeach;
            endif;
        }

    }
?>