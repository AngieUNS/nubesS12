<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Catálogo de Personas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;  /* Asegura que el contenido esté centrado en pantalla completa */
      margin: 0;
    }
    table {
      width: 80%; /* Ajusta el tamaño de la tabla según necesites */
      margin-top: 20px;
    }
  </style>
</head>
<body>

    <?php
    $conexion = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), "practicas");

    $pacienteSQL = "SELECT * FROM paciente LIMIT 1";  // Solo obtener el primer paciente
    $resultado_paciente = mysqli_query($conexion, $pacienteSQL);
    $primerPaciente = mysqli_fetch_object($resultado_paciente);  // Obtenemos el primer paciente

    // Si el primer paciente existe, mostramos su nombre
    $nombrePrimerPaciente = $primerPaciente ? $primerPaciente->nombre : "No disponible";
    ?>

    <h3 style="color: red; text-align: center;">Datos personales de <?php echo $nombrePrimerPaciente; ?></h3>

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
        $pacienteSQL = "SELECT * FROM paciente"; // Obtener todos los pacientes
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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>

