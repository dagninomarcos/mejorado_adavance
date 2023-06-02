<?php require('config/config.php')?>
<?php include('config/db.php') ?>
<?php include('config/header.php')?>
<style>
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

.botons-local{
  height: 100px;
  width: 300px;
}
.grid-container-big {
  margin: auto;
  width: max-content;
}

.contariner-botones-local {
  display: grid;
  grid-template-columns: auto auto auto;
  grid-auto-columns: auto auto auto auto;
  align-content: center;
}

  h1{
    text-align: center;
    color: white;
  }
</style>


<body <?php include('config/body.php')?> >
<?php include('navbar.php');?>

<div class="main" style="display:grid; grid-template-rows: auto auto;">
  <div>
    <div class="grid-container-big contariner-botones-local">
    <h1>Upload Imagen for Each</h1>
    </div>
          <div class="grid-container-big contariner-botones-local">
          <button class="botones botons-local" onclick="openUploadPopup(1)">RMA FAR's OPEN 2022</button>
          <button class="botones botons-local" onclick="openUploadPopup(2)">QUALITY ALERT 1</button>
          <button class="botones botons-local" onclick="openUploadPopup(3)">RMA FAR's OPEN 2023</button>
          <button class="botones botons-local" onclick="openUploadPopup(4)">RMA FAR's TOP 5 Customers</button>
          <button class="botones botons-local" onclick="openUploadPopup(5)">QUALITY ALERT 2</button>
          <button class="botones botons-local" onclick="openUploadPopup(6)">RMA FAR's TOP 5 Customers</button>
          <button class="botones botons-local" onclick="openUploadPopup(7)">ACTIONS 2022</button>
          <button class="botones botons-local" onclick="openUploadPopup(8)">QUALITY ALERT 3</button>
          <button class="botones botons-local" onclick="openUploadPopup(9)">ACTIONS 2023</button>
          <button class="botones botons-local" onclick="openUploadPopup(10)">COUNTERMEASURES 2022</button>
          <button class="botones botons-local" onclick="openUploadPopup(11)">QUALITY ALERT 3</button>
          <button class="botones botons-local" onclick="openUploadPopup(12)">COUNTERMEASURES 2023</button>
          </div>
  </div>

<div class="grid-container-big contariner-botones-local">
  <div>
  <h1>Update the Current Day</h1>
  <div style="display:grid; grid-template-columns: auto auto ;">
  <button class="botones botons-local" onclick="completeStatus(1)">Buena</button>
  <button class="botones botons-local" onclick="completeStatus(2)">Malo</button>
  </div>
  <div>
  </div>  
</div>
</div>
</div>




<!-- upload pop up -->
<div id="uploadPopup" class="upload-popup">
  <div class="upload-popup-content">
    <h2>Subir Imagen</h2>
    <input type="hidden" name="idevidencia" id="idevidencia" value="">
    <input type="file" id="imageInput" name="image">
    <!-- <button onclick="uploadImage()">Subir</button> -->
    <button onclick="closeUploadPopup()">Cerrar</button>
    <button class="complete-button" onclick="completeUpload(document.getElementById('idevidencia').value)">Completar</button>
  </div>
</div>




</body>
<script>
  function completeUpload(id) {
    debugger;
    uploadImage();
    closeUploadPopup();
}

  function openUploadPopup(id) {
  debugger;
  document.getElementById('imageInput').value ='';
  document.getElementById("idevidencia").value = id;
  var popup = document.getElementById("uploadPopup");
  popup.style.display = "block";
}

  function closeUploadPopup() {
  var popup = document.getElementById("uploadPopup");
  popup.style.display = "none";
}

function uploadImage() {
  debugger;
  var input = document.getElementById("imageInput");
  var idtask = document.getElementById('idevidencia').value;
  var file = input.files[0];

  // Verificar si se seleccionó una imagen
  if (!file) {
    alert("Por favor, selecciona una imagen.");
    return;
  }

  var formData = new FormData();
  formData.append("image", file);
  formData.append("idtask", idtask);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "upload.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      alert("Imagen subida con éxito");
      closeUploadPopup();
      // Aquí puedes realizar cualquier acción adicional después de la subida exitosa
    } else if (xhr.readyState === 4 && xhr.status !== 200) {
      console.log("Error al subir la imagen");
      // Aquí puedes realizar acciones adicionales en caso de error
    }
  };
  xhr.send(formData);
}

function completeStatus(status_dato) {
    // ...
    debugger;
    var xhr = new XMLHttpRequest();
    var url = "actualizar_dia.php";
    var params = "status_dato=" + encodeURIComponent(status_dato);
    
    xhr.open("GET", url + "?" + params, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Manejar la respuesta del servidor
            var response = xhr.responseText;
            alert(response);
        } else if (xhr.readyState === 4 && xhr.status !== 200) {
            console.log("Error al actualizar el registro");
        }
    };
    
    xhr.send();
}



</script>
</html>