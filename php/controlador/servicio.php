<?php
    require_once("../modelo/servicio.php");

    $datos = $_GET;
    $servicio = new Servicio();
    switch($_GET['accion']){

        case 'editar':
            $resultado = $servicio->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'consultar':
            $servicio->consultar($datos['codigo']);

            if($servicio->getNUMERO() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array (
                    'Numero' => $servicio->getNUMERO(),
                    'Servicio' => $servicio->getSERVICIO(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'nuevo':
            $resultado = $servicio->nuevo($datos);
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
			$resultado = $servicio->borrar($datos['codigo']);
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
            $listado = $servicio->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
    }
?>