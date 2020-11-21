<?php
    function usuarioAutenticado(){
        if(!verificarUsuario()){
            header("location:./php/vista/login.php");
            exit();
        }
    }
    function verificarUsuario(){
        return isset($_SESSION["usuario"]);
    }
    session_start();
    usuarioAutenticado();

?>