<?php require('config/config.php')?>
<?php
$carpeta_temporal='';
$carpeta_destino='';
// Comprobar si el usuario ha iniciado sesión
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: pagina_error.php'); // Redirigir a una página de error si no se ha iniciado sesión
    exit;
}
include('config/db.php');


// Verificar si el usuario ha iniciado sesión y si la clave 'username' existe en $_SESSION
if (isset($_SESSION['loggedin'], $_SESSION['username']) && $_SESSION['loggedin'] === true) {
    // Obtener el nombre de usuario de la variable de sesión
    $username = $_SESSION['username'];

    // Resto del código...
}

$query_preguntas ="SELECT * FROM test_5s.preguntas where no_cuestionario=1;";
$result_preguntas = mysqli_query($mysqli, $query_preguntas);
$data_preguntas= mysqli_fetch_all($result_preguntas,MYSQLI_ASSOC);
mysqli_free_result($result_preguntas);

$numero_aleatorio = mt_rand(0,1000000);

$cosa='';
if(isset($_GET['submite'])){
  $No_RandomIN=$_GET['No_random'];
  $Fecha=$_GET['Fecha'];
  // $Fecha='2023-05-31';
  $Auditor=$username;
  $Auditado=$_GET['Auditado'];
  $Area=$_GET['Area'];
  $C_Despejado[]=array_sum([intval($_GET['1SQ1']),intval($_GET['1SQ2']),intval($_GET['1SQ3']),intval($_GET['1SQ4']),intval($_GET['1SQ5']),intval($_GET['1SQ6']),intval($_GET['1SQ7'])]);
  $C_Organizar[]=array_sum([intval($_GET['2SQ1']),intval($_GET['2SQ2']),intval($_GET['2SQ3']),intval($_GET['2SQ4']),intval($_GET['2SQ5']),intval($_GET['2SQ6']),intval($_GET['2SQ7']),intval($_GET['2SQ8'])]);
  $C_Limpiar[]=array_sum([intval($_GET['3SQ1']),intval($_GET['3SQ2']),intval($_GET['3SQ3']),intval($_GET['3SQ4']),intval($_GET['3SQ5']),intval($_GET['3SQ6']),intval($_GET['3SQ7'])]);
  $C_Estandarizar[]=array_sum([intval($_GET['4SQ1']),intval($_GET['4SQ2']),intval($_GET['4SQ3']),intval($_GET['4SQ4']),intval($_GET['4SQ5']),intval($_GET['4SQ6']),intval($_GET['4SQ7'])]);
  $C_Disciplina[]=array_sum([intval($_GET['5SQ1']),intval($_GET['5SQ2']),intval($_GET['5SQ3']),intval($_GET['5SQ4']),intval($_GET['5SQ5']),intval($_GET['5SQ6']),intval($_GET['5SQ7'])]);
  $C_Seguridad[]=array_sum([intval($_GET['6SQ1']),intval($_GET['6SQ2']),intval($_GET['6SQ3']),intval($_GET['6SQ4']),intval($_GET['6SQ5']),intval($_GET['6SQ6']),intval($_GET['6SQ7'])]);
//1S
  if (isset($_GET['1SQ1-Coment'])) {
    $C_1SQ1 = str_replace('\'', '"', $_GET['1SQ1-Coment']);
} else {
    $C_1SQ1 = "";

}if (isset($_GET['1SQ2-Coment'])) {
    $C_1SQ2 = str_replace('\'', '"', $_GET['1SQ2-Coment']);
} else {
    $C_1SQ2 = "";
}

if (isset($_GET['1SQ3-Coment'])) {
    $C_1SQ3 = str_replace('\'', '"', $_GET['1SQ3-Coment']);
} else {
    $C_1SQ3 = "";
}

if (isset($_GET['1SQ4-Coment'])) {
    $C_1SQ4 = str_replace('\'', '"', $_GET['1SQ4-Coment']);
} else {
    $C_1SQ4 = "";
}

if (isset($_GET['1SQ5-Coment'])) {
    $C_1SQ5 = str_replace('\'', '"', $_GET['1SQ5-Coment']);
} else {
    $C_1SQ5 = "";
}

if (isset($_GET['1SQ6-Coment'])) {
    $C_1SQ6 = str_replace('\'', '"', $_GET['1SQ6-Coment']);
} else {
    $C_1SQ6 = "";
}

if (isset($_GET['1SQ7-Coment'])) {
    $C_1SQ7 = str_replace('\'', '"', $_GET['1SQ7-Coment']);
} else {
    $C_1SQ7 = "";
}

  $R_1SQ1=intval($_GET['1SQ1']);
  $R_1SQ2=intval($_GET['1SQ2']);
  $R_1SQ3=intval($_GET['1SQ3']);
  $R_1SQ4=intval($_GET['1SQ4']);
  $R_1SQ5=intval($_GET['1SQ5']);
  $R_1SQ6=intval($_GET['1SQ6']);
  $R_1SQ7=intval($_GET['1SQ7']);
//2S
if (isset($_GET['2SQ1-Coment'])) {
    $C_2SQ1 = str_replace('\'', '"', $_GET['2SQ1-Coment']);
} else {
    $C_2SQ1 = "";
}

if (isset($_GET['2SQ2-Coment'])) {
    $C_2SQ2 = str_replace('\'', '"', $_GET['2SQ2-Coment']);
} else {
    $C_2SQ2 = "";
}

if (isset($_GET['2SQ3-Coment'])) {
    $C_2SQ3 = str_replace('\'', '"', $_GET['2SQ3-Coment']);
} else {
    $C_2SQ3 = "";
}

if (isset($_GET['2SQ4-Coment'])) {
    $C_2SQ4 = str_replace('\'', '"', $_GET['2SQ4-Coment']);
} else {
    $C_2SQ4 = "";
}

if (isset($_GET['2SQ5-Coment'])) {
    $C_2SQ5 = str_replace('\'', '"', $_GET['2SQ5-Coment']);
} else {
    $C_2SQ5 = "";
}

if (isset($_GET['2SQ6-Coment'])) {
    $C_2SQ6 = str_replace('\'', '"', $_GET['2SQ6-Coment']);
} else {
    $C_2SQ6 = "";
}

if (isset($_GET['2SQ7-Coment'])) {
    $C_2SQ7 = str_replace('\'', '"', $_GET['2SQ7-Coment']);
} else {
    $C_2SQ7 = "";
}

if (isset($_GET['2SQ8-Coment'])) {
    $C_2SQ8 = str_replace('\'', '"', $_GET['2SQ8-Coment']);
} else {
    $C_2SQ8 = "";
}

$R_2SQ1=intval($_GET['2SQ1']);
$R_2SQ2=intval($_GET['2SQ2']);
$R_2SQ3=intval($_GET['2SQ3']);
$R_2SQ4=intval($_GET['2SQ4']);
$R_2SQ5=intval($_GET['2SQ5']);
$R_2SQ6=intval($_GET['2SQ6']);
$R_2SQ7=intval($_GET['2SQ7']);
$R_2SQ8=intval($_GET['2SQ8']);
//3S
if (isset($_GET['3SQ1-Coment'])) {
    $C_3SQ1 = str_replace('\'', '"', $_GET['3SQ1-Coment']);
} else {
    $C_3SQ1 = "";
}

if (isset($_GET['3SQ2-Coment'])) {
    $C_3SQ2 = str_replace('\'', '"', $_GET['3SQ2-Coment']);
} else {
    $C_3SQ2 = "";
}

if (isset($_GET['3SQ3-Coment'])) {
    $C_3SQ3 = str_replace('\'', '"', $_GET['3SQ3-Coment']);
} else {
    $C_3SQ3 = "";
}
if (isset($_GET['3SQ4-Coment'])) {
    $C_3SQ4 = str_replace('\'', '"', $_GET['3SQ4-Coment']);
} else {
    $C_3SQ4 = "";
}

if (isset($_GET['3SQ5-Coment'])) {
    $C_3SQ5 = str_replace('\'', '"', $_GET['3SQ5-Coment']);
} else {
    $C_3SQ5 = "";
}

if (isset($_GET['3SQ6-Coment'])) {
    $C_3SQ6 = str_replace('\'', '"', $_GET['3SQ6-Coment']);
} else {
    $C_3SQ6 = "";
}

if (isset($_GET['3SQ7-Coment'])) {
    $C_3SQ7 = str_replace('\'', '"', $_GET['3SQ7-Coment']);
} else {
    $C_3SQ7 = "";
}

$R_3SQ1=intval($_GET['3SQ1']);
$R_3SQ2=intval($_GET['3SQ2']);
$R_3SQ3=intval($_GET['3SQ3']);
$R_3SQ4=intval($_GET['3SQ4']);
$R_3SQ5=intval($_GET['3SQ5']);
$R_3SQ6=intval($_GET['3SQ6']);
$R_3SQ7=intval($_GET['3SQ7']);
//4S
if (isset($_GET['4SQ1-Coment'])) {
    $C_4SQ1 = str_replace('\'', '"', $_GET['4SQ1-Coment']);
} else {
    $C_4SQ1 = "";
}

if (isset($_GET['4SQ2-Coment'])) {
    $C_4SQ2 = str_replace('\'', '"', $_GET['4SQ2-Coment']);
} else {
    $C_4SQ2 = "";
}

if (isset($_GET['4SQ3-Coment'])) {
    $C_4SQ3 = str_replace('\'', '"', $_GET['4SQ3-Coment']);
} else {
    $C_4SQ3 = "";
}

if (isset($_GET['4SQ4-Coment'])) {
    $C_4SQ4 = str_replace('\'', '"', $_GET['4SQ4-Coment']);
} else {
    $C_4SQ4 = "";
}

if (isset($_GET['4SQ5-Coment'])) {
    $C_4SQ5 = str_replace('\'', '"', $_GET['4SQ5-Coment']);
} else {
    $C_4SQ5 = "";
}

if (isset($_GET['4SQ6-Coment'])) {
    $C_4SQ6 = str_replace('\'', '"', $_GET['4SQ6-Coment']);
} else {
    $C_4SQ6 = "";
}

if (isset($_GET['4SQ7-Coment'])) {
    $C_4SQ7 = str_replace('\'', '"', $_GET['4SQ7-Coment']);
} else {
    $C_4SQ7 = "";
}

$R_4SQ1=intval($_GET['4SQ1']);
$R_4SQ2=intval($_GET['4SQ2']);
$R_4SQ3=intval($_GET['4SQ3']);
$R_4SQ4=intval($_GET['4SQ4']);
$R_4SQ5=intval($_GET['4SQ5']);
$R_4SQ6=intval($_GET['4SQ6']);
$R_4SQ7=intval($_GET['4SQ7']);
//5S
if (isset($_GET['5SQ1-Coment'])) {
    $C_5SQ1 = str_replace('\'', '"', $_GET['5SQ1-Coment']);
} else {
    $C_5SQ1 = "";
}

if (isset($_GET['5SQ2-Coment'])) {
    $C_5SQ2 = str_replace('\'', '"', $_GET['5SQ2-Coment']);
} else {
    $C_5SQ2 = "";
}

if (isset($_GET['5SQ3-Coment'])) {
    $C_5SQ3 = str_replace('\'', '"', $_GET['5SQ3-Coment']);
} else {
    $C_5SQ3 = "";
}

if (isset($_GET['5SQ4-Coment'])) {
    $C_5SQ4 = str_replace('\'', '"', $_GET['5SQ4-Coment']);
} else {
    $C_5SQ4 = "";
}

if (isset($_GET['5SQ5-Coment'])) {
    $C_5SQ5 = str_replace('\'', '"', $_GET['5SQ5-Coment']);
} else {
    $C_5SQ5 = "";
}

if (isset($_GET['5SQ6-Coment'])) {
    $C_5SQ6 = str_replace('\'', '"', $_GET['5SQ6-Coment']);
} else {
    $C_5SQ6 = "";
}

if (isset($_GET['5SQ7-Coment'])) {
    $C_5SQ7 = str_replace('\'', '"', $_GET['5SQ7-Coment']);
} else {
    $C_5SQ7 = "";
}

$R_5SQ1=intval($_GET['5SQ1']);
$R_5SQ2=intval($_GET['5SQ2']);
$R_5SQ3=intval($_GET['5SQ3']);
$R_5SQ4=intval($_GET['5SQ4']);
$R_5SQ5=intval($_GET['5SQ5']);
$R_5SQ6=intval($_GET['5SQ6']);
$R_5SQ7=intval($_GET['5SQ7']);
//6S
if (isset($_GET['6SQ1-Coment'])) {
    $C_6SQ1 = str_replace('\'', '"', $_GET['6SQ1-Coment']);
} else {
    $C_6SQ1 = "";
}

if (isset($_GET['6SQ2-Coment'])) {
    $C_6SQ2 = str_replace('\'', '"', $_GET['6SQ2-Coment']);
} else {
    $C_6SQ2 = "";
}

if (isset($_GET['6SQ3-Coment'])) {
    $C_6SQ3 = str_replace('\'', '"', $_GET['6SQ3-Coment']);
} else {
    $C_6SQ3 = "";
}

if (isset($_GET['6SQ4-Coment'])) {
    $C_6SQ4 = str_replace('\'', '"', $_GET['6SQ4-Coment']);
} else {
    $C_6SQ4 = "";
}

if (isset($_GET['6SQ5-Coment'])) {
    $C_6SQ5 = str_replace('\'', '"', $_GET['6SQ5-Coment']);
} else {
    $C_6SQ5 = "";
}

if (isset($_GET['6SQ6-Coment'])) {
    $C_6SQ6 = str_replace('\'', '"', $_GET['6SQ6-Coment']);
} else {
    $C_6SQ6 = "";
}

if (isset($_GET['6SQ7-Coment'])) {
    $C_6SQ7 = str_replace('\'', '"', $_GET['6SQ7-Coment']);
} else {
    $C_6SQ7 = "";
}

$R_6SQ1=intval($_GET['6SQ1']);
$R_6SQ2=intval($_GET['6SQ2']);
$R_6SQ3=intval($_GET['6SQ3']);
$R_6SQ4=intval($_GET['6SQ4']);
$R_6SQ5=intval($_GET['6SQ5']);
$R_6SQ6=intval($_GET['6SQ6']);
$R_6SQ7=intval($_GET['6SQ7']);

$query_verificar="SELECT * FROM test_5s.test_data_5s where week(Fecha)=week('$Fecha') and Area='$Area';";
// echo $query_verificar;
$array_existe=mysqli_query($mysqli,$query_verificar);
$existe=mysqli_fetch_all($array_existe,MYSQLI_NUM);
// echo json_encode($existe);
mysqli_free_result($array_existe);

if (empty($existe[0])) {
$sql ="INSERT INTO `test_data_5s` (`Fecha`, `Auditor`,`Auditado`, `Area`, `C_Despejar`, `C_Organizar`, `C_Limpiar`, `C_Estandarizar`, `C_Disciplina`, `C_Seguridad`) VALUES ('$Fecha', '$Auditor','$Auditado', '$Area', '$C_Despejado[0]', '$C_Organizar[0]', '$C_Limpiar[0]', '$C_Estandarizar[0]', '$C_Disciplina[0]', '$C_Seguridad[0]');";

$sql .="INSERT INTO `test_5s`.`comentarios`
(`Fecha`,`Auditor`,`Area`,`No_Pregunta`,`Comentario`)
VALUES
('$Fecha','$Auditor','$Area','1SQ1','$C_1SQ1'),('$Fecha','$Auditor','$Area','1SQ2','$C_1SQ2'),('$Fecha','$Auditor','$Area','1SQ3','$C_1SQ3'),
('$Fecha','$Auditor','$Area','1SQ4','$C_1SQ4'),('$Fecha','$Auditor','$Area','1SQ5','$C_1SQ5'),('$Fecha','$Auditor','$Area','1SQ6','$C_1SQ6'),
('$Fecha','$Auditor','$Area','1SQ7','$C_1SQ7'),

('$Fecha','$Auditor','$Area','2SQ1','$C_2SQ1'),('$Fecha','$Auditor','$Area','2SQ2','$C_2SQ2'),('$Fecha','$Auditor','$Area','2SQ3','$C_2SQ3'),
('$Fecha','$Auditor','$Area','2SQ4','$C_2SQ4'),('$Fecha','$Auditor','$Area','2SQ5','$C_2SQ5'),('$Fecha','$Auditor','$Area','2SQ6','$C_2SQ6'),
('$Fecha','$Auditor','$Area','2SQ7','$C_2SQ7'),('$Fecha','$Auditor','$Area','2SQ8','$C_2SQ8'),

('$Fecha','$Auditor','$Area','3SQ1','$C_3SQ1'),('$Fecha','$Auditor','$Area','3SQ2','$C_3SQ2'),('$Fecha','$Auditor','$Area','3SQ3','$C_3SQ3'),
('$Fecha','$Auditor','$Area','3SQ4','$C_3SQ4'),('$Fecha','$Auditor','$Area','3SQ5','$C_3SQ5'),('$Fecha','$Auditor','$Area','3SQ6','$C_3SQ6'),
('$Fecha','$Auditor','$Area','3SQ7','$C_3SQ7'),

('$Fecha','$Auditor','$Area','4SQ1','$C_4SQ1'),('$Fecha','$Auditor','$Area','4SQ2','$C_4SQ2'),('$Fecha','$Auditor','$Area','4SQ3','$C_4SQ3'),
('$Fecha','$Auditor','$Area','4SQ4','$C_4SQ4'),('$Fecha','$Auditor','$Area','4SQ5','$C_4SQ5'),('$Fecha','$Auditor','$Area','4SQ6','$C_4SQ6'),
('$Fecha','$Auditor','$Area','4SQ7','$C_4SQ7'),

('$Fecha','$Auditor','$Area','5SQ1','$C_5SQ1'),('$Fecha','$Auditor','$Area','5SQ2','$C_5SQ2'),('$Fecha','$Auditor','$Area','5SQ3','$C_5SQ3'),
('$Fecha','$Auditor','$Area','5SQ4','$C_5SQ4'),('$Fecha','$Auditor','$Area','5SQ5','$C_5SQ5'),('$Fecha','$Auditor','$Area','5SQ6','$C_5SQ6'),
('$Fecha','$Auditor','$Area','5SQ7','$C_5SQ7'),

('$Fecha','$Auditor','$Area','6SQ1','$C_6SQ1'),('$Fecha','$Auditor','$Area','6SQ2','$C_6SQ2'),('$Fecha','$Auditor','$Area','6SQ3','$C_6SQ3'),
('$Fecha','$Auditor','$Area','6SQ4','$C_6SQ4'),('$Fecha','$Auditor','$Area','6SQ5','$C_6SQ5'),('$Fecha','$Auditor','$Area','6SQ6','$C_6SQ6'),
('$Fecha','$Auditor','$Area','6SQ7','$C_6SQ7');";


$sql .="INSERT INTO `test_5s`.`questions`(`FechaIN`,`AreaIN`,`AuditarIN`,`AuditadoIN`,`S1Q1`,`S1Q2`,`S1Q3`,`S1Q4`,`S1Q5`,`S1Q6`,`S1Q7`,`S2Q1`,`S2Q2`,`S2Q3`,`S2Q4`,`S2Q5`,`S2Q6`,`S2Q7`,`S2Q8`,`S3Q1`,`S3Q2`,`S3Q3`,`S3Q4`,`S3Q5`,`S3Q6`,`S3Q7`,`S4Q1`,`S4Q2`,`S4Q3`,`S4Q4`,`S4Q5`,`S4Q6`,`S4Q7`,`S5Q1`,`S5Q2`,`S5Q3`,`S5Q4`,`S5Q5`,`S5Q6`,`S5Q7`,`S6Q1`,`S6Q2`,`S6Q3`,`S6Q4`,`S6Q5`,`S6Q6`,`S6Q7`)VALUES
('$Fecha','$Area','$Auditor','$Auditado',$R_1SQ1,$R_1SQ2,$R_1SQ3,$R_1SQ4,$R_1SQ5,$R_1SQ6,$R_1SQ7,$R_2SQ1,$R_2SQ2,$R_2SQ3,$R_2SQ4,$R_2SQ5,$R_2SQ6,$R_2SQ7,$R_2SQ8,$R_3SQ1,$R_3SQ2,$R_3SQ3,$R_3SQ4,$R_3SQ5,$R_3SQ6,$R_3SQ7,$R_4SQ1,$R_4SQ2,$R_4SQ3,$R_4SQ4,$R_4SQ5,$R_4SQ6,$R_4SQ7,$R_5SQ1,$R_5SQ2,$R_5SQ3,$R_5SQ4,$R_5SQ5,$R_5SQ6,$R_5SQ7,$R_6SQ1,$R_6SQ2,$R_6SQ3,$R_6SQ4,$R_6SQ5,$R_6SQ6,$R_6SQ7);";

mysqli_multi_query($mysqli,$sql);
    // Carpeta temporal
    

// function moverArchivos($origen, $destino) {
//     // Mover los archivos y carpetas de manera recursiva
//     $iterator = new RecursiveIteratorIterator(
//         new RecursiveDirectoryIterator($origen, RecursiveDirectoryIterator::SKIP_DOTS),
//         RecursiveIteratorIterator::SELF_FIRST
//     );

//     foreach ($iterator as $objeto) {
//         $destinoCompleto = $destino . '/' . $iterator->getSubPathName();

//         if ($objeto->isDir()) {
//             mkdir($destinoCompleto);
//         } else {
//             rename($objeto, $destinoCompleto);
//         }
//     }
// }
function moverArchivos($origen, $destino) {
    // Verificar si la carpeta de origen existe
    if (!is_dir($origen)) {
        return;
    }

    // Mover los archivos y carpetas de manera recursiva
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($origen, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $objeto) {
        $destinoCompleto = $destino . '/' . $iterator->getSubPathName();

        if ($objeto->isDir()) {
            mkdir($destinoCompleto);
        } else {
            rename($objeto, $destinoCompleto);
        }
    }
}

function eliminarCarpetasVacias($carpeta) {
    // Eliminar carpetas vacías de manera recursiva
    $files = glob($carpeta . '/*');
    foreach ($files as $file) {
        if (is_dir($file)) {
            eliminarCarpetasVacias($file);
            if (count(glob($file . '/*')) === 0) {
                rmdir($file);
            }
        }
    }
}

$carpeta_temporal = '/var/www/html/fotos/5s_evidencias/temporal/'.$No_RandomIN; // Ruta completa de la carpeta temporal
$carpeta_destino = '/var/www/html/fotos/5s_evidencias/'. $Fecha . '-' . $Area; // Ruta completa de la carpeta de destino

// Crear la carpeta de destino si no existe
if (!file_exists($carpeta_destino)) {
    mkdir($carpeta_destino, 0777, true);
}

// Mover los archivos y carpetas de la carpeta temporal a la carpeta de destino
moverArchivos($carpeta_temporal, $carpeta_destino);

// Eliminar las carpetas vacías dentro de la carpeta temporal
eliminarCarpetasVacias($carpeta_temporal);

// Eliminar la carpeta temporal
if (is_dir($carpeta_temporal)) {
    rmdir($carpeta_temporal);
}




  }
  

  else{
    $cosa = 'pelas';
  }  

$_SESSION = array(); // Limpiar todas las variables de sesión
session_destroy(); // Destruir la sesión actual

// Redirigir al usuario a la página de inicio de sesión después de cerrar sesión
header('Location: index.php');
exit;
}

