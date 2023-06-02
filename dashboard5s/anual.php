<?php require('config/config.php')?>
<?php include('config/db.php') ?>
<?php
$fecha_sistema=date("Y-m-d");
$query ="Call Anual();";

// ejectuar el query 
$result = mysqli_query($mysqli, $query);

// recuperar la informacion de la base de datos 
$data2= mysqli_fetch_all($result,MYSQLI_ASSOC);
// var_dump($data2);
// liberar la variable donde se guerda la informacion 
mysqli_free_result($result);

// cerrar la conexion con la base de datos
mysqli_close($mysqli);
?>
<?php include('config/header.php')?>

<body <?php include('config/body.php')?> >
<?php include('navbar.php');?>
<div class="main">
<aside class="left_general">
</aside>
	<main class="main_general" style="display: grid; text-align: center;">
		<div style="align-content: center;">
<div class="grid-container-big">
<canvas class="chart" id="myCanvas" width="1200" height="800" style="background-color:rgba(255, 255, 255, 0.8)"></canvas>	
<div>
		</div>

	</main>
<aside class="right_general">
</aside>
</div>
<?php include('config/footer.php')?>
<script>
const canvas2 = document.getElementById("myCanvas");
const ctx7 = canvas2.getContext("2d");
ctx7.translate(250,0); 
ctx7.scale(1.3,1.3);
//enero
  ctx7.beginPath();
  ctx7.moveTo(90, 44);
  ctx7.lineTo(270, 44);
  ctx7.lineTo(270, 161);
  ctx7.lineTo(71, 161);
  ctx7.lineTo(90, 44);
  ctx7.fillStyle = '<?php echo $data2[0]['color']?>'
  ctx7.fill();
  ctx7.stroke();
//febrero
  ctx7.beginPath();
  ctx7.moveTo(270,44);
  ctx7.lineTo(445,44);
  ctx7.lineTo(445,161);
  ctx7.lineTo(270,161);
  ctx7.lineTo(270,44);
  ctx7.fillStyle = '<?php echo $data2[1]['color']?>'
  ctx7.fill();
  ctx7.stroke();
//marzo
  ctx7.beginPath();
  ctx7.moveTo(71,161);
  ctx7.lineTo(205,161);
  ctx7.lineTo(193,244);
  ctx7.lineTo(57,244);
  ctx7.lineTo(71,161);
  ctx7.fillStyle = '<?php echo $data2[2]['color']?>'
  ctx7.fill();
  ctx7.stroke();
//abril
  ctx7.beginPath();
  ctx7.moveTo(193,244);
  ctx7.lineTo(193,330);
  ctx7.quadraticCurveTo(189,330, 171,350);
  ctx7.lineTo(42,333);
  ctx7.lineTo(57,244);
  ctx7.fillStyle = '<?php echo $data2[3]['color']?>'
  ctx7.fill();
  ctx7.stroke();
//mayo
  ctx7.beginPath();
  ctx7.moveTo(193,244);
  ctx7.quadraticCurveTo(250,220,300,219);
  ctx7.lineTo(300,333);
  ctx7.quadraticCurveTo(250,290,193,330);
  ctx7.fillStyle = '<?php echo $data2[4]['color']?>'
  ctx7.fill();
  ctx7.stroke();
//junio
  ctx7.beginPath();
  ctx7.moveTo(300,333);
  ctx7.lineTo(463,333);
  ctx7.quadraticCurveTo(410,226,300,219);
  ctx7.fillStyle = '<?php echo $data2[5]['color']?>'
  ctx7.fill();
  ctx7.stroke();
//julio
  ctx7.beginPath();
  ctx7.moveTo(463,333);
  ctx7.quadraticCurveTo(470,356,472,393);
  ctx7.lineTo(320,393);
  ctx7.quadraticCurveTo(320,356,300,333);
  ctx7.fillStyle = '<?php echo $data2[6]['color']?>'
  ctx7.fill();
  ctx7.stroke();
//agosto
  ctx7.beginPath();
  ctx7.moveTo(472,393);
  ctx7.quadraticCurveTo(471,419,461,453);
  ctx7.lineTo(313,453);
  ctx7.quadraticCurveTo(323,419,320,393);
  ctx7.fillStyle = '<?php echo $data2[7]['color']?>'
  ctx7.fill();
  ctx7.stroke();
//sep
  ctx7.beginPath();
  ctx7.moveTo(461,453);
  ctx7.quadraticCurveTo(457,469,441,498);
  ctx7.lineTo(250,498);
  ctx7.quadraticCurveTo(297,499,313,453);
  ctx7.fillStyle = '<?php echo $data2[8]['color']?>'
  ctx7.fill();
  ctx7.stroke();
