<?php include 'includes/head.php';?>

<?php

    // Creamos un sistema de login haciendo consultas a la base de datos
    if (isset($_POST['enviar'])) {
        $correo = $_POST['correo'];       
        $clave = $_POST['clave'];
        
        if (empty($correo) || empty($clave)) {
          echo "<script type=\"text/javascript\">alert(\"Debes introducir los datos correctamente\");</script>";
        } else {
            try {
                $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                $dsn = "mysql:host=localhost;dbname=esports_finder";
                $conex = new PDO($dsn, "root", "", $opc);
            } catch (Exception $ex) {
              die("Error: ".$e->getMessage());
            }
            
            $sql = "SELECT * FROM usuarios ".
                    "WHERE correo='$correo' ".
                    "AND clave='".MD5($clave)."'";
            if($resultado = $conex->query($sql)) {
                $fila = $resultado->fetch();
                if ($fila != null) {
                    session_start();
                    $_SESSION['correo'] = $correo;
                    $_SESSION['id_usuario'] = $id_usuario;
                    header("Location: juegos.php");
                } else {
                  echo "<script type=\"text/javascript\">alert(\"Usuario o contraseña inválidos\");</script>";
                }
                unset($resultado);
            }
            unset($conex);
        }
    }
?>


<body class="bodyLogin">

<div class="container logo">
    <img class="imgLogo" src="images/gamepad.png">
</div>

<div class="container">
<div><span class="error"><?php if(isset($error)) echo $error; ?></span></div>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-raised btn-lg btn-block loginBTN" data-toggle="modal" data-target="#loginModal" name="iniciar">Inicia sesión</button>
  <a type="button" class="btn btn-primary btn-raised btn-lg btn-block loginBTN" href="registrar.php">Regístrate</a>
</div>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicia sesión</h5>
      </div>
      <div class="modal-body">
        <form action="Login.php" method="POST">
            <div class="form-group">
                <label for="email" class="bmd-label-floating">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo">
                <span class="bmd-help">Tu correo no se compartirá con nadie.</span>
            </div>
            <div class="form-group">
                <label for="clave" class="bmd-label-floating">Contraseña</label>
                <input type="password" class="form-control" id="clave" name="clave">
            </div>
            <div class="checkbox">
                <label>
                <input type="checkbox"> Recuerdame
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-raised" name="enviar" value="Entrar">Entrar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<?php include 'includes/footer.php';?>   