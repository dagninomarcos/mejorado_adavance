<?php require('dashboard5s/config/config.php')?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="dashboard5s/css/styles.css">
	<link rel="icon" type="image/x-icon" href="dashboard5s/icon/logo.ico">
	<link rel="stylesheet" type="text/css" href="dashboard5s/css/bootstrap.css">
	<title>Indice</title>
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="dashboard5s/css/bootstrap1.min.css">
	<!-- <script src="js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->

</head>
<style>
.grid-container-indice{
	display: grid;
	grid-template-columns: 200px 200px 200px;
	grid-template-rows: 200px 200px;
	gap: 5px;
	padding: 5px;
}

</style>
<header class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid" style="background-color: black;">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a class="nav-link px-2 text-white" style="font-size: 20px;">Indice</a></li>
        </ul>
      </div>
</header>
<body style="background-image: url('dashboard5s/icon/Fondo_8.png');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover; 
    background-position-y: center;
    background-attachment: fixed;
    height: 860px;
    width: 100%"
>


<main class="main">

<div class="grid-container-indice">

<a href="/dashboard5s" class="botones" style="height:200px;width:200px;">Dashboard 5S</a>
<a href="/actividadest2" class="botones" style="height:200px;width:200px;">Actividades T2</a>
<a href="/calidad" class="botones" style="height:200px;width:200px;">Calidad</a>
<a href="http://10.32.72.162:3000/" class="botones" style="height:200px;width:200px;">Particulas</a>        
</div>
      </main>
</body>
</html>