?>



<?php include('config/header.php')?>
<style>
td, th {
  padding: 1rem;
}
table {
    border-spacing: 5px;
}
table, td, th {
  border: 1px solid;

}   

.stilo-preguntas{
  text-align: center;
  font-family: arial black;
  font-size: 13px;
  width: 740px;
}
.grid-container-evaluacion{
  display: flex;
  grid-template-columns: 1fr;

} 

.main_evaluacion{
  display: grid;
  grid-template-columns: auto;

  align-content: center;
/*  background-color: white;*/
  padding: .5rem;
  flex: 10 10 100px;
  align-items: center;
  justify-content: center;
  margin: 4px;
}
.popup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1;
  background: white;
  padding: 20px;
  box-shadow: 0px 0px 5px grey;
  display: none;
}

.popup label {
  display: block;
  margin-bottom: 5px;
}

.popup input, .popup select {
  display: block;
  margin-bottom: 10px;
  width: 100%;
}

.popup button {
  margin-top: 10px;
}

.popup #closeButton {
  position: absolute;
  top: -5px;
  right: 5px;
  border: 1px solid black;
  border-radius: 1rem;
}

.square {
  height: 35px;
  width: 180px;
  font-family: arial black;
  color: white;
  text-align: center;
  vertical-align: middle;
  border: 3px solid white;
  border-radius: 1rem;
}

