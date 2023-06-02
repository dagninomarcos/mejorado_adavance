<?php require('config/config.php')?>
<?php include('config/db.php') ?>
<?php 


$fecha_sistema= date("Y-m-d");
// Verificar si hay errores de conexión
if (mysqli_connect_errno()) {
  echo "Error de conexión: " . mysqli_connect_error();
}

// Obtener los datos de la tabla 'ejemplo'
$sql = "SELECT * FROM (select * from actividades2t.actividades_revicion order by responsable) as sub order by  responsable;"
//$sql = "SELECT * ,IF(Fecha_Completado<='$fecha_sistema','red','green') as Progreso FROM test_5s.acciones WHERE Estatus!='Completado' order by id desc"
;
$resultado = mysqli_query($mysqli, $sql);

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
  width: 180px;
  font-family: arial black;
  color: white;
  text-align: center;
  vertical-align: middle;
  border: 3px solid white;
  border-radius: 1rem;
}

.container-signal{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 1fr;
/*    background-color: white;*/
    }
</style>

<body <?php include('config/body.php')?> >
<?php include('navbar.php');?>
<button onclick="abrirPopup()">Agregar registro</button>
<style>
.table-estilo{
  font-size: 18px;
}
</style>



<!-- Crear la tabla HTML -->
<table class="table table-striped" style="background-color:rgba(74, 74, 74, 0.80);border-bottom:1px solid black;border-collapse:collapse;vertical-align: middle;">
  <thead>
    <tr>
      <th style="width:150px;background-color: rgba(211, 211, 211, 0.8);">id</th>
      <th style="width:450px;background-color: rgba(211, 211, 211, 0.8);">actividad</th>
      <th style="width:450px;background-color: rgba(211, 211, 211, 0.8);">comentarios</th>
      <th style="width:130px;background-color: rgba(211, 211, 211, 0.8);">fecha_creacion</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">fecha_revicion</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">responsable</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">no_empleado</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Semana Anterior</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Lunes</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Martes</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Miercoles</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Jueves</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Viernes</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Semana Siguiente</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Actualizar</th>

    </tr>
  </thead>
    <tbody>
    <?php
    // Mostrar los datos de la tabla
    while ($fila = mysqli_fetch_assoc($resultado)) {
      echo "<tr>";
      echo "<td class='table-estilo'>" . $fila["id"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["actividad"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["comentarios"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["fecha_creacion"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["fecha_revicion"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["responsable"] . "</td>";
      echo "<td class='table-estilo'>" . $fila["no_empleado"] . "</td>";
      echo "<td class='table-estilo' style='background-color:" . $fila["Semana_Anterior"] . "'></td>";
      echo "<td class='table-estilo' style='background-color:" . $fila["Lunes"] . "'></td>";
      echo "<td class='table-estilo' style='background-color:" . $fila["Martes"] . "'></td>";
      echo "<td class='table-estilo' style='background-color:" . $fila["Miercoles"] . "'></td>";
      echo "<td class='table-estilo' style='background-color:" . $fila["Jueves"] . "'></td>"; 
      echo "<td class='table-estilo' style='background-color:" . $fila["Viernes"] . "'></td>";
      echo "<td class='table-estilo' style='background-color:" . $fila["Semana_Siguiente"] . "'></td>";
      // Agregar un botón para actualizar el registro
      echo '<td><button onclick="abrirPopup3(' . $fila["id"] . ')" style="width:110px; height: 50px;" >Actualizar</button></td>';
      echo "</tr>";
    }
    ?>
  </tbody>
</table>

<!-- Popup -->
<div id="miPopup" class="popup">
  <form>
    <h2>Dar de Alta Registros</h2>
    <label for='AreaIN'>Area</label>
    <select class="Opiciones" name="Area" id="Area" required>
      <?php include('config/list_areas.php');?>
      <option value="General">General</option>
    </select>
    <label for="No_ConformidadIN">No Conformidad</label>
    <input class="Opiciones" style="width:500px" type="text" name="No_ConformidadIN" id="No_ConformidadIN" required>
    <label for="AccionesIN">Acciones</label>
    <input class="Opiciones" style="width:500px" type="text" name="AccionesIN" id="AcccionesIN" required>
    <label for="FechaIN">Fecha</label>
    <input class="Opiciones" style="width:500px" type="date" name="FechaIN" id="FechaIN" required>
    <label for="OwnerIN">Owner</label>
    <input class="Opiciones" style="width:500px" type="text" name="OwnerIN"  id="OwnerIN" required>
    <label for="Fecha_CompletadoIN">Fecha_Completado</label>
    <input class="Opiciones" style="width:500px" type="date" name="Fecha_CompletadoIN" id="Fecha_CompletadoIN" required>
    <label for="ComentariosIN">Comentarios</label>
    <input class="Opiciones" style="width:500px" type="text" name="ComentariosIN" id="ComentariosIN"  required>
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
  <label for="ComentarioActualizar">Comentario</label>
  <textarea class="Opiciones" name="ComentarioActualizar" id="ComentarioActualizar" rows="10" cols="50" resize="none" required></textarea>
  <input type="button" name="guardar" value="Aceptar" onclick="actualizarComentario(document.getElementById('idActualizarComentario').value)"></input>
  <input type="button" name="guardar" value="Cancelar" onclick="cerrarPopup3()"></input>
</form>
    
</div>


</body>


<script>
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
      document.getElementById("ComentarioActualizar").value = this.responseText;
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

function guardarDatos() {
  // Obtenemos los valores de los campos del formulario
  var area = document.getElementById("Area").value;
  var noConformidad = document.getElementById("No_ConformidadIN").value;
  var acciones = document.getElementById("AcccionesIN").value;
  var fecha = document.getElementById("FechaIN").value;
  var owner = document.getElementById("OwnerIN").value;
  var fechaCompletado = document.getElementById("Fecha_CompletadoIN").value;
  var comentarios = document.getElementById("ComentariosIN").value;  
  console.log(area);
  console.log(noConformidad);
  console.log(acciones);
  console.log(fecha);
  console.log(owner);
  console.log(fechaCompletado);
  console.log(comentarios);
  console.log("guardar.php?=areachila="+area+"&noConformidad="+noConformidad+"&acciones="+acciones);
  
    if (area === "" || noConformidad === "" || acciones === "" || fecha === "" || owner === "" || fechaCompletado === "" || comentarios === "") {
    alert("Por favor completa todos los campos requeridos");
    return;
  }
   // Enviamos los datos a través de AJAX usando el método POST
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "guardar.php?areachila="+area+"&noConformidad="+noConformidad+"&acciones="+acciones+"&fecha="+fecha+"&owner="+owner+"&fechaCompletado="+fechaCompletado+"&comentarios="+comentarios, true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Mostramos una alerta al usuario informándole que se han guardado los datos
      location.reload(true);
    }
  };
  xhr.send();
}

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

function actualizarComentario(id) {
  var nuevaComentario = document.getElementById("ComentarioActualizar").value;
    if (nuevaComentario === "") {
    alert("Por favor completa todos los campos requeridos");
    return;
  }  
  console.log(nuevaComentario);
  console.log(id);
  debugger;
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "actualizar_comentario.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    // Handle the response from the server

    document.getElementById("miPopup3").style.display = "none";
    location.reload();
  }
};
xhr.send("id=" + id + "&comentario=" + nuevaComentario);
}

</script>

</html>