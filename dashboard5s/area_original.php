
<?php require('config/config.php')?>

<?php $Area_Seleccionada=$_GET['Lugar'];
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
	$month= $meses[date('n')-1];
	// $month= date("F", strtotime('m'));?>

<?php include('config/header.php')?>
<style>
	table {
  table-layout: flex;
  width: 100%;
  border-collapse: collapse;
  border: 3px solid black;
   border-spacing: 1px;
}



th,td {
  padding: 2px;
  

}
.cell_S1Q1:hover {
  background-color: #ddd;
}

.mi-clase{
	border: 3px solid black;
	text-align: center;
}

</style>
<body <?php include('config/body.php')?> >
<?php include('navbar.php');?>

	<div class="main">
<!-- area de un lado  -->
      <aside class="left">
<div class="grid-container-big">
<div class="container-cool" style="background-color:rgba(255, 255, 255, 0.2);">
<h1 style="background-color: rgba(255, 82, 0, .5); font-size: 40px; border-radius: 10px; color: white;"> 5s + 1 </h1>
<h2 style="background-color: ghostwhite; font-size: 30px; border-radius: 10px; color: black;">1's DESPEJAR</h2>
<h3 style="background-color: rgba(172, 172, 172, 0.8); font-size: 20px; border-radius: 10px; color: white;">Mantener solo lo Necesario</h3>
<h2 style="background-color: ghostwhite; font-size: 30px; border-radius: 10px; color: black;">2's ORGANIZAR</h2>
<h3 style="background-color: rgba(172, 172, 172, 0.8); font-size: 20px; border-radius: 10px; color: white;">Un lugar para cada cosa <br> y cada cosa para un lugar</h3>
<h2 style="background-color: ghostwhite; font-size: 30px; border-radius: 10px; color: black;">3's LIMPIEZA</h2>
<h3 style="background-color: rgba(172, 172, 172, 0.8); font-size: 20px; border-radius: 10px; color: white;">Un Area de Trabajo Impecable</h3>
<h2 style="background-color: ghostwhite; font-size: 30px; border-radius: 10px; color: black;">4's ESTANDARIZAR</h2>
<h3 style="background-color: rgba(172, 172, 172, 0.8); font-size: 20px; border-radius: 10px; color: white;">Todo siempre en su lugar</h3>
<h2 style="background-color: ghostwhite; font-size: 30px; border-radius: 10px; color: black;">5's DISCIPLINA</h2>
<h3 style="background-color: rgba(172, 172, 172, 0.8); font-size: 20px; border-radius: 10px; color: white;">Seguir las reglas y ser consistente</h3>
<h2 style="background-color: ghostwhite; font-size: 30px; border-radius: 10px; color: black;">6's SEGURIDAD</h2>
	</div>
</div>

      </aside>
      <main class="main">
<div class="grid-container-big">
 <h1 style="font-family: arial black; color:white;" ><?php echo $Area_Seleccionada ?></h1>
<div class="grid-container-big">
<canvas class="chart" id="myCanvas" width="900" height="600"></canvas>	
<div>
<h1 style="font-family: arial black; color:white;">Mes: <?php echo $month ?></h1>	
</div>
</div>


</div>      

      </main>


		<aside class="right">
<div class="container">
		<div class="chart">
  		<canvas id="grafica1" height="210" width="210"></canvas>
		</div>
		<div class="chart">
 		<canvas id="grafica2" height="210" width="210"></canvas>
		</div>
		<div class="chart">
 		<canvas id="grafica3" height="210" width="210"></canvas>
		</div>
		<div class="chart">
 		<canvas id="grafica4" height="210" width="210"></canvas>
		</div>
		<div class="chart">
 		<canvas id="canvas_nombre" height="210" width="210"></canvas>
		</div>
		<div class="chart">
 		<canvas id="grafica5" height="210" width="210"></canvas>
		</div>
</div>
		</aside>
	</div>


<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script type="text/javascript" src="js/chart.js"></script>
<!-- <script type="text/javascript" src="js/chart1.php"></script> -->
<?php include('js/chart1.php')?>
<?php include('config/footer.php')?>
</body>
</html>