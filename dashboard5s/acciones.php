<?php require('config/config.php')?>
<?php include('config/db.php') ?>
<?php 


$fecha_sistema= date("Y-m-d");
// Verificar si hay errores de conexión
if (mysqli_connect_errno()) {
  echo "Error de conexión: " . mysqli_connect_error();
}

// Obtener los datos de la tabla 'ejemplo'
$sql = "SELECT * ,IF(week(Fecha_completado)<=week('$fecha_sistema'),IF(week(Fecha_completado)=week('$fecha_sistema'),'yellow','red'),'green') as Progreso FROM test_5s.acciones WHERE Estatus!='completado' order by id asc;"
// $sql = "SELECT * ,IF(week(Fecha_completado)<=week('$fecha_sistema'),IF(week(Fecha_completado)=week('$fecha_sistema'),'2','3'),'1') as Progreso FROM test_5s.acciones WHERE Estatus!='completado' order by id asc;"


//$sql = "SELECT * ,IF(Fecha_completado1<='$fecha_sistema','red','green') as Progreso FROM test_5s.acciones WHERE Estatus!='completado1' order by id desc"
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

.upload-popup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
}

.upload-popup-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fff;
  padding: 20px;
  text-align: center;
  border-radius: 5px;
}

.upload-popup-content h2 {
  margin-bottom: 20px;
}

.buttons button {
  margin-right: 10px;
}

.buttons button:last-child {
  margin-right: 0;
}


