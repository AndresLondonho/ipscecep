<?php
    require_once("../modelo/privilegios.php");
    $datos = $_GET;
    $privilegios = new Privilegios();

    switch($_GET['accion']){
        case 'listar':
            $listado = $privilegios->listar();
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
    }

    ?>