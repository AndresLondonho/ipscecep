<?php
require_once '../modelo/modeloUsuario.php';

$usuario = htmlspecialchars(trim("$_POST[usuario]"));
$password = htmlspecialchars(trim("$_POST[password]"));


switch ($_POST['accion']){
   
    case 'login':
        $datos = array("usuario"=>$usuario, "password"=>$password);
        $usuario = new Usuario();
        $usuario->consultar($datos);

        if($usuario->getID_FUNC() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            if(password_verify($datos['password'],$usuario->getPASSWORD())){
                session_start();
                $_SESSION['codigo'] = $usuario->getID_FUNC();
                $_SESSION['usuario'] = $usuario->getUSERNAME();
                $_SESSION['nombre'] = $usuario->getNOM_USER();
                $_SESSION['apellido'] = $usuario->getAPE_USER();
                $_SESSION['tipo'] = $usuario->getID_PRIV();
                $_SESSION['cedula'] = $usuario->getCC_USER();
                $_SESSION['correo'] = $usuario->getEMAIL_USER();
                $_SESSION['foto'] = $usuario->getIMG_USER();
                $respuesta = array(
                    'respuesta' =>'existe'
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            }
            
        }
        echo json_encode($respuesta);
        break;
    break;
}
?>
