<?php
include('config/db.php');

$Area_Seleccionada = $_GET['Area'];
$semana = $_GET['semana']+1;
$mes = date('m')-1;
$anio = 2023;

// Consulta SQL para obtener los datos de la base de datos
$query = "SELECT 
              test_5s.comentarios.id,
              test_5s.comentarios.fecha,
              test_5s.comentarios.auditor,
              test_5s.comentarios.area,
              test_5s.comentarios.No_pregunta,
              test_5s.comentarios.Comentario,
              test_5s.preguntas.id_pregunta_grafica,
              test_5s.preguntas.pregunta,
              (WEEK(Fecha) - WEEK(Fecha - INTERVAL DAY(Fecha) DAY)) as cosa
          FROM comentarios
          INNER JOIN preguntas ON no_pregunta=id_pregunta
          WHERE (WEEK(Fecha) - WEEK(Fecha - INTERVAL DAY(Fecha) DAY)) = $semana-1
          AND Area = '$Area_Seleccionada'
          And month(Fecha)=$mes
          AND Comentario != ''
          ORDER BY id ASC";

$result = mysqli_query($mysqli, $query);
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}

// Función para buscar archivos de imagen en los subdirectorios
function buscarArchivos($directorio) {
  $archivos = glob($directorio . '/*');
  $imagenes = array();

  foreach ($archivos as $archivo) {
    if (is_file($archivo) && esArchivoImagen($archivo)) {
      $imagenes[] = $archivo;
    } elseif (is_dir($archivo)) {
      $imagenes = array_merge($imagenes, buscarArchivos($archivo));
    }
  }

  return $imagenes;
}

// Función para verificar si un archivo es una imagen
function esArchivoImagen($archivo) {
  $extensionesValidas = array('jpg', 'jpeg', 'png', 'gif');
  $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
  return in_array($extension, $extensionesValidas);
}

function obtenerDiasSemanaMes($semana, $mes, $anio) {
    // Crear un objeto DateTime para el primer día del mes
    $primerDiaMes = new DateTime();
    $primerDiaMes->setDate($anio, $mes, 1);

    // Obtener el día de la semana del primer día (1 = lunes, 7 = domingo)
    $diaSemana = $primerDiaMes->format('N');

    // Ajustar la fecha al primer día de la semana (lunes) de la semana especificada
    $primerDiaSemana = $primerDiaMes->modify('-' . ($diaSemana - 1) . ' days')->modify('+' . (($semana - 1) * 7) . ' days');

    // Generar los días de la semana en un array
    $diasSemana = array();
    for ($i = 0; $i < 7; $i++) {
        $dia = clone $primerDiaSemana;
        $diaSemana = $primerDiaSemana->format('N');
        
        if ($diaSemana >= 1 && $diaSemana <= 5) {
            $diasSemana[] = $dia->format('Y-m-d');
        }

        $primerDiaSemana->modify('+1 day');
    }

    return $diasSemana;
}
$fechas_semana = array();

$fechas = obtenerDiasSemanaMes($semana, $mes, $anio);

for ($i=0; $i < 5; $i++) { 
    $fechas_semana[$i]=$fechas[$i];
};

// Verificar la existencia de las carpetas y seleccionar la primera que exista
$directorio_base = '/var/www/html/fotos/5s_evidencias/';
$directorio_seleccionado = '';

foreach ($fechas_semana as $fecha) {
    $directorio = $directorio_base . $fecha . '-' . $Area_Seleccionada;
    if (is_dir($directorio)) {
        $directorio_seleccionado = $directorio;
        break;
    }
}

// Obtener la lista de archivos de imagen en el directorio de fotos
$archivos = array();
if (!empty($directorio_seleccionado)) {
    $archivos = buscarArchivos($directorio_seleccionado);
}

// Combinar los datos de la base de datos y la lista de archivos en la respuesta JSON
$response = array(
  'datos' => $data,
  'archivos' => $archivos
);

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($response);

mysqli_close($mysqli);
?>
