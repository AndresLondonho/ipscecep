<?php
    require_once("../modelo/medico.php");

    $datos = $_GET;
    switch($_GET['accion']){

        case 'editar':
            $medico = new Medico();
            $resultado = $medico->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'consultar':
            $medico = new Medico();
            $medico->consultar($datos['codigo']);

            if($medico->getCedula() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array (
                    'cedula' => $medico->getCedula(),
                    'medico' => $medico->getMedico(),
                    'telefono' => $medico->getTelefono(),
                    'sede' => $medico->getSede(),
                    'especialidad' => $medico->getEspecialidad(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'listar':
            $medico = new Medico();
            $listado = $medico->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
    }
?>