.complete-button {
  display: block;
  width: 100%;
  padding: 10px;
  margin-top: 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.complete-button:hover {
  background-color: #45a049;
}
.table-container {
  max-height: 400px; /* Altura máxima de la tabla */
  overflow-y: scroll;
}

.add-record {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: #f5f5f5;
  padding: 2px;
}
.add-record button {
  width: 100%; /* Abarcar todo el ancho del contenedor */
}


.table-container {
  max-height: 2000px; /* Altura máxima de la tabla */
  overflow-y: auto;
    margin-bottom: -115px; /* Eliminar margen inferior */
  padding-bottom: 0px; /* Eliminar relleno inferior */
}

.table thead {
  position: sticky;
  top: 0px;
  background-color: #f5f5f5;
}


</style>

<body <?php include('config/body.php')?> >
<?php include('navbar.php');?>
<div class="add-record">
<button onclick="abrirPopup()">Agregar registro</button>
</div>


<div class="table-container">
<!-- Crear la tabla HTML -->
<table class="table table-striped" style="background-color:rgba(74, 74, 74, 0.80);border-bottom:1px solid black;border-collapse:collapse;vertical-align: middle;">
  <thead>
    <tr>
      <th style="background-color: rgba(211, 211, 211, 0.8);" data-tipo="numero" >ID</th>
      <th style="width:150px;background-color: rgba(211, 211, 211, 0.8);">Area</th>
      <th style="width:450px;background-color: rgba(211, 211, 211, 0.8);">No_Conformidad</th>
      <th style="width:450px;background-color: rgba(211, 211, 211, 0.8);">Actions</th>
      <th style="width:130px;background-color: rgba(211, 211, 211, 0.8);">Date</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Owner</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Date<br>Completed</th>
      <th style="width:110px;background-color: rgba(211, 211, 211, 0.8);">Status</th>
      <th style="width:380px;background-color: rgba(211, 211, 211, 0.8);">Comments</th>
      <th style="width:80px;background-color: rgba(211, 211, 211, 0.8);" data-tipo="color" >Status</th>
      <!-- <th style="width:100px;background-color: rgba(211, 211, 211, 0.8);">Evidencia</th> -->
      <th style="width:100px;background-color: rgba(211, 211, 211, 0.8);">Update</th>
      <th style="width:100px;background-color: rgba(211, 211, 211, 0.8);">Update Date</th> <!-- nuevo botón -->
      <th style="width:100px;background-color: rgba(211, 211, 211, 0.8);">Update Comments</th> <!-- nuevo botón -->
    </tr>
  </thead>
    <tbody>
    <?php
    // Mostrar los datos de la tabla
    $contador=1;
    while ($fila = mysqli_fetch_assoc($resultado)) {
      echo "<tr>";
      echo "<td>" . $fila["id"] . "</td>";
      echo "<td>" . $fila["Area"] . "</td>";
      echo "<td>" . $fila["No_Conformidad"] . "</td>";
      echo "<td>" . $fila["Accciones"] . "</td>";
      echo "<td>" . $fila["Fecha"] . "</td>";
      echo "<td>" . $fila["Owner"] . "</td>";
      echo "<td>" . $fila["Fecha_Completado"] . "</td>";
      echo "<td>" . $fila["Estatus"] . " </td>";
      echo "<td>" . $fila["Comentarios"] . "</td>";
      echo "<td style='background-color:" . $fila["Progreso"] . "'></td>";
      // Agregar un botón para actualizar el registro
      echo '<td><button id="evidencia'. $contador .'" style="width:110%; height: 50px"  onclick="openUploadPopup(' . $fila["id"] . ')">Completar</button></td>';

      // echo '<td><button id="completado1'. $contador .'" style="width:110%; height: 50px" onclick="actualizar(' . $fila["id"] . ')" disabled >Completada</button></td>';
      echo '<td><button id="actualizar1'. $contador .'" onclick="abrirPopup2(' . $fila["id"] . ')" disabled >Actualizar Fecha</button></td>';

      echo '<td><button id="actualizar_coments1'. $contador .'"onclick="abrirPopup3(' . $fila["id"] . ')" disabled >Actualizar Comentarios</button></td>';
      echo "</tr>";
      $contador++;
    }
    ?>
  </tbody>
</table>
</div>
<!-- upload pop up -->
<div id="uploadPopup" class="upload-popup">
  <div class="upload-popup-content">
    <h2>Completar Actidad</h2>
    <input type="hidden" name="idevidencia" id="idevidencia" value="">
    <input type="file" id="imageInput" name="images[]" multiple>
    
    
      <!-- <button onclick="uploadImages()">Subir</button> -->
      <button onclick="closeUploadPopup()">Cerrar</button>
    <br>
    <label for="textInput">Numero de Empleado</label>
    <input type="text" id="textInput" placeholder="00000">
    <button class="complete-button" onclick="completeUpload()">Completar</button>
  </div>
</div>


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
    <label for="Fecha_completadoIN">Fecha_completado1</label>
    <input class="Opiciones" style="width:500px" type="date" name="Fecha_completadoIN" id="Fecha_completadoIN" required>
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

  function completeUpload() {
  var inputValue = document.getElementById("textInput").value;
  if (inputValue.trim() === "") {
    alert("Por favor, ingrese el numero de empleado.");
    return;
  }
  debugger;
  // Aquí puedes realizar las acciones adicionales si el campo de texto tiene un valor válido
  actualizar(document.getElementById('idevidencia').value,document.getElementById("textInput").value);
  uploadImages();
  // alert("Acción completada con éxito.");
  closeUploadPopup();
}
  function openUploadPopup(id) {
  debugger;
  var popup = document.getElementById("uploadPopup");
  document.getElementById('idevidencia').value = id;
  document.getElementById('textInput').value = '';
  popup.style.display = "block";
}

  function closeUploadPopup() {
  var popup = document.getElementById("uploadPopup");
  popup.style.display = "none";
}

  function uploadImages() {
      var input = document.getElementById("imageInput");
      var idtask= document.getElementById('idevidencia').value;
      var files = input.files;
      
      var formData = new FormData();
      for (var i = 0; i < files.length; i++) {
        formData.append("images[]", files[i]);
      }
      
        // Agregar el ID al formulario de datos
      formData.append("idtask", idtask);
      console.log(idtask);
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "upload.php", true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // alert("Imágenes subidas con éxito");
          closeUploadPopup();
          // Aquí puedes realizar cualquier acción adicional después de la subida exitosa
        } else if (xhr.readyState === 4 && xhr.status !== 200) {
          console.log("Error al subir las imágenes");
          // Aquí puedes realizar acciones adicionales en caso de error
        }
      };
      xhr.send(formData);
    }


 // Obtener la tabla y los encabezados de las columnas
