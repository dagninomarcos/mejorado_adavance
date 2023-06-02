<?php
// Conectar a la base de datos
include('config/db.php');
$fecha_sistema=date('Y-m-d');
// Verificar si hay errores de conexión
if (mysqli_connect_errno()) {
  echo "Error de conexión: " . mysqli_connect_error();
}

// Verificar si se recibió el ID del registro a actualizar
if (isset($_GET["status_dato"])) {
  $status_dato = $_GET["status_dato"];

  // Realizar la consulta SQL para actualizar el registro
  $sql = "INSERT IGNORE INTO `calidad`.`mes_registro` (`Fecha`, `Registro`) VALUES ('$fecha_sistema',$status_dato);";
  $resultado = mysqli_query($mysqli, $sql);

  // Verificar si la actualización fue exitosa
  if ($resultado) {
    echo "Registro actualizado correctamente";
  } else {
    echo "Error al actualizar el registro";
  }
}

// Cerrar la conexión con MySQL
mysqli_close($mysqli);
?>