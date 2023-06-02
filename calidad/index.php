<?php require('config/config.php')?>
<?php include('config/db.php') ?>
<?php

$mes = date('m'); // Mes (1-12) para el que deseas obtener el número de días
$año = date('Y'); // Año para el que deseas obtener el número de días
$numDias = date('t', strtotime("$año-$mes-01"));


$fecha_sistema=date("Y-m-d");
$query ="SELECT * FROM calidad.mes_registro where month(Fecha)=month('$fecha_sistema');";
// ejectuar el query 

$result = mysqli_query($mysqli, $query);
// recuperar la informacion de la base de datos 
$data= mysqli_fetch_all($result,MYSQLI_ASSOC);

// liberar la variable donde se guerda la informacion 
mysqli_free_result($result);

// cerrar la conexion con la base de datos
mysqli_close($mysqli);

$arra_leng= count($data);

if ($arra_leng==0) {
  $arra_leng=1;
  $data[0]['Registro']=0;
}


for ($i=0; $i < $arra_leng; $i++) { 
  $data_mostrar[$i]=$data[$i]['Registro'];
}


for ($i=0; $i < 31; $i++) { 
  if (empty($data_mostrar[$i])) {
    $color[$i]='rgba(255, 255, 255, 1)';//blanco
  }else{
    if ($data_mostrar[$i]==='1') {
    $color[$i]='rgba(0, 255, 13, 1)';//verde
    }else{
    $color[$i]='rgba(255, 0, 0, 1)';//rojo
    }
  }
}



// $color[0]='BLANCO NO IMPORTA';
// for ($i=1; $i < 32; $i++) { 
//   if(empty($data_mostrar[$i])){
//     $color[$i]='BLANCO';
//   }else{
//     if ($data_mostrar[$i]=="0") {
//       $color[$i]='VERDE';
//     }else{
//       $color[$i]='ROJO';
//     }
//   }
//   }
?>





<?php include('config/header.php')?>
<style>
  #canvas-container {
    width: 800px;
    height: 800px;
    background-color: rgba(255, 255, 255, 0.2);
  }


  canvas {
    display: block;
    margin: 0 auto;

  }
.main-container{
  display: grid;
  grid-template-columns: auto auto;
  align-self: center;
}
.gallery {
    height: 800px;
    width: 1100px;
    border-radius: 10px;
    display: grid;
    grid-template-columns: auto auto auto;
    grid-template-rows:auto auto auto auto ;
    justify-content: center;
    margin-top: 20px;
    background-color: rgba(255, 255, 255, 0.2);
    padding: .5rem;
    border: 1px solid black;
    border-radius: 1rem;
    font-size: 1px;
    box-shadow: 0 0 16px rgba(0, 0, 0, 0.8);
    
  }

.gallery-item {
  cursor: pointer;
  margin: 5px;
}

.gallery-item img {
  width: 310px;
  height: 150px;
  object-fit: cover;
  object-position: center;
  border-radius: 5px;
  border: 4px solid #000000; /* Agrega un borde negro de 4px */
}


  .popup {
   position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fff;
  border-radius: 5px;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  z-index: 9999;
  display: none;
  width: 100%; /* Ajusta el ancho del pop-up según tus necesidades */
  max-width: 1200px; /* Establece un ancho máximo para el pop-up */
  }

  .popup img {
  max-width: 100%;
  width: 2000px; /* Ajusta el ancho deseado */
  height: auto; /* La altura se ajustará automáticamente */
  object-fit: contain;
  }

    .popup button {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: transparent;
    border: none;
    color: #555555;
    font-size: 20px;
    cursor: pointer;
  }
  .local{
  margin: 20px !important;
  
  }
  h3{
    font-size: 25px;
    text-align: center;
     color: white;

  }
  h1{
    text-align: center;
    color: white;
  }
.contendor1{
  display: grid;
  grid-template-rows: auto auto;
  font-family: arial;
  font-size: 30px;

}
</style>


<body <?php include('config/body.php')?> >
<?php include('navbar.php');?>
<div class="main main-container">
<div class="contenedor1">
  <div>
    <h1>Mes/Month: <?php echo date('F', mktime(0, 0, 0, date('m'), 10));?></h1>
  </div>
  <div class="chart local" id="canvas-container" >
    <canvas id="myCanvas" width="780" height="780"></canvas>
  </div>
