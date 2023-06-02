<?php
// Conectarse a la base de datos
include('config/db.php'); 
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los valores de usuario y contraseña del formulario
  $username = $_POST['username'];
  $password = $_POST['password'];
// Realizar la consulta a la base de datos
$sql = "CALL LOGIN_REQUEST('$username','$password');";
$resultado = mysqli_query($mysqli,$sql);

// Procesar los resultados
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo $fila['LOGIN'];
}

// Cerrar la conexión a la base de datos
mysqli_close($mysqli);
}

?>