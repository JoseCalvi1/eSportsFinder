<?php

  // Consulta para listar todos los equipos
  try {
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $dsn = "mysql:host=localhost;dbname=esports_finder";
    $conex = new PDO($dsn, "root", "", $opc);
    } catch (Exception $ex) {
      die("Error: ".$e->getMessage());
    }

    $sql = $conex->prepare("SELECT nombre, team_tag, num_jugadores FROM equipo_cod");
    $sql->execute();
?>

<?php include 'includes/head.php';?>

<body>

<?php include 'includes/navbar.php';?>

<div class="container">
    <div class="col-sm-12 equipo">
    </div>
    <h2>Búsqueda de equipos</h2>
    <p>Puedes buscar un equipo por su nombre, team tag o número de jugadores:</p>
    <input class="form-control" id="buscar" type="text" placeholder="Buscar..">
    <br>
    <table class="table table-bordered table-striped">
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
        <tr>
            <td> <?php echo $row['nombre'] ?></td>
            <td> <?php echo $row['team_tag'] ?></td>
            <td> <?php echo $row['num_jugadores'] ?></td>
            <td>
              <button type="button" class="btn btn-info btn-lg glyphicon glyphicon-user" data-toggle="modal" data-target="#contacta">C</button>
            </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
 <!-- Modal -->
 <div id="contacta" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Gracias por contactar!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Se le ha enviado una petición al capitán del club correspondiente, pronto se pondrá en contacto con usted.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
  </div>


  <?php include '../includes/foot.php';?>

  <?php include 'includes/footer.php';?>