.container-signal{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 1fr;
/*    background-color: white;*/
    }
.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
body{
  padding-top: 63px;
}

.upload-popup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
}

.upload-popup-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fff;
  padding: 20px;
  text-align: center;
  border-radius: 5px;
}

.upload-popup-content h2 {
  margin-bottom: 20px;
}
textarea {
  resize: none;
}
</style>
<script>
    function hello() {
        alert('Este registro ya esta agreago por esta semana');
    }
    function toggleComentarios(rowId, optionValue) {
    var comentariosInput = document.getElementById(rowId + '-Coment');
    if (optionValue === '0') {
        comentariosInput.required = true;
        // comentariosInput.disabled = false;
    } 
    if (optionValue === '1') {
        comentariosInput.required = false;
        // comentariosInput.disabled = true;
        comentariosInput.value = '';
    }
}
</script>
<body <?php include('config/body.php')?> >

<?php include('navbar.php');?>
<?php if($cosa=='pelas'){
  echo '<script>
    hello();
    </script>';
  }?>
<div class="main">
  <aside class="left_general">
    
  </aside>
<main class="main_evaluacion">

<div class="grid-container-evaluacion">
  <form>
<!-- tabla 1s  -->
<table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">No.</th>
      <th scope="col" style="text-align:center;">1'S DESPEJAR:"Mantener solo lo necesario"</th>
      <th scope="col" style="width:160px;">Abreviacion>
      <th scope="col">SI</th>
      <th scope="col">NO</th>
      <th scope="col">Comentarios</th>
      <th scope="col">Evidencia</th>
    </tr>
  </thead>
  <tbody>
