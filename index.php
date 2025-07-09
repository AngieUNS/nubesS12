<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

  <style>
    /* Estilo para el body para centrar el contenido */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh; /* Asegura que el contenido ocupe toda la altura de la página */
      margin: 0;
      background-color: #f4f4f9; /* Fondo suave */
    }

    /* Estilo para la tabla */
    table {
      width: 100%; /* Hace que la tabla ocupe todo el ancho del contenedor */
      margin-top: 20px; /* Espacio entre el encabezado y la tabla */
    }
  </style>
</head>
<body>

    <?php
    $conexion = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), "practicas");

    $pacienteSQL = "SELECT * FROM paciente WHERE LEFT(nombre, 1) NOT IN ('A', 'E', 'I', 'O', 'U', 'a', 'e', 'i', 'o', 'u') LIMIT 1";  // Solo obtener el primer paciente
    $resultado_paciente = mysqli_query($conexion, $pacienteSQL);
    $primerPaciente = mysqli_fetch_object($resultado_paciente);  // Obtenemos el primer paciente

    // Si el primer paciente existe, mostramos su nombre
    $nombrePrimerPaciente = $primerPaciente ? $primerPaciente->nombre : "No disponible";
    ?>

    <div class="container">
      <h3 style="color: red;">Datos personales de <?php echo $nombrePrimerPaciente; ?></h3>

      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Año de Nacimiento</th>
            <th>Edad</th>
            <th>Correo 1</th>
            <th>Correo 2 </th>
            <th>Dirección</th>
            <th>Localidad ID</th>
          </tr>
        </thead>
        <tbody>
          <?php
          //$pacienteSQL = "SELECT * FROM paciente"; // Obtener todos los pacientes
          $pacienteSQL = "SELECT * FROM paciente WHERE LEFT(nombre, 1) NOT IN ('A', 'E', 'I', 'O', 'U', 'a', 'e', 'i', 'o', 'u')";

          $resultado_paciente = mysqli_query($conexion, $pacienteSQL);

          while ($fila = mysqli_fetch_object($resultado_paciente)) {
            $edad = date("Y") - $fila->anio_nacimiento;
            echo "<tr>
              <td>$fila->nombre</td>
              <td>$fila->anio_nacimiento</td>
              <td>$edad</td>
              <td>$fila->correo1</td>
              <td>$fila->correo2</td>
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
