<?php include 'includes/head.php';?>
<?php
$correo = $_SESSION['correo'];

// Listamos las team scrims disponibles
try {
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $dsn = "mysql:host=localhost;dbname=esports_finder";
    $conex = new PDO($dsn, "root", "", $opc);
    } catch (Exception $ex) {
      die("Error: ".$e->getMessage());
    }

    $listar = $conex->prepare("SELECT ts.fecha, e.nombre FROM team_scrim_cod As ts INNER JOIN equipo_cod AS e WHERE ts.id_equipo = e.id_equipo ORDER BY ts.id_teamscrim DESC");
    $listar->execute();


// Creamos una consulta para crear equipo
if (isset($_POST['proponerts'])) {
    // Recogemos los datos necesarios
    $fecha = $_POST['date'];
 

    // Hacemos la consulta
    if (empty($fecha)) {
        echo "<script type=\"text/javascript\">alert(\"Debes introducir los datos correctamente\");</script>";
    } else {

        // Obtenemos los datos del equipo según el id
        $sql = $conex->prepare("SELECT * FROM equipo_cod WHERE id_equipo=(SELECT id_equipo FROM cod WHERE created_by='$correo')");
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        $id_equipo = $resultado['id_equipo'];

        // Insertamos la ts en la base de datos
        $sql = $conex->prepare("INSERT INTO `team_scrim_cod`(`fecha`, `id_equipo`, `created_by`, `modified_by`) VALUES ('".$fecha."','".$id_equipo."','".$correo."','".$correo."')");
        $sql->execute();
        unset($conex);
        header("Location: teamscrim.php");
    }
}

?>

<body>

<?php include 'includes/navbar.php';?>

<div class="container">
        <div class="row margin-top-20">
        <button type="button" class="btn btn-primary btn-lg btn-block loginBTN" data-toggle="modal" data-target="#tsModal" name="teamscrim">Proponer TS</button>
        </div>

        <div class="row">
            <h3 class="h-align margin-top-20">Team Scrims disponibles</h3>
        </div>

        <div class="row">
        <?php while($row = $listar->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="h-align margin-top-20 ts">
                <p>El equipo <b><?php echo $row['nombre'] ?></b> ha propuesto una team scrim en la fecha: <b><?php echo $row['fecha'] ?></b></p>
                <button type="button" class="btn btn-success loginBTN">Aceptar TS</button>
            </div>
        <?php } ?>
        </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tsModal" tabindex="-1" role="dialog" aria-labelledby="tsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Cuándo quieres quedar?</h5>
      </div>
      <div class="modal-body">
        <form action="teamscrim.php" method="POST">
            <div class="form-group">
                <label for="date">Fecha y hora</label>
                <input type="datetime-local" class="form-control" id="date" name="date" min="2019-05-26T00:00">
            </div>
            <button type="submit" class="btn btn-primary btn-raised" name="proponerts" value="Proponer TS">Proponer TS</button>
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