<?php
   for ($i=0; $i < 7; $i++) { 
     echo '<tr class="table-light">';
     echo '<th scope="row">' . $data_preguntas[$i]['id'] . '</th>';
     echo '<th><p class="stilo-preguntas">' . $data_preguntas[$i]['pregunta'] . '</p></td>';
     echo '<td><p>' .$data_preguntas[$i]['id_pregunta_grafica'] .'</p></td>';
     echo '<td><input class="form-check-input" type="radio" name="' .$data_preguntas[$i]['id_pregunta']. '"id="'.$data_preguntas[$i]['id_pregunta'].'-1" value="1" required ></td>';
     echo '<td><input class="form-check-input" type="radio" name="'.$data_preguntas[$i]['id_pregunta'].'" id="'.$data_preguntas[$i]['id_pregunta'].'-0" value="0" required></td>';
     echo '<td><textarea id="'.$data_preguntas[$i]['id_pregunta'].'-Coment" name="'.$data_preguntas[$i]['id_pregunta'].'-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>';
     echo '<td><button type="button" id="evidencia'.$data_preguntas[$i]['id'].'" style="width:110%; height: 50px" onclick="openUploadPopup(\'S1\','.$data_preguntas[$i]['id'].',\''.$data_preguntas[$i]['id_pregunta_grafica'].'\')">Subir<br>Evidencia</button></td>';

     echo '<script>';
    echo 'document.getElementById("' . $data_preguntas[$i]['id_pregunta'] . '-1").addEventListener("change", function() { toggleComentarios("' . $data_preguntas[$i]['id_pregunta'] . '", this.value); });';
    echo 'document.getElementById("' . $data_preguntas[$i]['id_pregunta'] . '-0").addEventListener("change", function() { toggleComentarios("' . $data_preguntas[$i]['id_pregunta'] . '", this.value); });';
    echo '</script>';

      }
