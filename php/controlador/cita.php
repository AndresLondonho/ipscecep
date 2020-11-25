<?php
require_once("../modelo/cita.php");
$datos = $_GET;
$cita = new Cita();
switch($_GET['accion']){
    case 'listar':
        $listado = $cita->listar();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
    break;

    case 'nuevo':
        $resultado = $cita->nuevo($datos);
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
        $resultado = $cita->borrar($datos['codigo']);
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
    
    case 'consultar':
        $cita->consultar($datos['codigo']);

        if($cita->getNro_cita() == null){
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        } else {
            $respuesta = array (
                'nro_cita' => $cita->getNro_cita(),
                'paciente' => $cita->getPaciente(),
                'cedulaP' => $cita->getID_pac(),
                'tel_espec' => $cita->getTel_pac(),
                'medico' => $cita->getMedico(),
                'nom_espec' => $cita->getNom_espec(),
                'respuesta' => 'existe'
            );
        }
        echo json_encode($respuesta);
    break;

    case 'medicamento':
        $listado = $cita->medicamento();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
    break;

    case 'editar':
        $resultado = $cita->editar($datos);
        $respuesta = array(
            'respuesta' => $resultado
        );
        echo json_encode($respuesta);
    break;
}
?>