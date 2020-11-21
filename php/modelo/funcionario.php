<?php
    require_once("ConexionBD.php");

    class Funcionario extends ConexionBD{

        private $id_func ;
        private $id_priv;
        private $username;
        private $password;
        private $nom_user;
        private $nom2_user;
        private $ape_user;
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
            return $this->username;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getNom_user(){
            return $this->nom_user;
        }

        public function getNom2_user(){
            return $this->nom2_user;
        }

        public function getApe_user(){
            return $this->ape_user;
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
            return $this->email_user;
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

        public function getImg_user(){
            return $this->img_user;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }

        public function getNom_priv(){
            return $this->nom_priv;
        }

        public function listar(){
            $this->query = "
                select f.id_func, p.nom_priv, f.username, f.cc_user, concat(f.nom_user,' ',nom2_user)as nombre, 
                concat(f.ape_user,' ',f.ape2_user) as apellido, f.tel_user, f.email_user, c.nom_cargo, e.nom_espec, s.nom_sede
                from funcionarios as f
                inner join privilegios as p on(f.id_priv = p.id_priv)
                inner join cargo as c on(f.id_cargo = c.id_cargo)
                inner join especialidad as e on(f.id_espec = e.id_espec)
                inner join sede as s on(f.id_sede = s.id_sede)
                order by c.nom_cargo
            ";
            $this->obtener_resultados_query();
            return $this->rows;
        }
        
        public function consultar($id_func=''){
            if($id_func != ''):
                $this->query = "
                    select id_func, cc_user, nom_user, nom2_user, ape_user, ape2_user, 
                    tel_user, email_user, id_cargo, id_espec, id_sede
                    from funcionarios
                    where id_func = '$id_func'
                ";
                $this->obtener_resultados_query();
            endif;
            if(count($this->rows) == 1):
                foreach($this->rows[0] as $propiedad => $valor):
                    $this-> $propiedad = $valor;
                endforeach;
            endif;
        }
        
        public function nuevo($datos=array()){
            if(array_key_exists('id_func', $datos)):
                foreach($datos as $campo => $valor):
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
        
        public function editar($datos = array()){
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
                where id_func = '$id_func'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        
        public function borrar($id_func=''){
            $this->query = "
                delete from funcionarios
                where id_func = '$id_func'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        
    }