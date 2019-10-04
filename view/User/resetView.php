<?php include_once "header.php"; ?>
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3 login-block">
        <div class="card">
            <!--<img class="card-img-top" src="assets/images/company_logo.png">-->
            <div class="card-body">

                <h5 class="card-title <?php echo $error ? 'text-danger' : ''; ?>"><?php echo $error ? $error : $msg; ?></h5>
                <div style="" class="panel-body">
                    <?php if (!$error) { ?>
                        <form id="loginform" class="form-horizontal mb-0" role="form" method="post"
                              action="<?php echo $this->helper->url("User", "reset", array('gui' => $token)); ?>">

                            <fieldset class="form-group">
                                <input type="hidden" name="token" id="token" value="<?php echo $token; ?>">
                                <label for="login-username" class="bmd-label-floating">Nueva contraseña</label>
                                <input id="login-password" type="password" class="form-control" name="password">
                            </fieldset>
                            <div class="text-center">
                                <button id="btn-login" type="submit"
                                        class="btn btn-raised btn-primary showLoader btn-cstm-primary">
                                    Resetear clave
                                </button>

                                <div>
                                    <a href="<?php echo $this->helper->url("User", "index"); ?>"
                                       class="forgot-button showLoader">Volver al login</a>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php include_once "footer.php"; ?>