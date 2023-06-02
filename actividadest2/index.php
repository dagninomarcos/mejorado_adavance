<?php require('config/config.php')?>
<?php include('config/db.php') ?>
<?php 


$fecha_sistema= date("Y-m-d");

$fecha_lunes2= date('Y-m-d', strtotime('last monday', strtotime('next monday')));

$myDate = date("Y-m-d");;

$fecha_lunes = date("m-d", strtotime('monday this week', strtotime($myDate)))."\n";
$fecha_lunes1 = date("Y-m-d", strtotime('monday this week', strtotime($myDate)))."\n";
$fecha_martes = date("m-d", strtotime('tuesday this week', strtotime($myDate)))."\n";
$fecha_martes1 = date("Y-m-d", strtotime('tuesday this week', strtotime($myDate)))."\n";
$fecha_miercoles = date("m-d", strtotime('wednesday this week', strtotime($myDate)))."\n";
$fecha_miercoles1 = date("Y-m-d", strtotime('wednesday this week', strtotime($myDate)))."\n";
$fecha_jueves = date("m-d", strtotime('thursday this week', strtotime($myDate)))."\n";
$fecha_jueves1 = date("Y-m-d", strtotime('thursday this week', strtotime($myDate)))."\n";
$fecha_viernes = date("m-d", strtotime('friday this week', strtotime($myDate)))."\n";
$fecha_viernes1 = date("Y-m-d", strtotime('friday this week', strtotime($myDate)))."\n";

// $fecha_martes1=date_create(date('Y-m-d', strtotime($fecha_lunes1. ' + 1 days')));
// $fecha_martes=date_format($fecha_martes1,'m-d');


// Verificar si hay errores de conexión
if (mysqli_connect_errno()) {
  echo "Error de conexión: " . mysqli_connect_error();
}

// Obtener los datos de la tabla 'ejemplo'
$sql = "
SELECT *, 
if('$fecha_lunes1'>fecha_revision,'red','rgba(254, 254, 254, 0.1)') as Semana_Anterior, 
if('$fecha_lunes1'=fecha_revision,'yellow','rgba(254, 254, 254, 0.1)') as Lunes,
if('$fecha_martes1'=fecha_revision,'yellow','rgba(254, 254, 254, 0.1)') as Martes,
if('$fecha_miercoles1'=fecha_revision,'yellow','rgba(254, 254, 254, 0.1)') as Miercoles,
if('$fecha_jueves1'=fecha_revision,'yellow','rgba(254, 254, 254, 0.1)') as Jueves,
if('$fecha_viernes1'=fecha_revision,'yellow','rgba(254, 254, 254, 0.1)') as Viernes,
if(DATE('$fecha_viernes1')<fecha_revision,(if(date_add(DATE('$fecha_viernes1'),interval 8 DAY)>fecha_revision,'#97c93c','blue')),'rgba(254, 254, 254, 0.1)') as Semana_Siguiente
FROM actividades2t.actividades_revision where status!='Completa';
";
// echo $sql;
//$sql = "SELECT * ,IF(Fecha_Completado<='$fecha_sistema','red','green') as Progreso FROM test_5s.acciones WHERE Estatus!='Completado' order by id desc"

$sql_responsables="SELECT * FROM actividades2t.responsables;";
$resultado = mysqli_query($mysqli, $sql);
$resultado_responsables = mysqli_query($mysqli,$sql_responsables);

// $data2= mysqli_fetch_all($resultado,MYSQLI_ASSOC);
// mysqli_free_result($resultado);
// // echo json_encode($data2);
mysqli_close($mysqli);
?>


<?php include('config/header.php')?>
<style>
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
  width: 35px;
  font-family: arial black;
  color: white;
  text-align: center;
  vertical-align: middle;
  border: 3px solid white;
  border-radius: 1rem;

}

.container-signal{
    display: grid;
    text-align: center;
    vertical-align: middle;
    grid-template-columns: auto auto auto auto auto auto auto auto ;
    grid-template-rows: 1fr;
/*    background-color: white;*/
    margin: 1px;
    }

