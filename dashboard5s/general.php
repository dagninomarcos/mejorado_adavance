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
<style>
main{
	display: grid;
	grid-template-rows: auto auto auto;
	margin-top: 0px !important;
}

.graficas_stilo{
	background-color: white;
	border-radius: 10px;
}
</style>
<?php include('navbar.php');?>
<div class="main">


<main class="main_general" style="display: grid;">
		<h1 style="text-align: center; color:white; font-family: arial black;" ><?php echo $Titulo ;?></h1>
		<div style="display: grid;
    grid-template-columns: auto auto;
    justify-content: space-evenly;">
  		<canvas class="chart-general graficas_stilo" id="grafica8" height="180" width="800"></canvas>
  		<canvas class="chart-general graficas_stilo" id="grafica9" height="180" width="800"></canvas>
		</div>


		<div class="chart-general">
  		<canvas id="grafica1" height="250" width="1400"></canvas>
		</div>
		
		<div class="grid-container-general">
		<div class="chart-general">
  		<canvas id="grafica2" height="250" width="533"></canvas>
		</div>
		<div class="chart-general">
  		<canvas id="grafica3" height="250" width="533"></canvas>
		</div>
<div class="chart-general" style="text-align: center; height: 180px">
  <!-- <canvas id="grafica4" height="250" width="533"></canvas> -->
  <a href="oportunidades_general.php" class="botones" style="height: 90px;">Ver<br>Oportunidades</a>
  <form>
  <input type="submit" value="Antes" name="antes" class="btn btn-lg btn-primary">
  <input type="submit" value="Actual" name="despues" class="btn btn-lg btn-primary">
  </form>
</div>

		</div>
		<!-- <div class="grid-container-general-botones"> -->
<!-- 		<form>
		<div>
		<input type="submit" value="Antes" name="antes" class="btn btn-lg btn-primary">
		<input type="submit" value="Despues" name="despues" class="btn btn-lg btn-primary">
		</div>
		</form> -->
		</div>
</main>	


</div>
<script type="text/javascript" src="js/chart.js"></script>
<script type="text/javascript" src="js/chartjs-plugin-datalabels.min.js"></script>

<?php include('js/barchar_test.php')?>
<?php include('config/footer.php')?>
 </body> 
</html>