?>    
  </tbody>
</table>
<!-- tabla 2s -->
<table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">No.</th>
      <th scope="col" style="text-align:center;">2'S ORGANIZAR:"Un lugar para cada cosa y cada cosa para su lugar"</th>
      <th scope="col" style="width:160px;">Abreviacion</th>
      <th scope="col">SI</th>
      <th scope="col">NO</th>
      <th scope="col">Comentarios</th>
      <th scope="col">Evidencia</th>
    </tr>
  </thead>
  <tbody>
<?php
   for ($i=7; $i < 15; $i++) { 
     echo '<tr class="table-light">';
     echo '<th scope="row">' . $data_preguntas[$i]['id'] . '</th>';
     echo '<th><p class="stilo-preguntas">' . $data_preguntas[$i]['pregunta'] . '</p></td>';
     echo '<td><p>' .$data_preguntas[$i]['id_pregunta_grafica'] .'</p></td>';
     echo '<td><input class="form-check-input" type="radio" name="' .$data_preguntas[$i]['id_pregunta']. '"id="'.$data_preguntas[$i]['id_pregunta'].'-1" value="1" required ></td>';
     echo '<td><input class="form-check-input" type="radio" name="'.$data_preguntas[$i]['id_pregunta'].'" id="'.$data_preguntas[$i]['id_pregunta'].'-0" value="0" required></td>';
     echo '<td><textarea id="'.$data_preguntas[$i]['id_pregunta'].'-Coment" name="'.$data_preguntas[$i]['id_pregunta'].'-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>';
     echo '<td><button type="button" id="evidencia'.$data_preguntas[$i]['id'].'" style="width:110%; height: 50px" onclick="openUploadPopup(\'S2\','.$data_preguntas[$i]['id'].',\''.$data_preguntas[$i]['id_pregunta_grafica'].'\')">Subir<br>Evidencia</button></td>';

     echo '<script>';
    echo 'document.getElementById("' . $data_preguntas[$i]['id_pregunta'] . '-1").addEventListener("change", function() { toggleComentarios("' . $data_preguntas[$i]['id_pregunta'] . '", this.value); });';
    echo 'document.getElementById("' . $data_preguntas[$i]['id_pregunta'] . '-0").addEventListener("change", function() { toggleComentarios("' . $data_preguntas[$i]['id_pregunta'] . '", this.value); });';
    echo '</script>';

      }
