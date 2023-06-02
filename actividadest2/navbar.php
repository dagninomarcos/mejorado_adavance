<header class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <div class="container-fluid" style="background-color: black;">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?php echo ROOT_HOME; ?>" class="nav-link px-2 text-white" style="font-size: 20px; font-family: arial black;">HOME</a></li>
          <li><a href="<?php echo ROOT_PROCESO; ?>" class="nav-link px-2 text-white" style="font-size: 20px;">Actividades</a></li>
          <li><a href="<?php echo ROOT_COMPLETADAS; ?>" class="nav-link px-2 text-white" style="font-size: 20px;">Completadas</a></li>
        </ul>
      </div>

<?php  $urls =  $_SERVER['REQUEST_URI']; 

if($urls=='/actividadest2/') {
          echo '<div  class="container-signal">';
          echo '<div class="square" id="cuadro1" style="background-color:red"></div>';
          echo '<div class="letras">Revision Vencida</div>';
          echo '<div class="square" id="cuadro2" style="background-color:yellow;"></div>';
          echo '<div class="letras">Revision Semana Actual</div>';
          echo '<div class="square" id="cuadro3" style="background-color:#97c93c"></div>';
          echo '<div class="letras">Revision Siguiente Semana</div>';
          echo '<div class="square" id="cuadro3" style="background-color:blue"></div>';
          echo '<div class="letras">Revision Futura</div>';
          echo '</div>';

          echo '<div style="display: grid; grid-template-columns: auto auto; grid-template-rows:auto;   padding: .5rem; margin: 4px;">';
          echo '<form id="login" method="post">';
              echo 'Username:<input type="text" name="username" id="username" required onchange="toggleButton()">';
              echo 'Password:<input type="password" name="password" id="password" required  onchange="toggleButton()">';
              echo '<input id="submitButton" type="submit" value="Login" disabled onclick="submitForm(event)" />';
          echo '</form>';

          echo '<input id="submitButton2" type="submit" value="Logout" onclick="submitForm2(event)" />';
          echo '</div>';
}
if($urls=='/actividadest2/actividades_completadas.php') {

    echo '<div style="align-content: center;">';
    echo '<form>';
      echo '<label for="fecha-inicio" style="font-size: 20px; color: white; font-family: arial black;">Fecha Inicial</label>';
      echo '<input style="height: 40px;"type="date" name="fecha-inicio" id="fecha-inicio" class="fecha-download" required>';
      echo '<label for="fecha-final" style="font-size: 20px; color: white; font-family: arial black;">Fecha Final</label>';
      echo '<input style="height: 40px;" type="date" name="fecha-final" id="fecha-final" class="fecha-download" required>';
      echo '<input type="submit" name="value" value="Descargar" id="value" class="btn btn-lg btn-primary">';
    echo '</form> ';
    echo '</div>';
}

?>      

<!-- <div style="display: grid; grid-template-columns: auto auto; grid-template-rows:auto;   padding: .5rem; margin: 4px;">
<form id="login" method="post">
    Username:<input type="text" name="username" id="username" required onchange="toggleButton()">
    Password:<input type="password" name="password" id="password" required  onchange="toggleButton()">
    <input id="submitButton" type="submit" value="Login" disabled onclick="submitForm(event)" />
</form>

<input id="submitButton2" type="submit" value="Logout" onclick="submitForm2(event)" />
</div> -->

  </header>