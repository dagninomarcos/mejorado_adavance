<?php
// Conectamos a la base de datos
include('config/db.php'); 



// Obtenemos los valores de los campos del formulario
$id = $_POST["id"];
$nuevaFecha = $_POST["nuevaFecha"];
$nuevaComentario = $_POST['nuevaComentario'];
echo "<pre>";
print_r($_POST);
echo "</pre>";
// Insertamos los datos en la base de datos
$sql = "UPDATE `actividades2t`.`actividades_revision` SET `fecha_revision`  = '$nuevaFecha' , `comentarios` = '$nuevaComentario' WHERE `id` = $id;";
echo $sql;
mysqli_query($mysqli,$sql);


// Cerramos la conexión a la base de
mysqli_close($mysqli);
?>

