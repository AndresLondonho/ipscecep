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
                    'nom_user' => $medico->getNom_user(),
                    'ape_user' => $medico->getApe_user(),
                    'medico' => $medico->getMedico(),
                    'tel_user' => $medico->getTelefono(),
                    'sede' => $medico->getSede(),
                    'especialidad' => $medico->getEspecialidad(),
                    'imagen' => $medico->getImagen(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;
		
		case 'borrar':
			$medico = new Medico();
			$resultado = $medico->borrar($datos['codigo']);
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
            $medico = new Medico();
            $listado = $medico->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
    }
?>