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
}
?>