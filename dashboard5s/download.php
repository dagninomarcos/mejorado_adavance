<?php require('config/config.php')?>
<?php include('config/download.php')?>
<?php include('config/header.php')?>

<body <?php include('config/body.php')?> >
<?php include('navbar.php');?>
<div class="main">
<aside class="left_general">
</aside>
	<main class="main_general" style="display: grid; text-align: center;">
		<div style="align-content: center;">
		<form>
			<label for="fecha-inicio" style="font-size: 20px; color: white; font-family: arial black;">Fecha Inicial</label>
			<input type="date" name="fecha-inicio" id="fecha-inicio" class="fecha-download" required>
			<label for="fecha-final" style="font-size: 20px; color: white; font-family: arial black;">Fecha Final</label>
			<input type="date" name="fecha-final" id="fecha-final" class="fecha-download" required>
			<input type="submit" name="value" value="Descargar" id="value" class="btn btn-lg btn-primary">
		</form>	
		</div>
		<div>
			<h1 style="color: white; text-align:center;">Selecccionar Fecha Inicial y Fecha Final para generar el archivo y descargar la informacion</h1>
		</div>
	</main>
<aside class="right_general">
</aside>
</div>
<?php include('config/footer.php')?>
</body> 
</html>