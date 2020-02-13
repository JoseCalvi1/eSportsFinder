<?php include_once "header.php"; ?>
    <div class="row justify-content-center align-items-center h-100"
         style="width: 100%;height: 100%;background-image: url('/assets/images/esports.jpg')">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3 login-block">
        <?php if (!empty($error)): ?>
            <p class="text-center text-danger"><?php echo $error; ?></p>
        <?php endif; ?>
        <div class="card">
            <img class="card-img-top" src="assets/images/company_logo.png">
            <div class="card-body">

                <h5 class="card-title"><?php echo $this->helper->translate('User', 'LBL_INIT_SESSION') ?></h5>
                <div style="" class="panel-body">

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="loginform" class="form-horizontal mb-0" role="form" method="post"
                          action="<?php echo $this->helper->url("User", "login"); ?>">

                        <fieldset class="form-group">
                            <label for="login-username"
                                   class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_USERNAME'); ?></label>
                            <input type="text" class="form-control" id="login-username" name="username"
                                   value="" autofocus>
                            <span class="bmd-help"></span>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="login-username"
                                   class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_PASSWORD'); ?></label>
                            <input id="login-password" type="password" class="form-control" name="password">
                        </fieldset>
                        <div style="margin-top:10px" class="form-group">
                            <button id="btn-login" type="submit"
                                    class="btn btn-raised btn-primary showLoader">
                                <?php echo $this->helper->translate('User', 'LBL_ENTER'); ?>
                            </button>
                            <a href="<?php echo $this->helper->url("User", "register"); ?>"
                               class="float-right btn btn-raised btn-secondary showLoader"><?php echo $this->helper->translate('User', 'LBL_REGISTER'); ?></a>

                        </div>
                        <div class="form-group text-center">
                            <a href="<?php echo $this->helper->url("User", "forgot"); ?>"
                               class="forgot-button showLoader"><?php echo $this->helper->translate('User', 'LBL_FORGOT_PASS'); ?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include_once "footer.php"; ?>