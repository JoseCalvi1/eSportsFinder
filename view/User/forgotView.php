<?php include_once "header.php"; ?>
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3 login-block">
<?php if (!empty($error)): ?>
    <p class="text-center text-danger"><?php echo $error; ?></p>
<?php endif; ?>
    <div class="card">

        <div class="card-body">

            <h5 class="card-title">Enviaremos un email a</h5>
            <div style="" class="panel-body">

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" class="form-horizontal mb-0 needs-validation" role="form" method="post"
                      action="<?php echo $this->helper->url("User", "forgot"); ?>">

                    <fieldset class="form-group">
                        <label for="login-username" class="bmd-label-floating">Email</label>
                        <input type="email" class="form-control" id="login-useremail" name="useremail"
                               value="" autofocus required>
                        <span class="bmd-help"></span>
                    </fieldset>
                    <div class="text-center">
                        <button id="btn-login" type="submit"
                                class="btn btn-raised btn-primary btn-cstm-primary">
                            Enviar enlace de recuperación
                        </button> &nbsp; &nbsp;
                        <a href="<?php echo $this->helper->url("User", "index"); ?>" class="forgot-button showLoader">Volver
                            al login</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php include_once "footer.php"; ?>