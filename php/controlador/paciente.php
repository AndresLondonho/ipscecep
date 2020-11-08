<?php
    require_once("../modelo/paciente.php");

    $datos = $_GET;
    switch($_GET['accion']){

        case 'editar':
            $paciente = new paciente();
            $resultado = $paciente->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'consultar':
            $paciente = new paciente();
            $paciente->consultar($datos['codigo']);

            if($paciente->getCEDULA() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array (
                    'Cedula' => $paciente->getCEDULA(),
                    'nom_pac' => $paciente->getNOM_PAC(),
                    'ape_pac' => $paciente->getAPE_PAC(),
                    'Paciente' => $paciente->getPACIENTE(),
                    'Email' => $paciente->getEMAIL  (),
                    'Telefono' => $paciente->geTELEFONO(),
                    'Direccion' => $paciente->getDIRECCION(),
                    'Ciudad' => $paciente->getCIUDAD(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'listar':
            $paciente = new paciente();
            $listado = $paciente->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
    }
?>