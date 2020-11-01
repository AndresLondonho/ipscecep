<?php
    require_once("../modelo/medico.php");

    $datos = $_GET;
    switch($_GET['accion']){

        case 'editar':
            $medico = new Medico();
            $resultado = $medico->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'consultar':
            $medico = new Medico();
            $medico->consultar($datos['codigo']);

            if($medico->getCC_cli() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array (
                    'codigo' => $medico->getCC_cli(),
                    'nombre' => $medico->getNom_cli(),
                    'telefono' => $medico->getTel_cli(),
                    'direccion' => $medico->getDir_cli(),
                    'genero' => $medico->getGen_cli(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'listar':
            $medico = new Medico();
            $listado = $medico->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
    }
?>