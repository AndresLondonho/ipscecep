<?php
    require_once("../modelo/cargo.php");

    $datos=$_GET;
    $cargo = new Cargo();

    switch($_GET['accion']){
        case 'listar':
            $listado = $cargo->listar();
            echo json_encode(array('data'=>$listado),JSON_UNESCAPED_UNICODE);
        break;
    }
    ?>