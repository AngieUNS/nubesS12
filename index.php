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
      <h1 class="display-4">Catálogo </h1>
    </div>
        <?php
        $conexion = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), "practicas");

        $localidadSQL = "SELECT * FROM localidad";
        $resultado_localidad = mysqli_query($conexion, $localidadSQL);

        while ($fila = mysqli_fetch_object($resultado_localidad)) {
          echo "<tr>
            <td>$fila->id</td>
            <td>$fila->localidad</td>
            <td>$fila->detalle</td>
          </tr>";
        }
        ?>
      </tbody>
    </table>

    <h3>DATOS PERSONALES DE ANGIE CASTILLO</h3>
    <table class="table table-striped table-responsive">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Año de Nacimiento</th>
          <th>Edad</th>
          <th>Correos</th>
          <th>Dirección</th>
          <th>Localidad ID</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $pacienteSQL = "SELECT * FROM paciente";
        $resultado_paciente = mysqli_query($conexion, $pacienteSQL);

        while ($fila = mysqli_fetch_object($resultado_paciente)) {
          $edad = date("Y") - $fila->anio_nacimiento;
          echo "<tr>
            <td>$fila->nombre</td>
            <td>$fila->anio_nacimiento</td>
            <td>$edad</td>
            <td>$fila->correos</td>
            <td>$fila->direccion</td>
            <td>$fila->localidad_id</td>
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
