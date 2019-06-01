<?php include 'includes/head.php';?>
<?php
$correo = $_SESSION['correo'];
$error = "d-none";

// Listamos las team scrims disponibles
try {
  $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
  $dsn = "mysql:host=localhost;dbname=esports_finder";
  $conex = new PDO($dsn, "root", "", $opc);
  //$dsn = "mysql:host=esportsfpqjose.mysql.db;dbname=esportsfpqjose";
  //$conex = new PDO($dsn, "esportsfpqjose", "19TEquiero2014", $opc);
    } catch (Exception $ex) {
      die("Error: ".$e->getMessage());
    }

    $listar = $conex->prepare("SELECT * FROM mensajes WHERE send_to='".$correo."' ORDER BY id_mensaje DESC");
    $listar->execute();


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
        $sql = $conex->prepare("INSERT INTO `mensajes`(`send_from`, `send_to`, `mensaje`) VALUES ('".$correo."','".$destinatario."','".$mensaje."')");
        $sql->execute();
        unset($conex);
        header("Location: mensajes.php");
    }
}

?>

<body>

<?php include 'includes/navbar.php';?>

<div class="container">
        <div class="row margin-top-20">
        <button type="button" class="btn btn-primary btn-lg btn-block loginBTN" data-toggle="modal" data-target="#mensajeModal" name="enviar">Enviar mensaje</button>
        </div>
        <div class="alert alert-warning <?php echo $error ?>" role="alert"><strong>Oh vaya!</strong> Parece que no has rellenado los datos correctamente.</div>

        <div class="row">
            <h3 class="h-align margin-top-20">Mensajes recibidos</h3>
        </div>

        <div class="row">
        <?php while($row = $listar->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="col-12 h-align margin-top-20 ts">
                <p>El usuario: <b><?php echo $row['send_from'] ?></b> te ha escrito:<br><?php echo $row['mensaje'] ?></p>
            </div>
        <?php } ?>
        </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="mensajeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Qué le quieres decir?</h5>
      </div>
      <div class="modal-body">
        <form action="mensajes.php" method="POST">
            <div class="form-group">
                <label for="mensaje">Destinatario</label>
                <input type="text" class="form-control" id="destinatario" name="destinatario">
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