?>    
  </tbody>
</table>

<!-- tabla 3s -->
<table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">No.</th>
      <th scope="col" style="text-align:center;">3'S LIMPIEZA:"Un area de trabajo impecable"</th>
      <th scope="col" style="width:160px;">Abreviacion</th>
      <th scope="col">SI</th>
      <th scope="col">NO</th>
      <th scope="col">Comentarios</th>
      <th scope="col">Evidencia</th>
    </tr>
  </thead>
  <tbody>
<?php
   for ($i=15; $i < 22; $i++) { 
     echo '<tr class="table-light">';
     echo '<th scope="row">' . $data_preguntas[$i]['id'] . '</th>';
     echo '<th><p class="stilo-preguntas">' . $data_preguntas[$i]['pregunta'] . '</p></td>';
     echo '<td><p>' .$data_preguntas[$i]['id_pregunta_grafica'] .'</p></td>';
     echo '<td><input class="form-check-input" type="radio" name="' .$data_preguntas[$i]['id_pregunta']. '"id="'.$data_preguntas[$i]['id_pregunta'].'-1" value="1" required ></td>';
     echo '<td><input class="form-check-input" type="radio" name="'.$data_preguntas[$i]['id_pregunta'].'" id="'.$data_preguntas[$i]['id_pregunta'].'-0" value="0" required></td>';
     echo '<td><textarea id="'.$data_preguntas[$i]['id_pregunta'].'-Coment" name="'.$data_preguntas[$i]['id_pregunta'].'-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>';
     echo '<td><button type="button" id="evidencia'.$data_preguntas[$i]['id'].'" style="width:110%; height: 50px" onclick="openUploadPopup(\'S3\','.$data_preguntas[$i]['id'].',\''.$data_preguntas[$i]['id_pregunta_grafica'].'\')">Subir<br>Evidencia</button></td>';

     echo '<script>';
    echo 'document.getElementById("' . $data_preguntas[$i]['id_pregunta'] . '-1").addEventListener("change", function() { toggleComentarios("' . $data_preguntas[$i]['id_pregunta'] . '", this.value); });';
    echo 'document.getElementById("' . $data_preguntas[$i]['id_pregunta'] . '-0").addEventListener("change", function() { toggleComentarios("' . $data_preguntas[$i]['id_pregunta'] . '", this.value); });';
    echo '</script>';

      }
?>    
  </tbody>
</table>

