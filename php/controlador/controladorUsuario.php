<?php
require_once '../modelo/modeloUsuario.php';

$usuario = htmlspecialchars(trim("$_POST[usuario]"));
$password = htmlspecialchars(trim("$_POST[password]"));
$datos = array("usuario"=>$usuario, "password"=>$password);

switch ($_POST['accion']){
   
    case 'login':
        $usuario = new Usuario();
        $usuario->consultar($datos);

        if($usuario->getUsua_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            if(password_verify($datos['password'],$usuario->getPASSWORD())){
                session_start();
                $_SESSION['usuario'] = $usuario->getUSERNAME();
                $_SESSION['nombre'] = $usuario->getNOM_USER();
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
    case 'editar':
        $usuario = new Usuario();
        $resultado = $usuario->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $usuario = new Usuario();
        $resultado = $usuario->nuevo($datos);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => $resultado
            );
        }  else {
            $respuesta = array(
                'respuesta' => $resultado
            );
        }
        echo json_encode($respuesta);
        break;
       
    case 'borrar':
		$usuario = new Usuario();
		$resultado = $usuario->borrar($datos['codigo']);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $usuario = new Usuario();
        $usuario->consultar($datos['codigo']);

        if($usuario->getUsua_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $usuario->getUsua_codi(),
                'nombre' => $usuario->getUsua_nomb(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $usuario = new Usuario();
        $listado = $usuario->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
