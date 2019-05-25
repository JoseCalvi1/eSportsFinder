<?php include 'includes/head.php';?>

<body>

<?php include 'includes/navbar.php';

if (!isset($_SESSION['correo'])) {
    die("<h1>Error - debe <a href='../Login.php'>identificarse</a>.</h1><br>");
} else {
  try {
    $correo = $_SESSION['correo'];
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $dsn = "mysql:host=localhost;dbname=esports_finder";
    $conex = new PDO($dsn, "root", "", $opc);
    } catch (Exception $ex) {
      die("Error: ".$e->getMessage());
    }

    // Hacemos una consulta para traer los datos del usuario que está en la sesión
    $sql = $conex->prepare("SELECT * FROM usuarios WHERE correo='$correo'");
    $sql->execute();
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);
}

    // Si el usuario no tiene ficha de cod, lo llevamos a crear una
    if (!$resultado['id_cod'])  {
        include 'perfil.php';
    } else { 
        
        // Una vez tenga ficha de cod, extraemos los datos para saber que opciones
        // mostrar dependiendo de si tiene equipo o no
        $sql = $conex->prepare("SELECT * FROM cod WHERE created_by='$correo'");
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        
?>

<div class="container elegirJuego">
    <div class="row">
        <div class="col-6 padding-5 <?php if ($resultado['id_equipo'])  echo "d-none" ?>">
            <a class="link-none" href="crearequipo.php">
                <div class="opcionCoD padding-5">
                    <img src="../images/crearequipo.ico">
                    <p>Crear equipo</p>
                </div>
            </a>
        </div>
        <div class="col-6 padding-5 <?php if ($resultado['id_equipo'])  echo "d-none" ?>">
            <a class="link-none" href="unirseaequipo.php">
                <div class="opcionCoD padding-5">
                    <img src="../images/unirseaequipo.ico">
                    <p>Unirse a equipo</p>
                </div>
            </a>
        </div>
        <div class="col-6 padding-5 <?php if (!$resultado['id_equipo'])  echo "d-none" ?>">
            <a class="link-none" href="gestionarequipo.php">
                <div class="opcionCoD padding-5">
                    <img src="../images/gestionar.ico">
                    <p>Gestionar equipo</p>
                </div>
            </a>
        </div>
        <div class="col-6 padding-5 <?php if (!$resultado['id_equipo'])  echo "d-none" ?>">
            <a class="link-none" href="teamscrim.php">
                <div class="opcionCoD padding-5">
                    <img src="../images/ts.ico">
                    <p>Team scrims</p>
                </div>
            </a>
        </div>
        <div class="col-6 padding-5">
            <a class="link-none" href="fa.php">
                <div class="opcionCoD padding-5">
                    <img src="../images/fa.ico">
                    <p>FA's</p>
                </div>
            </a>
        </div>
        <div class="col-6 padding-5">
            <a class="link-none" href="equipos.php">
                <div class="opcionCoD padding-5">
                    <img src="../images/equipos.ico">
                    <p>Equipos</p>
                </div>
            </a>
        </div>
    </div>
</div>

<?php } ?>

<?php include '../includes/foot.php';?>

<?php include 'includes/footer.php';?>