<?php
require_once("../modelo/sede.php");
$datos = $_GET;
$sede = new Sede();
switch ($_GET['accion']){
    case 'listar':
        $listado = $sede->listar();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
    break;
}
?>