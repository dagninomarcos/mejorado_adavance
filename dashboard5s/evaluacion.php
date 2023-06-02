<?php require('config/config.php')?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" type="image/x-icon" href="icon/logo.ico">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <title>Dashboaaaard 5S</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap1.min.css">
</head>

<style>
td, th {
  padding: 1rem;
}
table {
    border-spacing: 5px;
}
table, td, th {
  border: 1px solid;

}   

.stilo-preguntas{
  text-align: center;
  font-family: arial black;
  font-size: 13px;
  width: 740px;
}
.grid-container-evaluacion{
  display: flex;
  grid-template-columns: 1fr;

} 

.main_evaluacion{
  display: grid;
  grid-template-columns: auto;

  align-content: center;
/*  background-color: white;*/
  padding: .5rem;
  flex: 10 10 100px;
  align-items: center;
  justify-content: center;
  margin: 4px;
}
textarea {
  resize: none;
}
</style>

<body style="background-image: url('icon/Fondo_6.png');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover; 
    background-position-y: center;
    background-attachment: fixed;
    height: 860px;
    width: 100%;"
 >

<header class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid" style="background-color: black;">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?php echo ROOT_HOME; ?>" class="nav-link px-2 text-white" style="font-size: 20px; font-family: arial black;">HOME</a></li>
          <li><a href="<?php echo ROOT_URL; ?>" class="nav-link px-2 text-white" style="font-size: 20px;">Areas</a></li>
          <li><a href="<?php echo ROOT_GENERAL; ?>" class="nav-link px-2 text-white" style="font-size: 20px;" >General</a></li>
          <li><a href="<?php echo ROOT_LLENAR_DATA; ?>" class="nav-link px-2 text-white" style="font-size: 20px;">Data</a></li>
          <li><a href="<?php echo ROOT_DOWNLOAD; ?>" class="nav-link px-2 text-white" style="font-size: 20px;">Download Info</a></li>
          <li><a href="<?php echo ROOT_EVALUACION; ?>" class="nav-link px-2 text-white" style="font-size: 20px;">Evaluacion</a></li>
          <li><a href="<?php echo ROOT_ANUAL; ?>" class="nav-link px-2 text-white" style="font-size: 20px;">Anual</a></li>
          <li><a href="<?php echo ROOT_ACTION; ?>" class="nav-link px-2 text-white" style="font-size: 20px;">Acciones</a></li>
        </ul>
      </div>
</header>
<div class="main">
  <aside class="left_general">
    
  </aside>
<main class="main_evaluacion">

<div class="grid-container-evaluacion">
  <form>
<!-- tabla 1s  -->
<table class="table table-hover">
  
  <thead>
    <tr class="table-dark">
      <th scope="col">No.</th>
      <th scope="col" style="text-align:center;">1'S DESPEJAR:"Mantener solo lo necesario"</th>
      <th scope="col" style="width:160px;">Abreviacion>
      <th scope="col">SI</th>
      <th scope="col">NO</th>
      <th scope="col">Comentarios</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-light">
      <th scope="row">1</th>
      <td>
    <p class="stilo-preguntas">
    ¿Está el área de trabajo libre de cajas vacías y/o trapos sucios? Si la respuesta es NO; entonces ¿Tiene un área asignada para colocarlos? Evidencia objetiva: tomar foto</p>
      </td><td><p>1S P1 - Caja/Trapo</p></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ1" id="1SQ1-1" value="1" required></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ1" id="1SQ1-0" value="0" required></td>
      </td><td><textarea id="1SQ1-Coment" name="1SQ1-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>
      </tr>
    <tr class="table-secondary" >
      <th scope="row">2</th>
      <td>
    <p class="stilo-preguntas">
    ¿Están los pasillos de tránsito libres de obstáculos que afecten el flujo: Pallets, carritos, material, botes de basura? Evidencia objetiva: tomar foto</p>
    </td>
    </td><td><p>1S P2 - Pasillo</p></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ2" id="1SQ2-1" value="1" required></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ2" id="1SQ2-0" value="0" required></td>
      </td><td><textarea id="1SQ2-Coment" name="1SQ2-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>
    </tr>

    <tr class="table-light">
      <th scope="row">3</th>
      <td>
  <p class="stilo-preguntas">
    ¿Se encuentra el área libre de documentos sin uso, obsoletos o en mal estado ?: Ayudas visuales obsoletas, documentos fuera de revisión, documentación ilegible o rayados? De acuerdo a ayudas visuales actuales Evidencia objetiva: foto o copias</p>
      </td>
      </td><td><p>1S P3 - Docs</p></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ3" id="1SQ3-1" value="1" required></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ3" id="1SQ3-0" value="0" required></td>
      </td><td><textarea id="1SQ3-Coment" name="1SQ3-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>
    </tr>

    <tr class="table-secondary">
      <th scope="row">4</th>
      <td>
  <p class="stilo-preguntas">
    ¿Se encuentran los escritorios libres de  materiales, herramientas y equipo que no se utilizan en el área de trabajo? Evidencia objetiva: foto</p>
      </td>
      </td><td><p>1S P4 - Escritorio</p></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ4" id="1SQ4-1" value="1" required></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ4" id="1SQ4-0" value="0" required></td>
      </td><td><textarea id="1SQ4-Coment" name="1SQ4-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>
    </tr>

    <tr class="table-light">
      <th scope="row">5</th>
      <td>
  <p class="stilo-preguntas">
      ¿Las estaciones de trabajo están  libres de herramientas y/o equipos innecesarios? De acuerdo a ayuda visual actual Evidencia objetiva: foto</p>
      </td>
      </td><td><p>1S P5 - Htas</p></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ5" id="1SQ5-1" value="1" required></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ5" id="1SQ5-0" value="0" required></td>
      </td><td><textarea id="1SQ5-Coment" name="1SQ5-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>
    </tr>

    <tr class="table-secondary">
      <th scope="row">6</th>
      <td>
  <p class="stilo-preguntas">
      ¿Las estaciones de trabajo están libres de  material  ó  producto rezagado? Evidencia objetiva foto y tomar información de número de parte de material extra o rezagado</p>
      </td>
      </td><td><p>1S P6 - Material</p></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ6" id="1SQ6-1" value="1" required></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ6" id="1SQ6-0" value="0" required></td>
      </td><td><textarea id="1SQ6-Coment" name="1SQ6-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>
    </tr>

    <tr class="table-light">
      <th scope="row">7</th>
      <td>
  <p class="stilo-preguntas">
      ¿Está el área libre de cartón, tanto en materia prima como estaciones de trabajo? Evidencia objetiva: foto</p>
      </td>
      </td><td><p>1S P7 - Cartón</p></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ7" id="1SQ7-1" value="1" required></td>
      </td><td><input class="form-check-input" type="radio" name="1SQ7" id="1SQ7-0" value="0" required></td>
      </td><td><textarea id="1SQ7-Coment" name="1SQ7-Coment" rows="2" cols="50" placeholder="Comentarios"></textarea></td>
    </tr>
  </tbody>
