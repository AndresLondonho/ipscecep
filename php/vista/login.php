<?php
    include_once '../modelo/conexionBD.php';

    session_start();
    
    //Saber si debo cerrar sesion, pruebo con get para que me facilite las cosas por ahora

    if(isset($_GET['cerrar_sesion'])){
        session_unset();

        session_destroy();
    }

    //Revisar si hay sesión de rol

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location:php/vista/dashboard.php');
            break;

            case 2:
                header('location:php/vista/inter.php');
            break;

            default:
        }
    }

    //Autenticar a un usuario

    if(isset($POST['username']) && isset($POST['password'])){
        $username = $POST['username'];
        $password = $POST['password'];

        $db = new ConexionDB();
        $query = $db->ConexionDB::abrir_conexion()->prepare('SELECT * FROM funcionarios WHERE username = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);

        if($row == true){
            //validar el rol
            $rol = $row[1];
            $_SESSION['rol'] = $rol;

            switch($_SESSION['rol']){
                case 1:
                    header('Location:php/vista/dashboard.php');
                break;
    
                case 2:
                    header('Location:php/vista/inter.php');
                break;
    
                default:
            }

        }else{
            echo "El usuario o contraseña son incorrectos";
        }
    } 
?>
    <head>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->

        <script src="js/jquery-3.5.1.min.js"></script>
    </head>
    
<!--AQUI SOLO IRIA EL FORMULARIO DEL LOGIN-->
    <form method="POST" class="form-box" action="#">
        <a href="#" id="cerrar">X</a>
        <input type="text" id="username" placeholder="Usuario" required autofocus>
        <input type="password" id="password" placeholder="Contraseña" required>
        <button type="submit">Iniciar sesion </button>
        <div>
            <span id= "result"></span>
        </div>
    </form>