<?php
    require_once("../modelo/medicamento.php");

    $datos = $_GET;
    $medicamento = new Medicamento();

    switch($_GET['accion']){
        case 'listar':
            $listado = $medicamento->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;

        case 'consultar':
            $medicamento->consultar($datos['codigo']);

            if($medicamento->getID_medcto() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array(
                    'ID_medcto' => $medicamento->getID_medcto(),
                    'nombre' => $medicamento->getNom_medcto(),
                    'stock' => $medicamento->getStock(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'nuevo':
            $resultado = $medicamento->nuevo($datos);
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
            $resultado = $medicamento->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'borrar':
            $resultado = $medicamento->borrar($datos['codigo']);
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