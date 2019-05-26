<?php include 'includes/head.php';?>
<?php
$correo = $_SESSION['correo'];


?>

<body>

<?php include 'includes/navbar.php';?>

<div class="container">
        <div class="row">
        <button type="button" class="btn btn-primary btn-lg btn-block loginBTN" data-toggle="modal" data-target="#tsModal" name="teamscrim">Proponer TS</button>
        </div>
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

<?php include '../includes/foot.php';?>

<?php include 'includes/footer.php';?>