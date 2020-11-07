<?php
require_once("conexionBD.php");
class Especialidad extends ConexionBD{
    private $id_espec;
    private $nom_espec;

    function __construct(){

    }

    public function getID_espec(){
        return $this->id_espec;
    }
    public function getNom_espec(){
        return $this->nom_espec;
    }

    public function consultar($id_espec=''){
        if($id_espec!=''):
            $this->query = "
                select id_espec as Codigo, nom_espec as Especialidad
                from especialidad
                where id_espec= '$id_espec'
                order by id_espec
            ";
            $this->obtener_resultados_query();
        endif;
        if(count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad=>$valor):
            $this->$propiedad=$valor;
            endforeach;
        endif;
    }

    public function listar(){
        $this->query = "
                select id_espec as Codigo, nom_espec as Especialidad
                from especialidad
                order by id_espec
            ";
            $this->obtener_resultados_query();
            return $this->rows;
    }

    public function nuevo($datos=array()){
        if(array_key_exists('id_espec', $datos)):
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            $This->query = "
                insert into especialidad
                (id_espec, nom_espec)
                values
                ('$id_espec', '$nom_espec')
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        endif;
    }

    public function editar($datos=array()){
        foreach ($datos as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
            update especialidad
            set nom_espec = '$nom_espec'
            where id_espec = '$id_espec'
        ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function borrar($id_espec=''){
        $this->query = "
            delete from especialidad
            where id_espec = '$id_espec'
        ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }
}
?>