</div>
<div class="contenedor1">
  <div>
    <h1>METRICOS/METRICS</h1>
  </div>
<!-- Galería de imágenes -->
  <div class="gallery">

<div class="gallery-item">
  <h3>RMA FAR's OPEN 2022</h3>
  <img src="/fotos/calidad/1/imagen_1.jpg" alt="Miniatura 1">
</div>
<div class="gallery-item">
  <h3>QUALITY ALERT 1</h3>
  <img src="/fotos/calidad/2/imagen_2.jpg" alt="Miniatura 2">
</div>

<div class="gallery-item">
  <h3>RMA FAR's OPEN 2023</h3>
  <img src="/fotos/calidad/3/imagen_3.jpg" alt="Miniatura 3">
</div>

<div class="gallery-item">
  <h3>RMA FAR's TOP 5 Customers</h3>
  <img src="/fotos/calidad/4/imagen_4.jpg" alt="Miniatura 4">
</div>

<div class="gallery-item">
  <h3>QUALITY ALERT 2</h3>
  <img src="/fotos/calidad/5/imagen_5.jpg" alt="Miniatura 5">
</div>

<div class="gallery-item">
    <h3>RMA FAR's TOP 5 Customers</h3>
  <img src="/fotos/calidad/6/imagen_6.jpg" alt="Miniatura 6">
</div>

<div class="gallery-item">
    <h3>ACTIONS 2022</h3>
  <img src="/fotos/calidad/7/imagen_7.jpg" alt="Miniatura 7">
</div>

<div class="gallery-item">
  <h3>QUALITY ALERT 3</h3>
  <img src="/fotos/calidad/8/imagen_8.jpg" alt="Miniatura 8">
</div>

<div class="gallery-item">
  <h3>ACTIONS 2023</h3>
  <img src="/fotos/calidad/9/imagen_9.jpg" alt="Miniatura 9">
</div>

<div class="gallery-item">
  <h3>COUNTERMEASURES 2022</h3>
  <img src="/fotos/calidad/10/imagen_10.jpg" alt="Miniatura 10">
</div>
          
<div class="gallery-item">
  <h3>QUALITY ALERT 4</h3>
  <img src="/fotos/calidad/11/imagen_11.jpg" alt="Miniatura 11">
</div>

<div class="gallery-item">
  <h3>COUNTERMEASURES 2023</h3>
  <img src="/fotos/calidad/12/imagen_12.jpg" alt="Miniatura 12">
</div>
    <!-- Agrega más miniaturas según sea necesario -->
  </div>
</div>
</div>
</div>
<?php include('config/footer.php');?>


  <!-- Pop-up de imagen ampliada -->
  <div id="popup" class="popup" onclick="closePopup()">
    <button class="close-button">Cerrar</button>
    <img id="popupImage" src="" alt="Imagen Ampliada">
  </div>
</body>
<script>
  console.log(<?php echo json_encode($data); ?>);
    console.log(<?php echo json_encode($color); ?>);

console.log(<?php echo json_encode($data_mostrar); ?>);

const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');



const centerX = canvas.width / 2;
const centerY = canvas.height / 2;
const radius = Math.min(canvas.width, canvas.height) / 2 - 10;

// Array de colores para cada división
// const colors = ['rgba(0, 0, 0, 1)', 'rgba(255, 255, 255, 0.8)', 'rgba(0, 255, 35, 0.8)', '#ffff00', '#ff00ff', '#00ffff', '#ff8000', '#0080ff', '#8000ff', '#80ff00', '#008000', '#800000', '#ff0080', '#008080', '#800080', '#808000', '#804000', '#004080', '#400080', '#008040', '#400040', '#804080', '#808040', '#804040', '#404040', '#ff8080', '#80ff80', '#8080ff', '#ffff80', '#80ffff', '#ff80ff', 'rgba(255, 255, 35, 0.8)'];
const colors = <?php echo json_encode($color); ?>;
// console.log(colors);
// Dibujar la "colita"
ctx.beginPath();
ctx.moveTo(630, 630); // Punto inicial en la esquina derecha del círculo interior
ctx.lineTo(690, 600); // Línea diagonal hacia abajo
ctx.lineTo(780, 720); // Línea horizontal hacia la izquierda
ctx.lineTo(720, 780); // Línea diagonal hacia arriba
ctx.closePath();
ctx.fillStyle = '#000000'; // Color negro
ctx.fill();
ctx.stroke();

