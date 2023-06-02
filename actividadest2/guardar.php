<?php
// Conectarse a la base de datos
include('config/db.php'); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los valores de usuario y contraseña del formulario
  $responsablevar = $_POST['responsablevar'];
  $actividadvar = $_POST['actividadvar'];
  $comentariosvar = $_POST['comentariosvar'];
  $fecha_creacionvar = $_POST['fecha_creacionvar'];
  $fecha_revisionvar = $_POST['fecha_revisionvar'];

$sql="
INSERT INTO `actividades2t`.`actividades_revision`
(`actividad`,
`comentarios`,
`fecha_creacion`,
`fecha_revision`,
`responsable`,
`departamento`,
`status`)
VALUES
('$actividadvar',
'$comentariosvar',
'$fecha_creacionvar',
'$fecha_revisionvar',
'$responsablevar',
(SELECT departamento FROM actividades2t.responsables where nombre='$responsablevar'),
'Proceso');
";
echo $sql;
mysqli_query($mysqli,$sql);
mysqli_close($mysqli);
  }
?>
