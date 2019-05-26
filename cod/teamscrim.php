<?php include 'includes/head.php';?>
<?php
$correo = $_SESSION['correo'];
// Creamos una consulta para crear equipo
if (isset($_POST['proponerts'])) {
    // Recogemos los datos necesarios
    $fecha = $_POST['date'];
    $hora = $_POST['time'];
 

    // Hacemos la consulta
    if (empty($fecha) || empty($hora)) {
        echo "<script type=\"text/javascript\">alert(\"Debes introducir los datos correctamente\");</script>";
    } else {
        try {
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $dsn = "mysql:host=localhost;dbname=esports_finder";
            $conex = new PDO($dsn, "root", "", $opc);
        } catch (Exception $ex) {
          die("Error: ".$e->getMessage());
        }

        // Obtenemos los datos del equipo según el id
        $sql = $conex->prepare("SELECT * FROM equipo_cod WHERE id_equipo=(SELECT id_equipo FROM cod WHERE created_by='$correo')");
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        $id_equipo = $resultado['id_equipo'];

        // Insertamos la ts en la base de datos
        $sql = $conex->prepare("INSERT INTO `team_scrim_cod`(`fecha`, `hora`, `id_equipo`, `created_by`, `modified_by`) VALUES ('".$fecha."','".$hora."','".$id_equipo."','".$correo."','".$correo."')");
        $sql->execute();
        unset($conex);
        header("Location: teamscrim.php");
    }
}

?>

<body>

<?php include 'includes/navbar.php';?>

<div class="container">
        <div class="row">
        <button type="button" class="btn btn-primary btn-lg btn-block loginBTN" data-toggle="modal" data-target="#tsModal" name="teamscrim">Proponer TS</button>
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
                <label for="date">Fecha</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="time">Hora</label>
                <input type="time" class="form-control" id="time" name="time">
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