<?php
    require_once("conexionBD.php");

    class Sede extends ConexionBD{
        private $id_sede;
        private $nom_sede;
        private $dir_sede;
        private $tel_sede;
        private $id_ciu;
        private $id_rol;

        function __construct(){

        }

        public function getID_SEDE(){
            return $this->id_sede;
        }
        public function getNOM_SEDE(){
            return $this->nom_sede;
        }
        public function getDIR_SEDE(){
            return $this->dir_sede;
        }
        public function getTEL_SEDE(){
            return $this->tel_sede;
        }
        public function getID_CIU(){
            return $this->id_ciu;
        }
        public function getID_ROL(){
            return $this->id_rol;
        }

        public function getCODIGO(){
            return $this->Codigo;
        }
        public function getSEDE(){
            return $this->Sede;
        }
        public function getDIRECCION(){
            return $this->Direccion;
        }
        public function getTELEFONO(){
            return $this->Telefono;
        }
        public function getDIRECTOR(){
            return $this->Director;
        }
        public function getCIUDAD(){
            return $this->Ciudad;
        }


        public function consultar($id_sede=''){
            if ($id_sede != ''):
                $this->query = "
                    SELECT sed.id_sede as Codigo, sed.nom_sede as Sede, sed.dir_sede as Direccion, 
                    sed.tel_sede as Telefono, sed.id_ciu, ciu.nom_ciu as Ciudad, sed.id_rol, fun.nom_user as Director
                    FROM sede as sed
                    INNER JOIN ciudad as ciu ON (sed.id_ciu = ciu.id_ciu)
                    INNER JOIN funcionarios as fun ON (sed.id_rol = fun.id_func)
                    WHERE sed.id_sede = '$id_sede'
                    ORDER BY Sede
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
                SELECT sed.id_sede as Codigo, sed.nom_sede as Sede, sed.dir_sede as Direccion,
                sed.tel_sede as Telefono, ciu.nom_ciu as Ciudad,
                concat(fun.nom_user,' ',' ',fun.ape_user)as Director
                FROM sede as sed
                INNER JOIN ciudad as ciu ON (sed.id_ciu = ciu.id_ciu)
                INNER JOIN funcionarios as fun ON (sed.id_rol = fun.id_func)
                ORDER BY Sede
                ";
            $this->obtener_resultados_query();
            return $this->rows;
        }

        public function nuevo($datos=array()){
            if(array_key_exists('id_ciu', $datos)):
                foreach ($datos as $campo => $valor):
                    $$campo = $valor;
                endforeach;
                $this->query = "
                    insert into sede
                    (id_sede, nom_sede, dir_sede, tel_sede, id_ciu, id_rol)
                    values
                    ('$id_sede', '$nom_sede', '$dir_sede', '$tel_sede', '$id_ciu', '$id_rol')
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
                update sede
                set
                nom_sede = '$nom_sede',
                dir_sede = '$dir_sede',
                tel_sede = '$tel_sede',
                id_ciu = '$id_ciu',
                id_rol = '$id_rol'
                where id_sede = '$id_sede'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }
        public function borrar($id_sede=''){
            $this->query = "
                delete from sede
                where id_sede = '$id_sede'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }

    }
?>