var table = document.querySelector('.table');
var headers = table.querySelectorAll('th');

// Agregar el evento de clic a los encabezados de las columnas
headers.forEach(function(header) {
  header.addEventListener('click', function() {
    var orden = this.getAttribute('data-orden');
    var tipo = this.getAttribute('data-tipo');
      console.log(tipo);
    // Cambiar el orden
    if (orden === 'ascendente') {
      this.setAttribute('data-orden', 'descendente');
    } else {
      this.setAttribute('data-orden', 'ascendente');
    }



// Obtener los elementos de la columna
var columna = Array.from(headers).indexOf(this); // Obtener el índice de la columna
var rows = Array.from(table.querySelectorAll('tbody tr'));
var data = rows.map(function(row) {
  var cell = row.cells[columna];
  var value = cell.innerText; // Obtener el valor de la celda

  // Verificar si el tipo es color o número
  if (tipo === 'color') {
    var color = cell.style.backgroundColor;
    return { row: row, cell: cell, value: value, type: 'color', color: color };
  } else if (tipo === 'numero') {
    return { row: row, cell: cell, value: parseFloat(value), type: 'numero' };
  }
});

// Ordenar los datos según el tipo y el orden
data.sort(function(a, b) {
  var valueA = a.value;
  var valueB = b.value;

  // Verificar si el tipo es color o número
  if (a.type === 'color' && b.type === 'color') {
    var colorA = a.color;
    var colorB = b.color;

    // Convertir los colores a valores numéricos para compararlos
    var valueColorA = getColorValue(colorA);
    var valueColorB = getColorValue(colorB);

    // Si los colores son diferentes, ordenar por color
    if (valueColorA !== valueColorB) {
      return valueColorA - valueColorB;
    }
  }

  // Ordenar por valor numérico
  return valueA - valueB;
});

// Reordenar las filas según los datos ordenados
if (orden === 'descendente') {
  data.reverse();
}

// Actualizar la tabla con las filas reordenadas
data.forEach(function(item) {
  table.querySelector('tbody').appendChild(item.row);
});
  });
});





