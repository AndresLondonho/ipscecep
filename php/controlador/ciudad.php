<?php
    require_once("../modelo/ciudad.php");

    $datos = $_GET;
    $ciudad = new Ciudad();
    switch($_GET['accion']){

        case 'editar':
            $resultado = $ciudad->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'consultar':
            $ciudad->consultar($datos['codigo']);

            if($ciudad->getID_CIU() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array (
                    'Codigo' => $ciudad->getID_CIU(),
                    'Ciudad' => $ciudad->getNOM_CIU(),
                    'Pais' => $ciudad->getID_PAIS(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'nuevo':
            $resultado = $ciudad->nuevo($datos);
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
		
		case 'borrar':
			$resultado = $ciudad->borrar($datos['codigo']);
			if($resultado > 0){
                $respuesta = array(
                    'respuesta' => 'correcto'
                );
            } else {
                $respuesta = array (
                    'respuesta' => 'error'
                );
            }
            echo json_encode($respuesta);
		break;

        case 'listar':
            $listado = $ciudad->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
    }
?>