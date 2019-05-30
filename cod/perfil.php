<?php  
if (!isset($_SESSION['correo'])) {
session_start();
$correo = $_SESSION['correo'];
$id_usuario = $_SESSION['id_usuario'];
}

// Hacemos una consulta para crear la ficha de cod
if (isset($_POST['crearjugador'])) {
    $jugador = $_POST['jugador'];
    $rol = $_POST['rol'];       
    $modo = $_POST['modo'];
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

    
    if (empty($jugador)) {
        $error = "Debes introducir los datos";
    } else {
        try {
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $dsn = "mysql:host=localhost;dbname=esports_finder";
            $conex = new PDO($dsn, "root", "", $opc);
            //$dsn = "mysql:host=esportsfpqjose.mysql.db;dbname=esportsfpqjose";
            //$conex = new PDO($dsn, "esportsfpqjose", "19TEquiero2014", $opc);
        } catch (Exception $ex) {
          die("Error: ".$e->getMessage());
        }
        
$sql = $conex->prepare("INSERT INTO `cod`(`id_cod`, `nombre`, `rol`, `modo_pref`, `descripcion`, `tiempo_juego`, `disponibilidad`, `created_by`, `modified_by`)".
    " VALUES ('','".$jugador."','".$rol."','".$modo."','".$descripcion."','".$dedicado."','".$selected."','".$correo."','".$correo."')");
        $sql->execute();

        // Una vez se haya creado la ficha, actualizamos al usuario para poner el id de esta
        $update = $conex->prepare("UPDATE `usuarios` SET `id_cod`=(SELECT id_cod FROM cod WHERE `created_by`='".$correo."') WHERE `correo`='".$correo."'");
        $update->execute();
        unset($conex);
        header("Location: index.php");

    }
} 

?>
<div class="container">
        <div class="row content">
                <form class="formcrear margin5" action="perfil.php" method="POST">
                    <div class="form-group">
                        <label for="jugador">Nombre de jugador:</label>
                        <input id="jugador" type="text" class="form-control" placeholder="Nombre del jugador" name="jugador" required>
                        <small class="form-text text-muted">Se podrá buscar el jugador por su nombre en el listado.</small>
                    </div>
                    <div class="form-group">
                        <label for="teamtag">Cómo te gusta jugar</label>
                        <input type="text" class="form-control" placeholder="Posición en el equipo" maxlength="11" name="rol" required>
                        <small class="form-text text-muted">Por ejemplo: Objective, Slayer, etc.</small>
                    </div>
                    <div class="form-group">
                        <label for="jugadores">Modo de juego favorito</label>
                        <select class="form-control" name="modo">
                            <option>Punto Caliente</option>
                            <option>Buscar y Destruir</option>
                            <option>Control</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" rows="3" placeholder="Opcional" name="descripcion"></textarea>
                    </div>
                    <fieldset class="form-group">
                        <label>Tiempo dedicado/día</label>
                        <select class="form-control" name="dedicado">
                            <option>Menos de 2 horas</option>
                            <option>Entre 2 y 4 horas</option>
                            <option>Más de 4 horas</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Disponibilidad</label>
                        <div class="form-check checkbox">
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
                    <button type="submit" class="btn btn-primary" name="crearjugador">Crear jugador</button>
                </form>
                <br>
            </div>
        </div>
    </div>

    <?php include '../includes/foot.php';?>


    <?php include '../includes/foot.php';?>