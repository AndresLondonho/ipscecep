<?php
    require_once("../modelo/pais.php");

    $datos = $_GET;
    $pais = new Pais();

    switch($_GET['accion']){
        case 'listar':
            $listado = $pais->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;

        case 'consultar':
            $pais->consultar($datos['codigo']);

            if($pais->getID_pais() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array(
                    'ID_pais' => $pais->getID_pais(),
                    'Pais' => $pais->getNom_pais(),
                    'Capital' => $pais->getCap_pais(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'nuevo':
            $resultado = $pais->nuevo($datos);
            if($resultado > 0){
                $respuesta = array(
                    'respuesta' => 'correcto'
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'editar':
            $resultado = $pais->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'borrar':
            $resultado = $pais->borrar($datos['codigo']);
            if($resultado > 0){
                $respuesta = array(
                    'respuesta' => 'correcto'
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            echo json_encode($respuesta);
        break;
    }
?>