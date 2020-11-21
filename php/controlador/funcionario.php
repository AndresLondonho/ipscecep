<?php
    require_once("../modelo/funcionario.php");

    $datos = $_GET;
    $funcionario = new Funcionario();

    switch($_GET['accion']){
        case 'listar':
            $listado = $funcionario->listar();
            echo json_encode(array('data'=>$listado),JSON_UNESCAPED_UNICODE);
        break;
        
        case 'consultar':
            $funcionario->consultar($datos['codigo']);

            if($funcionario->getID_func() == null){
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            } else {
                $respuesta = array (
                    'id_func' => $funcionario->getID_func(),
                    'nom_user' => $funcionario->getNom_user(),
                    'ape_user' => $funcionario->getApe_user(),
                    'nom2_user' => $funcionario->getNom2_user(),
                    'ape2_user' => $funcionario->getApe2_user(),
                    'tel_user' => $funcionario->getTel_user(),
                    'sede' => $funcionario->getID_sede(),
                    'especialidad' => $funcionario->getID_espec(),
                    'cargo' => $funcionario->getID_cargo(),
                    'email_user' => $funcionario->getEmail_user(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;
        
        case 'nuevo':
            $resultado = $funcionario->nuevo($datos);
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
        
        case 'editar':
            $resultado = $funcionario->editar($datos);
            $respuesta = array(
                'respuesta' => $resultado
            );
            echo json_encode($respuesta);
        break;
        
        case 'borrar':
            $resultado = $funcionario->borrar($datos['codigo']);
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