<?php include 'includes/head.php';?>
<?php
$correo = $_SESSION['correo'];
  // Creamos una consulta para listar todos los equipos disponibles
  try {
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $dsn = "mysql:host=localhost;dbname=esports_finder";
    $conex = new PDO($dsn, "root", "", $opc);
    //$dsn = "mysql:host=esportsfpqjose.mysql.db;dbname=esportsfpqjose";
    //$conex = new PDO($dsn, "esportsfpqjose", "19TEquiero2014", $opc);
    } catch (Exception $ex) {
      die("Error: ".$e->getMessage());
    }

    $sql = $conex->prepare("SELECT * FROM equipo_cod");
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
    <h2>Búsqueda de equipos</h2>
    <p>Puedes buscar un equipo por su nombre, team tag o número de jugadores:</p>
    <input class="form-control" id="search" type="text" placeholder="Buscar..">
    <br>
    <table id="mytable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Equipo</th>
          <th>Team Tag</th>
          <th>Nº Jug.</th>
          <th>Contacta</th>
        </tr>
      </thead>
      <tbody id="tabla">
      <?php while($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
        <?php $send_to = $row['created_by'] ?>
        <tr>
            <td> <?php echo $row['nombre'] ?></td>
            <td> <?php echo $row['team_tag'] ?></td>
            <td> <?php echo $row['num_jugadores'] ?></td>
            <td>
            <form action="fa.php" method="POST">
              <div class="form-group">
                  <input type="hidden" class="form-control" id="destinatario" name="destinatario" value="<?php echo $send_to ?>">
              </div>
              <div class="form-group">
                  <input type="hidden" class="form-control" id="mensaje" name="mensaje" value="Buenas! Me gustaría unirme a tu equipo.">
              </div>
              <button type="submit" class="btn btn-primary btn-raised" name="enviarmensaje" value="enviarmensaje">C</button>
            </form>
            </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  <!-- Modal -->
<div class="modal fade" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="mensajeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Qué le quieres decir?</h5>
      </div>
      <div class="modal-body">
        <form action="unirseaequipo.php" method="POST">
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
  <script>
 // Buscará en el evento keyup
 $(document).ready(function(){
 $("#search").keyup(function(){
 _this = this;
 // Mostrará las filas que contengan lo escrito en el buscador
 $.each($("#mytable tbody tr"), function() {
 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
 $(this).hide();
 else
 $(this).show();
 });
 });
});
</script>