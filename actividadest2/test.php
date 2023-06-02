<script>
function submitForm(event) {
  event.preventDefault(); // Evitar el envío del formulario por defecto

  // Obtener los valores de usuario y contraseña
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

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
        alert("Inicio de sesión correcto");

        // Habilitar botones y realizar otras acciones necesarias
        // ...

        // Iniciar el temporizador solo cuando el inicio de sesión sea exitoso
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

// Función para iniciar el temporizador
function iniciarTemporizador() {
  // Establecer el tiempo de expiración en minutos (ejemplo: 30 minutos)
  var tiempoExpiracion = 0.2;

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
    localStorage.setItem('agregar_registro', 'nohabilitado');

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