//octubre
  ctx7.beginPath();
  ctx7.moveTo(441,498);
  ctx7.quadraticCurveTo(390,589,250,588);
  ctx7.lineTo(250,498);
  ctx7.fillStyle = '<?php echo $data2[9]['color']?>'
  ctx7.fill();
  ctx7.stroke();
//Noviembre
  ctx7.beginPath();
  ctx7.moveTo(250,498);
  ctx7.lineTo(48,498);
  ctx7.quadraticCurveTo(110,590,250,588);
  ctx7.fillStyle = '<?php echo $data2[10]['color']?>'
  ctx7.fill();
  ctx7.stroke();
//Deciembre
  ctx7.beginPath();
  ctx7.moveTo(250,498);
  ctx7.quadraticCurveTo(188,495, 174,424);
  ctx7.lineTo(25,442);
  ctx7.quadraticCurveTo(32,470,48,498);
  ctx7.fillStyle = '<?php echo $data2[11]['color']?>'
  ctx7.fill();
  ctx7.stroke();
 

ctx7.font = "30px Arial Black";
ctx7.fillStyle = 'black';
ctx7.fillText("JAN",135,110);


ctx7.fillStyle = 'black';
ctx7.fillText("FEB",320,110);

ctx7.fillStyle = 'black';
ctx7.fillText("MAR",90,210);

ctx7.fillStyle = 'black';
ctx7.fillText("APR",85,305);

ctx7.fillStyle = 'black';
ctx7.fillText("MAY",210,285);

ctx7.fillStyle = 'black';
ctx7.fillText("JUN",320,295);

ctx7.fillStyle = 'black';
ctx7.fillText("JUL",350,375);

ctx7.fillStyle = 'black';
ctx7.fillText("AUG",350,435);

ctx7.fillStyle = 'black';
ctx7.fillText("SEP",330,485);

ctx7.fillStyle = 'black';
ctx7.fillText("OCT",280,550);

ctx7.fillStyle = 'black';
ctx7.fillText("NOV",130,550);

ctx7.fillStyle = 'black';
ctx7.fillText("DIC",90,480);

function cliclableScales(canvas,click){
  let resetCoordinates = canvas.getBoundingClientRect()

  const x=click.clientX - resetCoordinates.left;
  const y=click.clientY - resetCoordinates.top;
  // console.log(x);
  // console.log(y);

if (x>=380&& x<=490&& y >= 100&& y<=150)  {
  console.log('Enero');
  location.href= 'general_anual.php?Mes=1';
}
if (x>=605&& x<=702&& y >= 100&& y<=150)  {
  console.log('Febrero');
  location.href= 'general_anual.php?Mes=2';
}
if (x>=329&& x<=432&& y >= 228&& y<=270)  {
  console.log('Marzo'); 
  location.href= 'general_anual.php?Mes=3';
}
if (x>=321&& x<=420&& y >= 342&& y<=394)  {
  console.log('Abril'); 
  location.href= 'general_anual.php?Mes=4';
}
if (x>=478&& x<=579&& y >= 321&& y<=365)  {
  console.log('Mayo'); 
  location.href= 'general_anual.php?Mes=5';
}
if (x>=610&& x<=715&& y >= 342&& y<=380)  {
  console.log('Junio');
  location.href= 'general_anual.php?Mes=6';
}
if (x>=647&& x<=746&& y >= 426&& y<=475)  {
  console.log('Julio'); 
  location.href= 'general_anual.php?Mes=7';
}
if (x>=649&& x<=746&& y >= 502&& y<=550)  {
  console.log('Agosto'); 
  location.href= 'general_anual.php?Mes=8';
}
if (x>=626&& x<=721&& y >= 571&& y<=609)  {
  console.log('Septiembre');
  location.href= 'general_anual.php?Mes=9';
}
if (x>=565&& x<=664&& y >= 643&& y<=689)  {
  console.log('Octubre'); 
  location.href= 'general_anual.php?Mes=10';
}
if (x>=372&& x<=482&& y >= 643&& y<=696)  {
  console.log('Noviembre'); 
  location.href= 'general_anual.php?Mes=11';
}
if (x>=323&& x<=414&& y >= 560&& y<=600)  {
  console.log('Diciembre'); 
  location.href= 'general_anual.php?Mes=12';
}
}

canvas2.addEventListener('click',(e) => {
  cliclableScales(canvas2,e)
})
</script>
</body> 
</html>