</table>

</div>

<div style="align-content:center; text-align: center;">
  
  <label class="letras_forma" for="Fecha">Fecha:</label>
  <input class="Opiciones" type="date" id="Fecha" name="Fecha" required>
  <label class="letras_forma" for="Auditor">Auditor</label>
  <select class="Opiciones" name="Auditor" id="Auditor" required>
    <option value="">--Please choose an option--</option>
    <option value="Yoselin Salazar ">Yoselin Salazar </option>
    <option value="Enrique Ambriz">Enrique Ambriz</option>
    <option value="Julio Saavedra">Julio Saavedra</option>
    <option value="Marco Barajas">Marco Barajas</option>
    <option value="Jaime Murillo">Jaime Murillo</option>
    <option value="Arturo Melendrez ">Arturo Melendrez </option>
    <option value="Gisel Carmona">Gisel Carmona</option>
    <option value="Luis Aguillon">Luis Aguillon</option>
    <option value="Arcadio Navarro">Arcadio Navarro</option>
    <option value="Nestor German">Nestor German</option>
    <option value="German Aguilar">German Aguilar</option>
    <option value="Rafael Espinoza">Rafael Espinoza</option>
    <option value="Manuel Flores ">Manuel Flores </option>
    <option value="Octavio Hernandez">Octavio Hernandez</option>
    <option value="Adrian Delgado">Adrian Delgado</option>
    <option value="Rafael Rodriguez">Rafael Rodriguez</option>
    <option value="Zaida Sanchez">Zaida Sanchez</option>
    <option value="Edgardo Palero">Edgardo Palero</option>
    <option value="Rodrigo Gutierrez">Rodrigo Gutierrez</option>
    <option value="Andres Osorio">Andres Osorio</option>
    <option value="Ramiro Garcia">Ramiro Garcia</option>
    <option value="Sergio Godoy">Sergio Godoy</option>
    <option value="Estefania Peña">Estefania Peña</option>
  </select>
  <input type="text" id="Auditor" name="Auditor" style="height:55px; text-align:center; align-content:center;" disabled>
  <label class="letras_forma" for="Area">Area</label>
  <select class="Opiciones" name="Area" id="Area" required>
<?php include('config/list_areas.php');?>
</select>
<label class="letras_forma" for="Auditado">Auditado</label>
<input type="text" id="Auditado" name="Auditado" style="height:55px; text-align:center; align-content:center;" required> 
<input type="submit" name="submite" value="Aceptar" class="btn btn-lg btn-primary" style="width:150px; text-align:center; align-content:center;">
</div>

</form>

</main>
<aside class="right_general">
  
</aside>
</div>
</body>
</html>
