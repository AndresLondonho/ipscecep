<?php
    require_once("../modelo/medico.php");

    $datos = $_GET;
    $medico = new Medico();

    switch($_GET['accion']){
        case 'editar':
            $resultado = $medico->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;

        case 'consultar':
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
                    'nom2_user' => $medico->getNom2_user(),
                    'ape2_user' => $medico->getApe2_user(),
                    'medico' => $medico->getMedico(),
                    'tel_user' => $medico->getTelefono(),
                    'sede' => $medico->getSede(),
                    'especialidad' => $medico->getEspecialidad(),
                    'imagen' => $medico->getImagen(),
                    'email_user' => $medico->getEmail_user(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'consultarE':
            $medico->consultarE($datos['codigo']);

            if($medico->getID_espec() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array (
                    'cedula' => $medico->getCedula(),
                    'medico' => $medico->getMedico(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;
		
		case 'borrar':
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
            $listado = $medico->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;

        case 'listarM':
            $listado = $medico->medicos($datos['codigo']);
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;

        case 'nuevo':
            $resultado = $medico->nuevo($datos);
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

        case 'consultarS':
            $medico->consultarS($datos['codigo']);

            if($medico->getID_sede() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array (
                    'id_sede' => $medico->getID_sede(),
                    'sede' => $medico->getSede(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;
    }
?>