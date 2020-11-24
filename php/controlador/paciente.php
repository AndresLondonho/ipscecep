<?php
    require_once("../modelo/paciente.php");

    $datos = $_GET;
    
    $paciente = new Paciente();
    switch($_GET['accion']){

        case 'editar':
            $resultado = $paciente->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'consultar':
            $paciente->consultar($datos['codigo']);

            if($paciente->getID_PAC() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array (
                    'Cedula' => $paciente->getCEDULA(),
                    'nom_pac' => $paciente->getNOM_PAC(),
                    'ape_pac' => $paciente->getAPE_PAC(),
                    'Paciente' => $paciente->getPACIENTE(),
                    'Email' => $paciente->getEMAIL(),
                    'Telefono' => $paciente->getTELEFONO(),
                    'Direccion' => $paciente->getDIRECCION(),
                    'Ciudad' => $paciente->getCIUDAD(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'borrar':
			$resultado = $paciente->borrar($datos['codigo']);
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
            $listado = $paciente->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;

        case 'nuevo':
            $resultado = $paciente->nuevo($datos);
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