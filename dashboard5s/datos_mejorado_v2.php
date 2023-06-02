<?php
include('config/db.php');
$Area_Seleccionada=$_GET['Area'];
$Semana=$_GET['semana'];
$query ="
select 
test_5s.comentarios.id,
test_5s.comentarios.fecha,
test_5s.comentarios.auditor,
test_5s.comentarios.area,
test_5s.comentarios.No_pregunta,
test_5s.comentarios.Comentario,
test_5s.preguntas.id_pregunta_grafica,
test_5s.preguntas.pregunta  
from comentarios INNER join preguntas ON no_pregunta=id_pregunta where (week(Fecha)- week(Fecha - INTERVAL DAY(Fecha) DAY))='$Semana' and Area='$Area_Seleccionada' and Comentario!='' order by id ASC;
";

$result = mysqli_query($mysqli, $query);
 // var_dump($result);
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}

// var_dump($data);
//  echo json_encode($data);

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);


mysqli_free_result($result);

/* Close the connection as soon as it's no longer needed */
mysqli_close($mysqli);
?>
