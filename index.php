<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Catálogo de Personas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Catálogo de Personas</h1>
    </div>

    <h3>Tabla Padre: Actividades</h3>
    <table class="table table-bordered">
      <thead class="thead-light">
        <tr>
          <th>ID</th>
          <th>Actividad</th>
          <th>Detalle</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $conexion = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), "UNS");

        $actividadSQL = "SELECT * FROM actividad";
        $resultado_actividad = mysqli_query($conexion, $actividadSQL);

        while ($fila = mysqli_fetch_object($resultado_actividad)) {
          echo "<tr>
            <td>$fila->id</td>
            <td>$fila->actividad</td>
            <td>$fila->detalle</td>
          </tr>";
        }
        ?>
      </tbody>
    </table>

    <h3>Tabla Hija: Personas</h3>
    <table class="table table-striped table-responsive">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Año de Nacimiento</th>
          <th>Edad (Calculado)</th>
          <th>Correos (Multivalorado)</th>
          <th>Dirección</th>
          <th>Actividad ID (FK)</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $personaSQL = "SELECT * FROM persona";
        $resultado_persona = mysqli_query($conexion, $personaSQL);

        while ($fila = mysqli_fetch_object($resultado_persona)) {
          $edad = date("Y") - $fila->anio_nacimiento;
          echo "<tr>
            <td>$fila->nombre</td>
            <td>$fila->anio_nacimiento</td>
            <td>$edad</td>
            <td>$fila->correos</td>
            <td>$fila->direccion</td>
            <td>$fila->actividad_id</td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