// Función para obtener el valor numérico de un color
function getColorValue(color) {
  // Verificar si el color es amarillo, rojo o verde y asignar un valor numérico correspondiente
  if (color === 'yellow') {
    return 1;
  } else if (color === 'red') {
    return 2;
  } else if (color === 'green') {
    return 3;
  } else {
    return 0;
  }
}





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
        debugger;
        // Habilitar botones
        // document.getElementById('agregar_registro').disabled = false;
        
        // localStorage.setItem(agregar_registro, 'habilitado');
        
        for (var i = 1; i <= totalFilas; i++) {
          var botonid1 = 'actualizar1' + i;
          // var botoncompletado11 = 'completado1' + i;
          var botonactualizar_coments1 = 'actualizar_coments1' + i;
          document.getElementById(botonid1).disabled = false;
          // document.getElementById(botoncompletado11).disabled = false;
          document.getElementById(botonactualizar_coments1).disabled = false; 

          // Guardar el estado de los botones en el almacenamiento local
          localStorage.setItem(botonid1, 'habilitado');
          // localStorage.setItem(botoncompletado11, 'habilitado');
          localStorage.setItem(botonactualizar_coments1, 'habilitado');
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


function actualizar(id,no_empleado) {
  debugger;
  // Preguntar al usuario si desea actualizar el registro
  if (confirm("¿Está seguro de que desea actualizar este registro?")) {
    // Hacer una solicitud AJAX para actualizar el registro en la base de datos
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "actualizar.php?id="+id+"&no_empleado="+no_empleado, true);
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

// function abrirPopup3(id) {
//   var popup = document.getElementById("miPopup3");
//   popup.style.display = "block";
//   document.getElementById("idActualizarComentario").value=id;
//   console.log(id);
// }

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
  var fechacompletado1 = document.getElementById("Fecha_completadoIN").value;
  var comentarios = document.getElementById("ComentariosIN").value;  
  console.log(area);
  console.log(noConformidad);
  console.log(acciones);
  console.log(fecha);
  console.log(owner);
  console.log(fechacompletado1);
  console.log(comentarios);
  console.log("guardar.php?=areachila="+area+"&noConformidad="+noConformidad+"&acciones="+acciones);
  debugger;
    if (area === "" || noConformidad === "" || acciones === "" || fecha === "" || owner === "" || fechacompletado1 === "" || comentarios === "") {
    alert("Por favor completa todos los campos requeridos");
    return;
  }
   // Enviamos los datos a través de AJAX usando el método POST
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "guardar.php?areachila="+area+"&noConformidad="+noConformidad+"&acciones="+acciones+"&fecha="+fecha+"&owner="+owner+"&fechacompletado="+fechacompletado1+"&comentarios="+comentarios, true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Mostramos una alerta al usuario informándole que se han guardado los datos
       // alert("Los datos han sido guardados correctamente");
      
      // Cerramos el popup

      // document.getElementById("miPopup").style.display = "none";
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
// logout para desahabilitar los botones
function submitForm2(event) {
    var totalFilas = <?php echo $contador -1; ?>;
// document.getElementById('agregar_registro').disabled=true;
// localStorage.setItem(agregar_registro, 'nohabilitado');
for(var i = 1; i <= totalFilas; i++){
          var botonid1 = 'actualizar1' + i;
          var botoncompletado11 = 'completado1' + i;
          var botonactualizar_coments1 = 'actualizar_coments1' + i;
          document.getElementById(botonid1).disabled = true;
          // document.getElementById(botoncompletado11).disabled = true;
          document.getElementById(botonactualizar_coments1).disabled = true; 

          // Guardar el estado de los botones en el almacenamiento local
          localStorage.setItem(botonid1, 'nohabilitado');
          // localStorage.setItem(botoncompletado11, 'nohabilitado');
          localStorage.setItem(botonactualizar_coments1, 'nohabilitado');

      }
  
      debugger;}

// para verificar si los botones estan habilitados cuando la paguina se refresca
 window.addEventListener('load', function () {
  var totalFilas = <?php echo $contador -1; ?> ;
  
  // var agregar_registro_ok=localStorage.getItem(agregar_registro);
  
  // if (agregar_registro_ok === 'habilitado'){
  //   document.getElementById('agregar_registro').disabled=false;
  // }
  
  for (var i = 1; i <= totalFilas; i++) {
    var botonid1 = 'actualizar1' + i;
    // var botoncompletado11 = 'completado1' + i;
    var botonactualizar_coments1 = 'actualizar_coments1' + i;
    // Obtener el estado del botón desde el almacenamiento local
    var estadobotonid1 = localStorage.getItem(botonid1);
    // var estadobotoncompletado11= localStorage.getItem(botoncompletado11);
    var estadobotonactualizar_coments1 = localStorage.getItem(botonactualizar_coments1);
    
    if (estadobotonid1 === 'habilitado') {
      document.getElementById(botonid1).disabled = false;
    }

    // if (estadobotoncompletado11 === 'habilitado') {
    //   document.getElementById(botoncompletado11).disabled = false;
    // }
        if (estadobotonactualizar_coments1 === 'habilitado') {
      document.getElementById(botonactualizar_coments1).disabled = false;
    }
  }
});

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
          var botonid1 = 'actualiza1' + i;
          var botoncompletado11 = 'completado1' + i;
          var botonactualizar_coments1 = 'actualizar_coments1' + i;
          document.getElementById(botonid1).disabled = true;
          // document.getElementById(botoncompletado11).disabled = true;
          document.getElementById(botonactualizar_coments1).disabled = true; 

          // Guardar el estado de los botones en el almacenamiento local
          localStorage.setItem(botonid1, 'nohabilitado');
          // localStorage.setItem(botoncompletado11, 'nohabilitado');
          localStorage.setItem(botonactualizar_coments1, 'nohabilitado');
    }

    // Redirigir a la página de inicio de sesión
    window.location.href = '<?php echo ROOT_ACTION; ?>';
  }
}
</script>

</html>