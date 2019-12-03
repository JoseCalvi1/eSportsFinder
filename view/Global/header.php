<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <title>eSportsFinder <?php echo !empty($title) ? ' - ' . $title : '' ?></title>
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
    <!-- Manifest -->
    <link rel="manifest" href="/manifest.json">
    <style>
        .custom-file-label::after {
            content: "<?php echo $this->helper->translate('LBL_BROWSE');?>";
        }
    </style>
</head>
<body>
<!-- Modal de cerrar sesión -->
<div class="modal fade" id="modal-cerrar-session" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cerrar sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea cerrar sessión?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-raised mr-3" data-dismiss="modal">Cancelar</button>
                <a href="<?php echo $this->helper->url("User", "logout"); ?>"
                   class="btn btn-primary btn-raised showLoader rippler rippler-default">Salir</a>
            </div>
        </div>
    </div>
</div>

