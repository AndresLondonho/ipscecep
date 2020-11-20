<?php
    require_once("../modelo/sede.php");

    $datos = $_GET;
    $sede = new Sede();
    switch($_GET['accion']){

        case 'editar':
            $resultado = $sede->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'consultar':
            $sede->consultar($datos['codigo']);

            if($sede->getCODIGO() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array (
                    'Codigo' => $sede->getCODIGO(),
                    'Sede' => $sede->getSEDE(),
                    'Direccion' => $sede->getDIRECCION(),
                    'Telefono' => $sede->getTELEFONO(),
                    'Ciudad' => $sede->getCIUDAD(),
                    'Director' => $sede->getDIRECTOR(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'borrar':
			$resultado = $sede->borrar($datos['codigo']);
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

        case 'nuevo':
            $resultado = $sede->nuevo($datos);
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
        
        case 'listar':
            $listado = $sede->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
    }
?>