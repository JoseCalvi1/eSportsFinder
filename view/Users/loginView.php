<?php include_once "header.php"; ?>
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3 login-block">
        <?php if (!empty($error)): ?>
            <p class="text-center text-danger"><?php echo $error; ?></p>
        <?php endif; ?>
        <div class="card">
            <img class="card-img-top" src="assets/images/company_logo.png">
            <div class="card-body">

                <h5 class="card-title">Iniciar sesión</h5>
                <div style="" class="panel-body">

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="loginform" class="form-horizontal mb-0" role="form" method="post"
                          action="<?php echo $this->helper->url("User", "login"); ?>">

                        <fieldset class="form-group">
                            <label for="login-username" class="bmd-label-floating">Nombre de usuario</label>
                            <input type="text" class="form-control" id="login-username" name="username"
                                   value="" autofocus>
                            <span class="bmd-help"></span>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="login-username" class="bmd-label-floating">Contraseña</label>
                            <input id="login-password" type="password" class="form-control" name="password">
                        </fieldset>
                        <div style="margin-top:10px" class="form-group">
                            <button id="btn-login" type="submit"
                                    class="btn btn-raised btn-primary showLoader btn-cstm-primary">
                                Entrar
                            </button>
                            <a href="<?php echo $this->helper->url("User", "forgot"); ?>"
                               class="float-right forgot-button showLoader">¿No puedes ingresar?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php include_once "footer.php"; ?>