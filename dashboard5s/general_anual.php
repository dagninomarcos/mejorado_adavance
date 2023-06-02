<?php require('config/config.php')?>
<?php 
$Mes_Seleccionado=$_GET['Mes'];
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
?>

<?php include('config/header.php')?>


<body <?php include('config/body.php')?> >
	
<?php include('navbar.php');?>
<div class="main">
<aside class="left_general">
	
</aside>

<main class="main_general" style="display: grid;">
		<h1 style="text-align: center; color:white; font-family: arial black;" >Mes <?php echo $meses[$Mes_Seleccionado-1]?></h1>
		<div class="chart-general">
  		<canvas id="grafica1" height="400" width="1800"></canvas>
		</div>
		<!-- <div class="grid-container-general">
		<div class="chart-general">
  		<canvas id="grafica2" height="280" width="533"></canvas>
		</div>
		<div class="chart-general">
  		<canvas id="grafica3" height="280" width="533"></canvas>
		</div>
		<div class="chart-general">
  		<canvas id="grafica4" height="280" width="533"></canvas>
		</div>
		</div> -->
		<div class="grid-container-general-botones">
		<form>

		</form>
		</div>
</main>	

<aside class="right_general">
	
</aside>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script type="text/javascript" src="js/chart.js"></script>
<!-- <script type="text/javascript" src="js/chart1.php"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script> -->
<?php include('js/barchar_anual.php')?>
<?php include('config/footer.php')?>
 </body> 
</html>