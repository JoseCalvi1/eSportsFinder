<?php include_once "header.php"; ?>
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3 login-block">

            <div class="card">
                <img class="card-img-top" src="assets/images/check-your-email.svg">
                <div class="card-body">

                    <h6 class="<?php echo $error;?> text-center"><?php echo $msg;?></h6>
                    <div style="" class="panel-body">

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <form id="loginform" class="form-horizontal mb-0" role="form" method="post"
                              action="<?php echo $this->helper->url("User", "forgot"); ?>">

                            <fieldset class="form-group">
                                <h5 class="text-center"><?php echo $email;?></h5>
                            </fieldset>
                            <div class="text-center">
                                <div>
                                    <a href="<?php echo $this->helper->url("User", "forgot",array('useremail'=> $email)); ?>" class="forgot-button showLoader"><?php echo $this->helper->translate('User','LBL_RESEND_FORGOT');?></a>
                                </div>

                                <div>
                                    <a href="<?php echo $this->helper->url("User", "index"); ?>" class="forgot-button showLoader"><?php echo $this->helper->translate('User','LBL_BACK_TO_LOGIN');?></a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
<?php include_once "view/Global/footer.php"; ?>