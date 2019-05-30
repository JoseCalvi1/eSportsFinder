<?php
// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['correo'])) {
    die("<h1>Error - debe <a href='Login.php'>identificarse</a>.</h1><br>");
} else {
  try {
    // Hacemos una consulta según el correo que hay en la sesión para extraer sus datos y pintarlos
    $correo = $_SESSION['correo'];
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $dsn = "mysql:host=localhost;dbname=esports_finder";
    $conex = new PDO($dsn, "root", "", $opc);
    //$dsn = "mysql:host=esportsfpqjose.mysql.db;dbname=esportsfpqjose";
    //$conex = new PDO($dsn, "esportsfpqjose", "19TEquiero2014", $opc);
    } catch (Exception $ex) {
      die("Error: ".$e->getMessage());
    }

    $sql = $conex->prepare("SELECT * FROM usuarios WHERE correo='$correo'");
    $sql->execute();
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);
}
?>

<?php include 'includes/head.php';?>

<body>

<?php include 'includes/navbar.php';?>

<div class="container">
    <label>Nombre: </label><p><?php echo $resultado['nombre']; ?></p>
    <label>Email: </label><p><?php echo $resultado['correo']; ?></p>
    <label>Usuario: </label><p><?php echo $resultado['usuario']; ?></p>
    <label>Clave: </label><p><?php echo $resultado['clave']; ?></p>
    <label>Creado el día:</label><p><?php echo $resultado['date_entered']; ?></p>
</div>

<?php include 'includes/foot.php';?>

<?php include 'includes/footer.php';?>