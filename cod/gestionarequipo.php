<?php include 'includes/head.php';?>
<?php
$error = "d-none";

// Comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['correo'])) {
    die("<h1>Error - debe <a href='Login.php'>identificarse</a>.</h1><br>");
} else {
  try {
    $correo = $_SESSION['correo'];
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $dsn = "mysql:host=localhost;dbname=esports_finder";
    $conex = new PDO($dsn, "root", "", $opc);
    //$dsn = "mysql:host=esportsfpqjose.mysql.db;dbname=esportsfpqjose";
    //$conex = new PDO($dsn, "esportsfpqjose", "19TEquiero2014", $opc);
    } catch (Exception $ex) {
      die("Error: ".$e->getMessage());
    }

    // Obtenemos los datos del equipo según el id
    $sql = $conex->prepare("SELECT * FROM equipo_cod WHERE id_equipo=(SELECT id_equipo FROM cod WHERE created_by='$correo')");
    $sql->execute();
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);
    $id_equipo = $resultado['id_equipo'];

    // Obtenemos los datos de los jugadores de dicho equipo para mostrarlos
    $listar = $conex->prepare("SELECT * FROM cod WHERE id_equipo='$id_equipo'");
    $listar->execute();
}


// Hacemos la consulta para modificar el equipo
if (isset($_POST['modificarequipo'])) {

    $equipo = $_POST['equipo'];
    $teamtag = $_POST['teamtag'];
    $jugadores = $_POST['jugadores'];
    $descripcion = $_POST['descripcion'];
    $dedicado = $_POST['dedicado']; 

    if (empty($equipo)) {
        $error = "";
    } else {
        try {
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $dsn = "mysql:host=localhost;dbname=esports_finder";
            $conex = new PDO($dsn, "root", "", $opc);
        } catch (Exception $ex) {
          die("Error: ".$e->getMessage());
        }
        
        $modificar = $conex->prepare("UPDATE `equipo_cod` SET `nombre`='$equipo',`team_tag`='$teamtag',`num_jugadores`='$jugadores',`descripcion`='$descripcion',`tiempo_juego`='$dedicado',`modified_by`='$correo' WHERE created_by='$correo'");
        $modificar->execute();

        header("Location: gestionarequipo.php");

    }
}

// Hacemos eliminar el equipo
if (isset($_POST['eliminarequipo'])) {
    if (empty($id_equipo)) {
        $error = "";
    } else {
        try {
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $dsn = "mysql:host=localhost;dbname=esports_finder";
            $conex = new PDO($dsn, "root", "", $opc);
        } catch (Exception $ex) {
          die("Error: ".$e->getMessage());
        }
        
        $sql = $conex->prepare("DELETE FROM `equipo_cod` WHERE id_equipo='$id_equipo'");
        $sql->execute();

        $sql = $conex->prepare("UPDATE `cod` SET `id_equipo`=null WHERE id_equipo='$id_equipo'");
        $sql->execute();

        header("Location: index.php");
    }
}


// Hacemos la consulta para agregar jugadores a los equipos
if (isset($_POST['agregarjugador'])) {
    $jugador = $_POST['jugador'];
    if (empty($jugador)) {
        $error = "";
    } else {
        try {
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $dsn = "mysql:host=localhost;dbname=esports_finder";
            $conex = new PDO($dsn, "root", "", $opc);
        } catch (Exception $ex) {
          die("Error: ".$e->getMessage());
        }
        
        $modificar = $conex->prepare("UPDATE `cod` SET `id_equipo`='$id_equipo' WHERE created_by='$jugador'");
        $modificar->execute();

        header("Location: gestionarequipo.php");
    }
}

?>



<body>

<?php include 'includes/navbar.php';?>

<div class="container">
        <div class="row">
        <div class="alert alert-warning <?php echo $error ?>" role="alert"><strong>Oh vaya!</strong> Parece que no has rellenado los datos correctamente.</div>
        <h2>Datos del equipo</h2>
                <form class="formcrear margin5" action="gestionarequipo.php" method="POST">
                    <div class="form-group">
                        <label for="equipo">Nombre del equipo:</label>
                        <input id="equipo" type="text" class="form-control" placeholder="Nombre del equipo" name="equipo" value="<?php echo $resultado['nombre']; ?>" required>
                        <small class="form-text text-muted">Se podrá buscar el equipo por su nombre en el listado.</small>
                    </div>
                    <div class="form-group">
                        <label for="teamtag">Team Tag</label>
                        <input type="text" class="form-control" placeholder="Tag del equipo" maxlength="4" name="teamtag" value="<?php echo $resultado['team_tag']; ?>" required>
                        <small class="form-text text-muted">Máximo 4 letras.</small>
                    </div>
                    <div class="form-group">
                        <label for="jugadores">Jugadores en el equipo</label>
                        <input id="jugadores" type="number" class="form-control" name="jugadores" value="<?php echo $resultado['num_jugadores']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" rows="3" placeholder="Opcional" name="descripcion" value="<?php echo $resultado['descripcion']; ?>"></textarea>
                    </div>
                    <fieldset class="form-group">
                        <label for="dedicado">Tiempo dedicado/día</label>
                        <input id="dedicado" type="number" class="form-control" name="dedicado" value="<?php echo $resultado['tiempo_juego']; ?>" required>
                    </fieldset>
                    <button type="submit" class="btn btn-primary" name="modificarequipo">Modificar equipo</button>
                </form>
                <form class="formcrear margin5" action="gestionarequipo.php" method="POST">
                    <button type="submit" class="btn btn-danger" name="eliminarequipo">Eliminar equipo</button>
                </form>
                <br>
            </div>
        </div>
        </div>
        <?php 
                
        ?>
        <div class="container">
            <div class="row">
            <h2>Agregar jugadores</h2>
                <form class="formcrear margin5" action="gestionarequipo.php" method="POST">
                    <div class="form-group">
                        <label for="jugador" class="bmd-label-floating">Correo electrónico</label>
                        <input id="jugador" type="text" class="form-control" name="jugador" required>
                        <small class="form-text text-muted">Inserta el email del jugador que quieras agregar.</small>
                        <button type="submit" class="btn btn-primary" name="agregarjugador">Añadir jugador</button>
                    </div>
                </form>
            </div>
        </div>

    <div class="container">
        <div class="row">
        <h2>Listado de jugadores</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>Jugador</th>
                    <th>Posición</th>
                    <th>Modo</th>
                    <th>Acción</th>
                    </tr>
                </thead>
                <tbody id="tabla">
                    <?php while($row = $listar->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td> <?php echo $row['nombre'] ?></td>
                            <td> <?php echo $row['rol'] ?></td>
                            <td> <?php echo $row['modo_pref'] ?></td>
                            <td>
                            <button type="button" class="btn btn-info btn-lg glyphicon glyphicon-user" data-toggle="modal" data-target="#eliminar">-</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div style="height:50px"></div>

<div id="eliminar" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">¿Estás seguro?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>¿Estás seguro de eliminar a esta persona del equipo?.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php include '../includes/foot.php';?>

<?php include 'includes/footer.php';?>