.letras{
  margin: 5px;
  font-family: ;
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

</style>

<body <?php include('config/body.php')?> >
<?php include('navbar.php');?>
<button id="agregar_registro" onclick="abrirPopup()" disabled>Agregar registro</button>
<style>
.table-estilo{
  font-size: 18px;

}

</style>



<!-- Crear la tabla HTML -->
<table class="table table-striped-columns" style="background-color:rgba(74, 74, 74, 0.80);border-bottom:1px solid black;border-collapse:collapse;vertical-align: middle;">
  <thead>
    <tr>
      <th style="width:10px;background-color: rgba(211, 211, 211, 0.8);">id</th>
      <th style="width:450px;background-color: rgba(211, 211, 211, 0.8);">Descripcion Actividad</th>
      <th style="width:450px;background-color: rgba(211, 211, 211, 0.8);">comentarios</th>
      <th style="width:130px;background-color: rgba(211, 211, 211, 0.8);">fecha_creacion</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">fecha_revision</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">responsable</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">departamento</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">estatus</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Semana Anterior</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Lunes<br><?php echo $fecha_lunes ?></th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Martes<br><?php echo $fecha_martes ?></th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Miercoles<br><?php echo $fecha_miercoles ?></th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Jueves<br><?php echo $fecha_jueves ?></th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Viernes<br><?php echo $fecha_viernes ?></th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Semana Siguiente</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Completar</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Actualizar</th>

    </tr>
  </thead>
    <tbody>
    <?php
    // Mostrar los datos de la tabla
    $contador=1;
    while ($fila = mysqli_fetch_assoc($resultado)) {
      echo "<tr>";
      echo "<td class='table-estilo'>" . $fila["id"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["actividad"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["comentarios"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["fecha_creacion"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["fecha_revision"] . "</td>";
      echo "<td class='table-estilo' style='font-family: arial black;'>" . $fila["responsable"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["departamento"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["status"] . "</td>";
      echo "<td class='table-estilo' style='background-color:" . $fila["Semana_Anterior"] . "'></td>";
      echo "<td class='table-estilo' style='background-color:" . $fila["Lunes"] . "'></td>";
      echo "<td class='table-estilo' style='background-color:" . $fila["Martes"] . "'></td>";
      echo "<td class='table-estilo' style='background-color:" . $fila["Miercoles"] . "'></td>";
      echo "<td class='table-estilo' style='background-color:" . $fila["Jueves"] . "'></td>"; 
      echo "<td class='table-estilo' style='background-color:" . $fila["Viernes"] . "'></td>";
      echo "<td class='table-estilo' style='background-color:" . $fila["Semana_Siguiente"] . "'></td>";
      // Agregar un botón para actualizar el registro
      echo '<td><button id="completado'. $contador .'"style="width:110%; height: 50px" onclick="actualizar(' . $fila["id"] . ')" disabled>Completada</button></td>';
      echo '<td><button id="actualizar'. $contador .'" onclick="abrirPopup3(' . $fila["id"] . ')" style="width:110px; height: 50px;" disabled>Actualizar</button></td>';
      
      echo "</tr>";
      $contador++;
    }
    ?>
  </tbody>
</table>

<!-- Popup -->
<div id="miPopup" class="popup">
  <form>
    <h2>Dar de Alta Actividad</h2>
    <label for='ResponsableIN'>Responsable</label>
    <select class="Opiciones" name="ResponsableIN" id="ResponsableIN" required>
      <?php 
        echo "<option value=''>--Please choose an option--</option>";
      while ($fila2 = mysqli_fetch_assoc($resultado_responsables)){
        echo "<option value='" . $fila2["nombre"] . "'>" . $fila2["nombre"] . "</option>";
      };?>
      <option value="General">General</option>
    </select>
    <label for="ActividadIN">Actividad</label>
    <input class="Opiciones" style="width:500px" type="text" name="ActividadIN" id="ActividadIN" required>
    <label for="ComentariosIN">Comentarios</label>
    <input class="Opiciones" style="width:500px" type="text" name="ComentariosIN" id="ComentariosIN" required>
    <label for="Fecha_CreacionIN">Fecha_Creacion</label>
    <input class="Opiciones" style="width:500px" type="date" name="Fecha_CreacionIN" id="Fecha_CreacionIN" required>
    <label for="Fecha_RevicionIN">Fecha_Revicion</label>
    <input class="Opiciones" style="width:500px" type="date" name="Fecha_RevicionIN"  id="Fecha_RevicionIN" required>
    <input type="button" name="guardar" value="Aceptar" onclick="guardarDatos()"></input>
  </form>
  <button id="closeButton" onclick="cerrarPopup()">Cerrar</button>
</div>

<div id="miPopup2" class="popup">
<form>
  <input type="hidden" name="idActualizar" id="idActualizar" value="">
  <label for="FechaActualizar">Fecha</label>
  <input class="Opiciones" type="date" name="FechaActualizar" id="FechaActualizar" required>
  <input type="button" name="guardar" value="Aceptar" onclick="actualizarFecha(document.getElementById('idActualizar').value)"></input>
  <input type="button" name="guardar" value="Cancelar" onclick="cerrarPopup2()"></input>
</form>
    
</div>

<div id="miPopup3" class="popup">
<form>
  <input type="hidden" name="idActualizarComentario" id="idActualizarComentario" value="">
  <label for="actividadActualizar">Actividad</label>
  <input type="text" class="Opiciones" name="actividadActualizar" id="actividadActualizar"  disabled></input>
  <label for="ComentarioActualizar">Comentario</label>
  <textarea class="Opiciones" name="ComentarioActualizar" id="ComentarioActualizar" rows="5" resize="none" cols="50" style="resize:none;" required></textarea>
  <label for="date_creacionActualizar">Fecha de Creacion</label>
  <input type="date" class="Opiciones" name="date_creacionActualizar" id="date_creacionActualizar"  disabled></input>
  <label for="date_revicionActualizar">Fecha de Revicion</label>
  <input type="date" class="Opiciones" name="date_revicionActualizar" id="date_revicionActualizar"  ></input>
  <label for="resposableActualizar">Responsable</label>
  <input type="text" class="Opiciones" name="resposableActualizar" id="resposableActualizar" disabled ></input>
  <input type="button" name="guardar" value="Aceptar" onclick="actualizarComentario(document.getElementById('idActualizarComentario').value)"></input>
  <input type="button" name="guardar" value="Cancelar" onclick="cerrarPopup3()"></input>
</form>
    
</div>


</body>


<script>
// para checar el usuario y si activar los botones si no mandar decir que no esta bien 

function submitForm(event) {
  event.preventDefault(); // Evitar el envío del formulario por defecto

  // Obtener los valores de usuario y contraseña
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  var totalFilas = <?php echo $contador -1; ?>
  // Crear un objeto FormData para enviar los datos
  var formData = new FormData();
  formData.append('username', username);
  formData.append('password', password);

  // Realizar la solicitud POST usando fetch()
  fetch('submit.php', {
    method: 'POST',
    body: formData
  })
    .then(response => response.text())
    .then(data => {
      console.log(data);

      if (data == 'OK') {
        alert("Login correcto");

        // Habilitar botones
        document.getElementById('agregar_registro').disabled = false;
        
        localStorage.setItem(agregar_registro, 'habilitado');
        
        for (var i = 1; i <= totalFilas; i++) {
          var botonid = 'actualizar' + i;
          var botoncompletado = 'completado' + i;
          document.getElementById(botonid).disabled = false;
          document.getElementById(botoncompletado).disabled = false;

          // Guardar el estado de los botones en el almacenamiento local
          localStorage.setItem(botonid, 'habilitado');
          localStorage.setItem(botoncompletado, 'habilitado');
        }

        // Limpiar campos de usuario y contraseña
        document.getElementById('username').value = '';
        document.getElementById('password').value = '';
        document.getElementById('submitButton').disabled = true;
        iniciarTemporizador();
      } else {
        alert("Usuario no encontrado");

        // Limpiar campos de usuario y contraseña
        document.getElementById('username').value = '';
        document.getElementById('password').value = '';
        document.getElementById('submitButton').disabled = true;
      }
    })
    .catch(error => {
      // Manejar el error en caso de que la solicitud falle
      console.error('Error:', error);
    });
}

// logout para desahabilitar los botones
function submitForm2(event) {
    var totalFilas = <?php echo $contador -1; ?>;
document.getElementById('agregar_registro').disabled=true;
localStorage.setItem(agregar_registro, 'nohabilitado');
for(var i = 1; i <= totalFilas; i++){
        var botonid = 'actualizar' + i;
        var botoncompletado = 'completado' + i;
        document.getElementById(botonid).disabled = true;
        document.getElementById(botoncompletado).disabled = true;
        
        localStorage.setItem(botonid, 'nohabilitado');
        localStorage.setItem(botoncompletado, 'nohabilitado');
      }
  
      debugger;}
      


// marcar como completado          
function actualizar(id) {
  // Preguntar al usuario si desea actualizar el registro
  if (confirm("¿Está seguro de que desea actualizar este registro?")) {
    // Hacer una solicitud AJAX para actualizar el registro en la base de datos
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "actualizar.php?id="+id, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Mostrar un mensaje de éxito al usuario
        // alert("Registro actualizado con éxito");
        // Recargar la página principal después de actualizar el registro
        document.location.reload(true);
      }
    };
    xhr.send();
  }
}

function abrirPopup() {
  var popup = document.getElementById("miPopup");
  popup.style.display = "block";
}

function abrirPopup2(id) {
  var popup = document.getElementById("miPopup2");
  popup.style.display = "block";
  document.getElementById("idActualizar").value=id;
  console.log(id);
}


// abrir el pop up y sacar la info para ponerlo en el popup
function abrirPopup3(id) {
  var popup = document.getElementById("miPopup3");
  popup.style.display = "block";
  document.getElementById("idActualizarComentario").value = id;
  console.log(id);

  // Realizar una llamada AJAX para obtener la información del servidor
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // La respuesta del servidor se ha recibido correctamente
      console.log(this.responseText);
      var data=this.responseText;
      console.log(data);
      var jsonResponse = JSON.parse(data);
      console.log(jsonResponse);
      console.log(jsonResponse["comentarios"]);
      document.getElementById("ComentarioActualizar").value = jsonResponse["comentarios"];
      document.getElementById("actividadActualizar").value = jsonResponse["actividad"];
      document.getElementById("date_creacionActualizar").value = jsonResponse["fecha_creacion"];
      document.getElementById("date_revicionActualizar").value = jsonResponse["fecha_revicion"];
      document.getElementById("resposableActualizar").value = jsonResponse["responsable"];
    }
  };
  xmlhttp.open("GET", "obtener-informacion.php?id=" + id, true);
  xmlhttp.send();
}

function aceptarPopup() {
  guardarDatos();
}

function cerrarPopup() {
  document.getElementById("miPopup").style.display = "none";
}

function cerrarPopup2() {
  document.getElementById("miPopup2").style.display = "none";
}

function cerrarPopup3() {
  document.getElementById("miPopup3").style.display = "none";
}


//para guardar los datos en base de datos completa

function guardarDatos() {

  
  event.preventDefault(); // Evitar el envío del formulario por defecto

  // Obtenemos los valores de los campos del formulario
  var responsablevar = document.getElementById('ResponsableIN').value;
  var actividadvar = document.getElementById('ActividadIN').value;
  var comentariosvar = document.getElementById('ComentariosIN').value;
  var fecha_creacionvar = document.getElementById('Fecha_CreacionIN').value;
  var fecha_revisionvar = document.getElementById('Fecha_RevicionIN').value;
  var ultimoBoton= <?php echo $contador +1; ?>
  // Crear un objeto FormData para enviar los datos
  var formData = new FormData();
  formData.append('responsablevar', responsablevar);
  formData.append('actividadvar', actividadvar);
  formData.append('comentariosvar', comentariosvar);
  formData.append('fecha_creacionvar', fecha_creacionvar);
  formData.append('fecha_revisionvar', fecha_revisionvar);

  console.log(formData);
  // Realizar la solicitud POST usando fetch()
  fetch('guardar.php', {
    method: 'POST',
    body: formData
  })
    .then(response => response.text())
    .then(data => {
      debugger;
      console.log(data);
      //manejas la respuesta del servicio
      var ultimoActualizar= 'actualizar' + ultimoBoton;
      var ultimoCompletado= 'completado' + ultimoBoton;

      console.log(data);
      localStorage.setItem(ultimoActualizar, 'habilitado');
      localStorage.setItem(ultimoCompletado, 'habilitado');
      location.reload(true);
      document.getElementById("miPopup").style.display = "none";
     })
    .catch(error => {
      // Manejar el error en caso de que la solicitud falle
      console.error('Error:', error);
    });
}
// no la usamos aqui 
function actualizarFecha(id) {
  var nuevaFecha = document.getElementById("FechaActualizar").value;
    if (nuevaFecha === "") {
    alert("Por favor completa todos los campos requeridos");
    return;
  }  

  console.log("id:", id);
  console.log("nuevaFecha:", nuevaFecha);
  // debugger;
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "actualizar_fecha.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    // Handle the response from the server

    document.getElementById("miPopup2").style.display = "none";
    location.reload();
  }
};
xhr.send("id=" + id + "&fecha=" + nuevaFecha);
}
// no lo usamos aqui
function actualizarComentario(id) {
  var nuevaFecha = document.getElementById("date_revicionActualizar").value;
  var nuevaComentario = document.getElementById("ComentarioActualizar").value;
    if (nuevaFecha === "" || nuevaComentario === "") {
    alert("Por favor completa todos los campos requeridos");
    return;
  }  
  console.log(nuevaFecha);
  console.log(nuevaComentario);
  console.log(id);
  
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "actualizar_registro.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    // Handle the response from the server
    
    console.log(this.responseText);
    document.getElementById("miPopup3").style.display = "none";
    location.reload();
  }
};
xhr.send("id=" + id + "&nuevaFecha=" + nuevaFecha + "&nuevaComentario=" + nuevaComentario);
console.log(xhr);

}

