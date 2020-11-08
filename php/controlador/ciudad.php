<?php
    require_once("../modelo/ciudad.php");

    $datos = $_GET;
    switch($_GET['accion']){

        case 'editar':
            $ciudad = new Ciudad();
            $resultado = $ciudad->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'consultar':
            $ciudad = new Ciudad();
            $ciudad->consultar($datos['codigo']);

            if($ciudad->getID_CIU() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array (
                    'Ciudad' => $ciudad->getID_CIU(),
                    'Pais' => $ciudad->getNOM_CIU(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;
		
		case 'borrar':
			$ciudad = new Ciudad();
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
            $ciudad = new Ciudad();
            $listado = $ciudad->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
    }
?>