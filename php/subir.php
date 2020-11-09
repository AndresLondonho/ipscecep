<?php
$temp = $_FILES['img_user']['tmp_name'];
$nombre = 4444;
move_uploaded_file($temp, '../recursos/imgs/'.$nombre.".jpg");
?>

<form action="#" method="POST" enctype="multipart/form-data">
    <label>Imagen:</label>
    <br>
    <input type="file" name="img_user" required>
    <br>
    <input type="submit" value="enviar">
    
</form>