<!-- tabla 4s -->
<table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">No.</th>
      <th scope="col" style="text-align:center;">4'S ESTANDARIZAR:"Todo siempre igual"</th>
      <th scope="col" style="width:160px;">Abreviacion</th>
      <th scope="col">SI</th>
      <th scope="col">NO</th>
      <th scope="col">Comentarios</th>
      <th scope="col">Evidencia</th>
    </tr>
  </thead>
  <tbody>
<?php
   for ($i=22; $i < 29; $i++) { 
     echo '<tr class="table-light">';
     echo '<th scope="row">' . $data_preguntas[$i]['id'] . '</th>';
     echo '<th><p class="stilo-preguntas">' . $data_preguntas[$i]['pregunta'] . '</p></td>';
     echo '<td><p>' .$data_preguntas[$i]['id_pregunta_grafica'] .'</p></td>';
     echo '<td><input class="form-check-input" type="radio" name="' .$data_preguntas[$i]['id_pregunta']. '"id="'.$data_preguntas[$i]['id_pregunta'].'-1" value="1" required ></td>';
     echo '<td><input class="form-check-input" type="radio" name="'.$data_preguntas[$i]['id_pregunta'].'" id="'.$data_preguntas[$i]['id_pregunta'].'-0" value="0" required></td>';
     echo '<td><textarea id="'.$data_preguntas[$i]['id_pregunta'].'-Coment" name="'.$data_preguntas[$i]['id_pregunta'].'-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>';
     echo '<td><button type="button" id="evidencia'.$data_preguntas[$i]['id'].'" style="width:110%; height: 50px" onclick="openUploadPopup(\'S4\','.$data_preguntas[$i]['id'].',\''.$data_preguntas[$i]['id_pregunta_grafica'].'\')">Subir<br>Evidencia</button></td>';

     echo '<script>';
    echo 'document.getElementById("' . $data_preguntas[$i]['id_pregunta'] . '-1").addEventListener("change", function() { toggleComentarios("' . $data_preguntas[$i]['id_pregunta'] . '", this.value); });';
    echo 'document.getElementById("' . $data_preguntas[$i]['id_pregunta'] . '-0").addEventListener("change", function() { toggleComentarios("' . $data_preguntas[$i]['id_pregunta'] . '", this.value); });';
    echo '</script>';

      }
?>    
  </tbody>
</table>

<!-- tabla 5s -->
<table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">No.</th>
      <th scope="col" style="text-align:center;">5'S DISCIPLINA:"Seguir las reglas y ser consistente"</th>
      <th scope="col" style="width:160px;">Abreviacion</th>
      <th scope="col">SI</th>
      <th scope="col">NO</th>
      <th scope="col">Comentarios</th>
      <th scope="col">Evidencia</th>
    </tr>
  </thead>
  <tbody>
<?php
   for ($i=29; $i < 36; $i++) { 
     echo '<tr class="table-light">';
     echo '<th scope="row">' . $data_preguntas[$i]['id'] . '</th>';
     echo '<th><p class="stilo-preguntas">' . $data_preguntas[$i]['pregunta'] . '</p></td>';
     echo '<td><p>' .$data_preguntas[$i]['id_pregunta_grafica'] .'</p></td>';
     echo '<td><input class="form-check-input" type="radio" name="' .$data_preguntas[$i]['id_pregunta']. '"id="'.$data_preguntas[$i]['id_pregunta'].'-1" value="1" required ></td>';
     echo '<td><input class="form-check-input" type="radio" name="'.$data_preguntas[$i]['id_pregunta'].'" id="'.$data_preguntas[$i]['id_pregunta'].'-0" value="0" required></td>';
     echo '<td><textarea id="'.$data_preguntas[$i]['id_pregunta'].'-Coment" name="'.$data_preguntas[$i]['id_pregunta'].'-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>';
     echo '<td><button type="button" id="evidencia'.$data_preguntas[$i]['id'].'" style="width:110%; height: 50px" onclick="openUploadPopup(\'S5\','.$data_preguntas[$i]['id'].',\''.$data_preguntas[$i]['id_pregunta_grafica'].'\')">Subir<br>Evidencia</button></td>';

     echo '<script>';
    echo 'document.getElementById("' . $data_preguntas[$i]['id_pregunta'] . '-1").addEventListener("change", function() { toggleComentarios("' . $data_preguntas[$i]['id_pregunta'] . '", this.value); });';
    echo 'document.getElementById("' . $data_preguntas[$i]['id_pregunta'] . '-0").addEventListener("change", function() { toggleComentarios("' . $data_preguntas[$i]['id_pregunta'] . '", this.value); });';
    echo '</script>';

      }
?>    
  </tbody>
</table>

<!-- tabla 6s -->
<table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">No.</th>
      <th scope="col" style="text-align:center;">6'S SEGURIDAD</th>
      <th scope="col" style="width:160px;">Abreviacion</th>
      <th scope="col">SI</th>
      <th scope="col">NO</th>
      <th scope="col">Comentarios</th>
      <th scope="col">Evidencia</th>
    </tr>
  </thead>
  <tbody>
