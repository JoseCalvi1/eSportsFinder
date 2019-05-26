<?php include 'includes/head.php';?>
<?php
$correo = $_SESSION['correo'];

// Creamos una consulta para crear equipo
if (isset($_POST['crearequipo'])) {
    // Recogemos los datos necesarios
    $equipo = $_POST['equipo'];
    $teamtag = $_POST['teamtag'];
    $jugadores = $_POST['jugadores'];
    $descripcion = $_POST['descripcion'];
    $dedicado = $_POST['dedicado'];  
    $selected = '';
        $num_selected = count($_POST['tiempo']);
        $current = 0;
        foreach ($_POST['tiempo'] as $key => $value) {
            if ($current != $num_selected-1)
                $selected .= $value.', ';
            else
                $selected .= $value;
            $current++;
        }

    // Hacemos la consulta
    if (empty($equipo)) {
        echo "<script type=\"text/javascript\">alert(\"Debes introducir los datos correctamente\");</script>";
    } else {
        try {
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $dsn = "mysql:host=localhost;dbname=esports_finder";
            $conex = new PDO($dsn, "root", "", $opc);
        } catch (Exception $ex) {
          die("Error: ".$e->getMessage());
        }

        // Obtenemos el id_cod para asignarlo como capitán del equipo que está creando
        $sql = $conex->prepare("SELECT * FROM cod WHERE created_by='$correo'");
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        $id_cod = $resultado['id_cod'];
        
        // Hacemos el insert a la tabla de equipos con los datos recogidos
        $sql = $conex->prepare("INSERT INTO `equipo_cod`(`id_equipo`, `nombre`, `team_tag`, `num_jugadores`, `descripcion`, `tiempo_juego`, `disponibilidad`, `created_by`, `modified_by`, `id_capitan`) ".
                                                " VALUES ('','".$equipo."','".$teamtag."','".$jugadores."','".$descripcion."','".$dedicado."','".$selected."','".$correo."','".$correo."','".$id_cod."')");
        $sql->execute();

        // Actualizamos el perfil de cod para asignarle valor al campo id_equipo
        $sql = $conex->prepare("UPDATE `cod` SET `id_equipo`=(SELECT id_equipo FROM equipo_cod WHERE `created_by`='".$correo."') WHERE `created_by`='".$correo."'");
        $sql->execute();
        unset($conex);
        header("Location: index.php");

    }
}
?>

<body>

<?php include 'includes/navbar.php';?>

<div class="container">
        <div class="row">
                <form class="formcrear margin5" action="crearequipo.php" method="POST">
                    <div class="form-group">
                        <label for="equipo">Nombre del equipo:</label>
                        <input id="equipo" type="text" class="form-control" placeholder="Nombre del equipo" name="equipo" required>
                        <small class="form-text text-muted">Se podrá buscar el equipo por su nombre en el listado.</small>
                    </div>
                    <div class="form-group">
                        <label for="teamtag">Team Tag</label>
                        <input type="text" class="form-control" placeholder="Tag del equipo" maxlength="4" name="teamtag" required>
                        <small class="form-text text-muted">Máximo 4 letras.</small>
                    </div>
                    <div class="form-group">
                        <label for="jugadores">Jugadores en el equipo</label>
                        <select class="form-control" name="jugadores">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" rows="3" placeholder="Opcional" name="descripcion"></textarea>
                    </div>
                    <fieldset class="form-group">
                        <label for="dedicado">Tiempo dedicado/día</label>
                        <select class="form-control" name="dedicado">
                            <option>Menos de 2 horas</option>
                            <option>Entre 2 y 4 horas</option>
                            <option>Más de 4 horas</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="tiempo">Disponibilidad</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="tiempo[]" value="Mañana"> Mañana
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="tiempo[]" value="Tarde"> Tarde
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="tiempo[]" value="Noche"> Noche
                            </label><br>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary" name="crearequipo">Crear equipo</button>
                </form>
                <br>
            </div>
        </div>
</div>

<?php include '../includes/foot.php';?>

<?php include 'includes/footer.php';?>