// para verificar si los botones estan habilitados cuando la paguina se refresca
 window.addEventListener('load', function () {
  var totalFilas = <?php echo $contador -1; ?> ;
  
  var agregar_registro_ok=localStorage.getItem(agregar_registro);
  
  if (agregar_registro_ok === 'habilitado'){
    document.getElementById('agregar_registro').disabled=false;
  }
  
  for (var i = 1; i <= totalFilas; i++) {
    var botonid = 'actualizar' + i;
    var botoncompletado = 'completado' + i;

    // Obtener el estado del botón desde el almacenamiento local
    var estadoBotonId = localStorage.getItem(botonid);
    var estadoBotonCompletado = localStorage.getItem(botoncompletado);

    if (estadoBotonId === 'habilitado') {
      document.getElementById(botonid).disabled = false;
    }

    if (estadoBotonCompletado === 'habilitado') {
      document.getElementById(botoncompletado).disabled = false;
    }
  }
}); 

// Función para iniciar el temporizador
function iniciarTemporizador() {
  // Establecer el tiempo de expiración en minutos (ejemplo: 30 minutos)
  var tiempoExpiracion = 5;

  // Convertir el tiempo de expiración a milisegundos
  var tiempoExpiracionMS = tiempoExpiracion * 60000;

  // Establecer el temporizador
  var temporizadorLogout = setTimeout(logout, tiempoExpiracionMS);

  // Reiniciar el temporizador cuando ocurra una interacción del usuario
  document.addEventListener('mousemove', reiniciarTemporizador);
  document.addEventListener('keydown', reiniciarTemporizador);

  // Función para reiniciar el temporizador
  function reiniciarTemporizador() {
    clearTimeout(temporizadorLogout);
    temporizadorLogout = setTimeout(logout, tiempoExpiracionMS);
  }

  // Función para cerrar sesión
  function logout() {
    // Realizar cualquier otra operación de cierre de sesión que necesites
    var totalFilas = <?php echo $contador -1; ?>;
    
    document.getElementById('agregar_registro').disabled = true;
    
    localStorage.setItem(agregar_registro, 'nohabilitado');
    

    for(var i = 1; i <= totalFilas; i++){
      var botonid = 'actualizar' + i;
      var botoncompletado = 'completado' + i;
      document.getElementById(botonid).disabled = true;
      document.getElementById(botoncompletado).disabled = true;
          
      localStorage.setItem(botonid, 'nohabilitado');
      localStorage.setItem(botoncompletado, 'nohabilitado');
    }

    // Redirigir a la página de inicio de sesión
    window.location.href = 'http://10.25.41.38/actividadest2/';
  }
}

</script>

</html>