<?php
   for ($i=36; $i < 43; $i++) { 
     echo '<tr class="table-light">';
     echo '<th scope="row">' . $data_preguntas[$i]['id'] . '</th>';
     echo '<th><p class="stilo-preguntas">' . $data_preguntas[$i]['pregunta'] . '</p></td>';
     echo '<td><p>' .$data_preguntas[$i]['id_pregunta_grafica'] .'</p></td>';
     echo '<td><input class="form-check-input" type="radio" name="' .$data_preguntas[$i]['id_pregunta']. '"id="'.$data_preguntas[$i]['id_pregunta'].'-1" value="1" required ></td>';
     echo '<td><input class="form-check-input" type="radio" name="'.$data_preguntas[$i]['id_pregunta'].'" id="'.$data_preguntas[$i]['id_pregunta'].'-0" value="0" required></td>';
     echo '<td><textarea id="'.$data_preguntas[$i]['id_pregunta'].'-Coment" name="'.$data_preguntas[$i]['id_pregunta'].'-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>';
     echo '<td><button type="button" id="evidencia'.$data_preguntas[$i]['id'].'" style="width:110%; height: 50px" onclick="openUploadPopup(\'S6\','.$data_preguntas[$i]['id'].',\''.$data_preguntas[$i]['id_pregunta_grafica'].'\')">Subir<br>Evidencia</button></td>';

     echo '<script>';
    echo 'document.getElementById("' . $data_preguntas[$i]['id_pregunta'] . '-1").addEventListener("change", function() { toggleComentarios("' . $data_preguntas[$i]['id_pregunta'] . '", this.value); });';
    echo 'document.getElementById("' . $data_preguntas[$i]['id_pregunta'] . '-0").addEventListener("change", function() { toggleComentarios("' . $data_preguntas[$i]['id_pregunta'] . '", this.value); });';
    echo '</script>';

      }
?>    
  </tbody>
</table>

</div>
<div style="align-content:center; text-align: center;">
  <label class="letras_forma" for="Fecha">Fecha:</label>
  <input class="Opiciones" type="date" id="Fecha" name="Fecha" value="<?php echo date('Y-m-d'); ?>" required>
  <label class="letras_forma" for="Auditor">Auditor</label>
  <input type="text" id="Auditor" name="Auditor" style="height:55px; text-align:center; align-content:center;" disabled>
  <label class="letras_forma" for="Area">Area</label>
  <select class="Opiciones" name="Area" id="Area" required>
<?php include('config/list_areas.php');?>
</select>
  <label class="letras_forma" for="Auditado">Auditado</label>
 <input type="text" id="Auditado" name="Auditado" style="height:55px; text-align:center; align-content:center;" required> 
 <input type="hidden" name="No_random" id="No_random" value="">
<input type="submit" name="submite" value="Aceptar" class="btn btn-lg btn-primary" style="width:150px; text-align:center; align-content:center;">
</div>

</form>

</main>


<aside class="right_general">
  
</aside>
</div>

<!-- upload pop up -->
<div id="uploadPopup" class="upload-popup">
  <div class="upload-popup-content">
    <h2>Subir Evidencia</h2>
    <input type="hidden" name="idevidencia" id="idevidencia" value="">
    <input type="hidden" name="id_de_s" id="id_de_s" value="">
    <input type="hidden" name="id_pregunta_grafica_IN" id="id_pregunta_grafica_IN" value="">
    <input type="file" id="imageInput" name="images[]" multiple>
    <!-- <button onclick="uploadImages()">Subir</button> -->
    <button onclick="closeUploadPopup()">Cerrar</button>
    <br>
    <button class="complete-button" onclick="completeUpload()">Subir</button>
  </div>
</div>

</body>

<script>
  // console.log('<?php echo json_encode($data_preguntas[0]['id']); ?>');
  console.log('<?php echo $numero_aleatorio; ?>');
  console.log('<?php echo $carpeta_temporal; ?>');
  console.log('<?php echo $carpeta_destino; ?>');

  document.getElementById('Auditor').value='<?php echo $username; ?>';
  
  document.getElementById('No_random').value='<?php echo $numero_aleatorio; ?>';

  function logout() {
  // Hacer una petición a logout.php para cerrar la sesión
  fetch('logout.php')
    .then(response => {
      // Redirigir al usuario a la página de inicio de sesión
      window.location.href = 'index.php';
    })
    .catch(error => {
      console.log('Ocurrió un error al cerrar sesión:', error);
    });
}

  function openUploadPopup(seleccionada,id,id_preguntaIN) {
  debugger;
  var popup = document.getElementById("uploadPopup");
  popup.style.display = "block";
  document.getElementById('idevidencia').value = id;
  document.getElementById('id_de_s').value = seleccionada;
  document.getElementById('id_pregunta_grafica_IN').value = id_preguntaIN;
  document.getElementById('imageInput').value = '';
}

  function closeUploadPopup() {
  var popup = document.getElementById("uploadPopup");
  popup.style.display = "none";
}

  function completeUpload() {
  uploadImages();
  alert("Acción completada con éxito.");
  closeUploadPopup();
}

 function uploadImages() {
      debugger;
      var input = document.getElementById("imageInput");
      var idtask= document.getElementById('idevidencia').value;
      var idpreguntagrafica= document.getElementById('id_pregunta_grafica_IN').value;
      var random = <?php echo $numero_aleatorio; ?>;
      var idS= document.getElementById('id_de_s').value;
      var files = input.files;
      
      var formData = new FormData();
      for (var i = 0; i < files.length; i++) {
        formData.append("images[]", files[i]);
      }
      
        // Agregar el ID al formulario de datos
      formData.append("idtask", idtask);
      formData.append("id_de_s", idS);
      formData.append("idpreguntagrafica", idpreguntagrafica);
      formData.append("random", random);
      console.log(idtask);
      console.log(id_de_s);
      console.log(id_de_s);
      console.log(random);
      
      debugger;
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "upload_evidencias.php", true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // alert("Imágenes subidas con éxito");
          closeUploadPopup();
          // Aquí puedes realizar cualquier acción adicional después de la subida exitosa
        } else if (xhr.readyState === 4 && xhr.status !== 200) {
          console.log("Error al subir las imágenes");
          // Aquí puedes realizar acciones adicionales en caso de error
        }
      };
      xhr.send(formData);
    }
</script>
</html>
