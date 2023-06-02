<?php require('config/config.php')?>
<?php 
if(isset($_GET['antes'])){
  $fecha_sistema= "week('".date("Y-m-d").'\')-1';
  $Titulo='Semana Pasada';
}
else{
  $fecha_sistema="week('".date("Y-m-d").'\')';
  $Titulo='Semana Actual';
}

?>

<?php include('config/header.php')?>


<body <?php include('config/body.php')?> >
	
<?php include('navbar.php');?>
<div class="main">
<aside class="left_general">
	
</aside>

<main class="main_general" style="display: grid;">
		<h1 style="text-align: center; color:white; font-family: arial black;" ><?php echo $Titulo ;?></h1>
		<div class="chart-general">
  		<canvas id="grafica1" height="250" width="1600"></canvas>
		</div>
		<div class="grid-container-general">
		<div class="chart-general">
  		<canvas id="grafica2" height="280" width="533"></canvas>
		</div>
		<div class="chart-general">
  		<canvas id="grafica3" height="280" width="533"></canvas>
		</div>
		<div class="chart-general">
  		<canvas id="grafica4" height="280" width="533"></canvas>
		</div>
		</div>
		<div class="grid-container-general-botones">
		<form>
		<div>
		<input type="submit" value="Antes" name="antes" class="btn btn-lg btn-primary">
		<input type="submit" value="Despues" name="despues" class="btn btn-lg btn-primary">
		</div>
		</form>
		</div>
</main>	

<aside class="right_general">
	
</aside>
</div>
<script type="text/javascript" src="js/chart.js"></script>
<script type="text/javascript" src="js/chartjs-plugin-datalabels.min.js"></script>
<?php include('js/barchar.php')?>
<?php include('config/footer.php')?>
 </body> 
</html>