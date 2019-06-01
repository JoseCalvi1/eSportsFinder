<?php include 'includes/head.php';?>
<?php
$correo = $_SESSION['correo'];


  // Consulta para listar los jugadores que no están en ningún equipo
  try {
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $dsn = "mysql:host=localhost;dbname=esports_finder";
    $conex = new PDO($dsn, "root", "", $opc);
    //$dsn = "mysql:host=esportsfpqjose.mysql.db;dbname=esportsfpqjose";
    //$conex = new PDO($dsn, "esportsfpqjose", "19TEquiero2014", $opc);
    } catch (Exception $ex) {
      die("Error: ".$e->getMessage());
    }

    $sql = $conex->prepare("SELECT * FROM cod WHERE id_equipo is null");
    $sql->execute();

    // Creamos una consulta para enviar mensajes
if (isset($_POST['enviarmensaje'])) {
  // Recogemos los datos necesarios
  $destinatario = $_POST['destinatario'];
  $mensaje = $_POST['mensaje'];


  // Hacemos la consulta
  if (empty($destinatario) || empty($mensaje)) {
    $error = "";
  } else {
      // Insertamos el mensaje en la base de datos
      $enviar = $conex->prepare("INSERT INTO `mensajes`(`send_from`, `send_to`, `mensaje`) VALUES ('".$correo."','".$destinatario."','".$mensaje."')");
      $enviar->execute();
  }
}
?>

<body>

<?php include 'includes/navbar.php';?>

<div class="container">
    <div class="col-sm-12 equipo">
    </div>
    <h2>Búsqueda de jugadores</h2>
    <p>Puedes buscar un jugador por su nombre, posición o modo preferido:</p>
    <input class="form-control" id="buscar" type="text" placeholder="Buscar..">
    <br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Jugador</th>
          <th>Posición</th>
          <th>Modo</th>
          <th>Horario</th>
          <th>Contacta</th>
        </tr>
      </thead>
      <tbody id="tabla">
      <?php while($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
        <?php $send_to = $row['created_by'] ?>
        <tr>
            <td> <?php echo $row['nombre'] ?></td>
            <td> <?php echo $row['rol'] ?></td>
            <td> <?php echo $row['modo_pref'] ?></td>
            <td> <?php echo $row['tiempo_juego'] ?></td>
            <td>
              <button type="button" class="btn btn-info btn-lg glyphicon glyphicon-user" data-toggle="modal" data-target="#mensajeModal">C</button>
            </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>

  <!-- Modal -->
<div class="modal fade" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="mensajeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Qué le quieres decir?</h5>
      </div>
      <div class="modal-body">
        <form action="fa.php" method="POST">
            <div class="form-group">
                <label for="mensaje">Destinatario</label>
                <input type="text" class="form-control" id="destinatario" name="destinatario" value="<?php echo $send_to ?>">
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea class="form-control" rows="3" name="mensaje"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-raised" name="enviarmensaje" value="enviarmensaje">Enviar mensaje</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<?php include '../includes/foot.php';?>

  <?php include 'includes/footer.php';?>