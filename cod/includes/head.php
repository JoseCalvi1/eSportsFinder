<?php
// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el correo se haya autentificado
if (!isset($_SESSION['correo'])) {
    die("<h1>Error - debe <a href='../Login.php'>identificarse</a>.</h1><br>");
}
$correo = $_SESSION['correo'];
?>

<!doctype html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../css/esports.css">
    <link rel="manifest" href="../manifest.json">
    <title>eSports Finder</title>
  </head>
