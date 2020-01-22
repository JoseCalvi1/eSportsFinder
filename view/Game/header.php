<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <title>EsportsFinder <?php echo !empty($title) ? ' - ' . $title : '' ?></title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <link href="vendor/bootstrap-material-design/bootstrap-material-design.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/rippler/rippler.min.css" rel="stylesheet" type="text/css"/>
    <script src="vendor/jQuery/jquery.min.js"></script>
    <script src="vendor/bootstrap-material-design/js/popper.js"></script>
    <script src="vendor/bootstrap-material-design/js/snackbar.min.js"></script>
    <script src="vendor/bootstrap-material-design/js/bootstrap-material-design.js"></script>
    <script src="vendor/rippler/jquery.rippler.min.js"></script>
    <!-- Adding css styles -->
    <link href="view/Global/css/common.css" rel="stylesheet" type="text/css"/>
    <!-- Custom CSS -->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- Material Kit CSS -->
    <link href="assets/css/material-kit.css?v=2.0.6" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Manifest -->
    <link rel="manifest" href="/manifest.json">
</head>
<body class="sidebar-collapse">
<?php include_once "navbar.php"; ?>

<div id="loader_container" class="loader_container">
    <div class="loader"></div>
</div>
<div class="container-fluid h-100 transparency">
    <div class="row justify-content-center align-items-center">