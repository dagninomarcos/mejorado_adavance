<?php
// Conectarse a la base de datos
include('config/db.php'); 

// Obtener el ID del comentario a actualizar
$id = $_GET["id"];

// Realizar la consulta a la base de datos
$sql = "SELECT * FROM actividades2t.actividades_revision WHERE id = $id;";
$resultado = mysqli_query($mysqli,$sql);

// Procesar los resultados
while ($fila = mysqli_fetch_assoc($resultado)) {
    // echo $fila['comentarios'];
    echo json_encode($fila) ;
}

// Cerrar la conexión a la base de datos
mysqli_close($mysqli);

?>
