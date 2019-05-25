<?php
// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['correo'])) {
    die("<h1>Error - debe <a href='Login.php'>identificarse</a>.</h1><br>");
}
?>

<?php include 'includes/head.php';?>

<body>

<?php include 'includes/navbar.php';?>

<div class="container elegirJuego">
    <div class="row">
        <div class="col-6 padding-5">
            <a href="cod/index.php">
                <img class="imgElegir" src="images/cod.jpg">
            </a>
        </div>
        <div class="col-6 padding-5">
            <img class="imgElegir" src="images/lol.jpg">
        </div>
        <div class="col-6 padding-5">
            <img class="imgElegir" src="images/apex.jpg">
        </div>
        <div class="col-6 padding-5">
            <img class="imgElegir" src="images/cod.jpg">
        </div>
        <div class="col-6 padding-5">
            <img class="imgElegir" src="images/lol.jpg">
        </div>
        <div class="col-6 padding-5">
            <img class="imgElegir" src="images/apex.jpg">
        </div>
    </div>
</div>

<?php include 'includes/foot.php';?>

<?php include 'includes/footer.php';?>