ctx.beginPath();
ctx.lineWidth = 2;
// Dibujar el círculo exterior
ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
ctx.strokeStyle = '#000000'; // Color negro
ctx.stroke();

var dias=<?php echo $numDias; ?>;

// Dibujar las divisiones con colores y números
const angleStep = (2 * Math.PI) / dias;
for (let i = 0; i < dias; i++) {
  const angle = (i - 7) * angleStep;
  const startRadius = radius - 120;
  const endRadius = radius;

  // Asignar el color según el día del mes
  const day = i + 1;
  const color = colors[day-1 % colors.length];

  ctx.beginPath();
  ctx.moveTo(centerX, centerY);
  ctx.arc(centerX, centerY, startRadius, angle, angle + angleStep);
  ctx.arc(centerX, centerY, endRadius, angle + angleStep, angle, true);
  ctx.closePath();
  ctx.fillStyle = color; // Asignar el color de relleno
  ctx.stroke();
  ctx.fill();

  // Agregar el número al centro de cada sección
  const textX = centerX + Math.cos(angle + angleStep / 2) * (radius - 60);
  const textY = centerY + Math.sin(angle + angleStep / 2) * (radius - 60);
  ctx.fillStyle = '#000000'; // Color negro
  ctx.font = '15px Arial';
  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  ctx.fillText(day.toString(), textX, textY);
}

// Dibujar el círculo interior adicional
ctx.beginPath();
ctx.arc(centerX, centerY, radius - 121, 0, 2 * Math.PI);
ctx.fillStyle = 'rgba(255, 255, 255, 1)'; // Color blanco
ctx.fill();

// Establecer el factor de escala y el desplazamiento
var scaleFactor = 0.7;

// Guardar el estado actual del contexto

// Aplicar la transformación de escala al contexto del lienzo

ctx.scale(scaleFactor, scaleFactor);
ctx.translate(180,180);
// Dibujar cuadro verde con leyenda "NO COMPLAINT" a un lado
ctx.fillStyle = '#00FF00'; // Color verde
ctx.fillRect(centerX -205, centerY -100, 80, 80);

ctx.fillStyle = '#FF0000'; // Color verde
ctx.fillRect(centerX -205, centerY, 80, 80);

ctx.fillStyle = '#000000'; // Color negro
ctx.font = '30px Arial Black';
ctx.textAlign = 'start';
ctx.textBaseline = 'middle';
ctx.fillText('NO COMPLAINT', centerX -100, centerY -55);
ctx.fillText('CUSTOMER', centerX -100, centerY + 25);
ctx.fillText('COMPLAINT', centerX -100, centerY + 65);

ctx.lineWidth = 2;
ctx.strokeRect(170, 280, 430, 100);
ctx.strokeRect(170, 280, 110, 100);
ctx.strokeRect(170, 380, 430, 100);
ctx.strokeRect(170, 380, 110, 100);



// const gridSize = 50; // Tamaño del grid en píxeles

// // Dibujar el grid
// ctx.strokeStyle = '#CCCCCC'; // Color del grid
// ctx.lineWidth = 1;

// for (let x = 0; x < canvas.width; x += gridSize) {
//   ctx.beginPath();
//   ctx.moveTo(x, 0);
//   ctx.lineTo(x, canvas.height);
//   ctx.stroke();
// }

// for (let y = 0; y < canvas.height; y += gridSize) {
//   ctx.beginPath();
//   ctx.moveTo(0, y);
//   ctx.lineTo(canvas.width, y);
//   ctx.stroke();
// }
// Obtener referencias a las miniaturas y el pop-up
    const galleryItems = document.querySelectorAll('.gallery-item');
    const popup = document.querySelector('.popup');
    const popupImage = document.getElementById('popupImage');

    // Mostrar el pop-up con la imagen ampliada al hacer clic en la miniatura
    galleryItems.forEach((item) => {
      item.addEventListener('click', () => {
        const imageSrc = item.querySelector('img').src;
        popupImage.src = imageSrc;
        popup.style.display = 'block';
      });
    });

    // Cerrar el pop-up al hacer clic fuera de la imagen
    popup.addEventListener('click', (event) => {
      if (event.target === popup) {
        popup.style.display = 'none';
      }
    });
      
function closePopup() {
  document.getElementById('popup').style.display = 'none';
}
</script>
</html>