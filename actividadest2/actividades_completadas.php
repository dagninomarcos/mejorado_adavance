<?php require('config/config.php')?>
<?php include('config/download.php')?>
<?php include('config/header.php')?>
<?php
// Verificar si hay errores de conexión
if (mysqli_connect_errno()) {
  echo "Error de conexión: " . mysqli_connect_error();
}

// Obtener los datos de la tabla 'ejemplo'
$sql = "SELECT * FROM actividades2t.actividades_revision where status='Completa';";

$resultado = mysqli_query($mysqli, $sql);

mysqli_close($mysqli);
?>
<body <?php include('config/body.php')?> >
<?php include('navbar.php');?>



<!-- Crear la tabla HTML -->
<table class="table table-striped-columns" style="background-color:rgba(74, 74, 74, 0.80);border-bottom:1px solid black;border-collapse:collapse;vertical-align: middle;">
  <thead>
    <tr>
      <th style="width:10px;background-color: rgba(211, 211, 211, 0.8);">id</th>
      <th style="width:450px;background-color: rgba(211, 211, 211, 0.8);">Descripcion Actividad</th>
      <th style="width:450px;background-color: rgba(211, 211, 211, 0.8);">comentarios</th>
      <th style="width:130px;background-color: rgba(211, 211, 211, 0.8);">fecha_creacion</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">fecha_revision</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">responsable</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">departamento</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">estatus</th>


    </tr>
  </thead>
    <tbody>
    <?php
    // Mostrar los datos de la tabla

    while ($fila = mysqli_fetch_assoc($resultado)) {
      echo "<tr>";
      echo "<td class='table-estilo'>" . $fila["id"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["actividad"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["comentarios"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["fecha_creacion"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["fecha_revision"] . "</td>";
      echo "<td class='table-estilo' style='font-family: arial black;'>" . $fila["responsable"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["departamento"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["status"] . "</td>";
      echo "</tr>";
      
    }
    ?>
  </tbody>
</table>


<?php include('config/footer.php')?>
</body> 
</html>