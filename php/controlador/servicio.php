<?php
    require_once("../modelo/servicio.php");

    $datos = $_GET;
    switch($_GET['accion']){

        case 'editar':
            $servicio = new Servicio();
            $resultado = $servicio->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'consultar':
            $servicio = new Servicio();
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
		
		case 'borrar':
			$servicio = new Servicio();
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
            $servicio = new Servicio();
            $listado = $servicio->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
    }
?>