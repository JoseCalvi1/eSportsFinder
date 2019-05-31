<?php include 'includes/head.php';?>

<?php
    // Creamos un insert con los datos requeridos para crear un usuario
    if (isset($_POST['registrar'])) {
        $Rnombre = $_POST['Rnombre'];       
        $Rcorreo = $_POST['Rcorreo'];
        $Rusuario = $_POST['Rusuario'];       
        $Rclave = $_POST['Rclave'];
        
        if (empty($Rnombre) || empty($Rcorreo) || empty($Rusuario) || empty($Rclave)) {
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
            
            $sql = $conex->prepare("INSERT INTO `usuarios`(`id_usuario`, `nombre`, `correo`, `usuario`, `clave`, `created_by`, `modified_by`, `id_cod`)". 
            " VALUES ('','".$Rnombre."','".$Rcorreo."','".$Rusuario."','".MD5($Rclave)."','".$Rcorreo."','".$Rcorreo."',null)");
            $sql->execute();
            unset($conex);
            header("Location: index.php");

        }
    }
?>


<div class="container">
<div><h3>Introduce los datos para registrarte</h3></div>

    <form action="registrar.php" method="POST">
            <div class="form-group">
                <label for="Rnombre" class="bmd-label-floating">Nombre completo</label>
                <input type="text" class="form-control" id="Rnombre" name="Rnombre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" title="Formato de nombre incorrecto" required>
            </div>
            <div class="form-group">
                <label for="Rcorreo" class="bmd-label-floating">Correo electrónico</label>
                <input type="email" class="form-control" id="Rcorreo" name="Rcorreo" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="Formato de correo erróneo" required>
                <span class="bmd-help">Tu correo no se compartirá con nadie.</span>
            </div>
            <div class="form-group">
                <label for="Rusuario" class="bmd-label-floating">Usuario</label>
                <input type="text" class="form-control" id="Rusuario" name="Rusuario" pattern="^([a-zA-Z0-9]){5,12}$" title="Logintud de 5 a 12 caracteres entre letras y números" required>
                <span class="bmd-help">Tu correo no se compartirá con nadie.</span>
            </div>
            <div class="form-group">
                <label for="Rclave" class="bmd-label-floating">Clave</label>
                <input type="password" class="form-control" id="Rclave" name="Rclave" pattern="[A-Za-z0-9!?-]{8,12}" title="Letras mayúsculas, minúsculas, números y los caracteres !?- Su tamaño: entre 8 y 12 caracteres." required>
            </div>
            <div class="form-group">
                <label for="rclave" class="bmd-label-floating"> Repite contraseña</label>
                <input type="password" class="form-control" id="Rrclave">
            </div>
            <button type="submit" class="btn btn-primary btn-raised" name="registrar" value="Registrar">Registrar</button>
            <p>Ir a <a href="index.php">Inicio</a></p>
        </form>
    </div>

    <?php include 'includes/foot.php';?> 

    <?php include 'includes/footer.php';?>   