<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }

    echo '<h1 align=center>Bievenido usuario:' .$_SESSION["username"].'</h1>';
    echo '<p align=center><a href="logout.php">Logout</a></p>';

?>
