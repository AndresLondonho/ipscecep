<?php
    require_once("../modelo/sede.php");

    $datos = $_GET;
    switch($_GET['accion']){

        case 'editar':
            $sede = new Sede();
            $resultado = $sede->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'consultar':
            $sede = new Sede();
            $sede->consultar($datos['codigo']);

            if($sede->getNOM_SEDE() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array (
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
			$sede = new Sede();
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
        
        case 'listar':
            $sede = new Sede();
            $listado = $sede->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
    }
?>