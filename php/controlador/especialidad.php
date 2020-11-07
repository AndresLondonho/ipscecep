<?php
require_once("../modelo/especialidad.php");
$datos = $_GET;
$especialidad = new Especialidad();
switch ($_GET['accion']){
    case 'consultar':

    break;

    case 'listar':
        $listado = $especialidad->listar();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
    break;
}
?>