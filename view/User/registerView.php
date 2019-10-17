<?php include_once "header.php"; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-7 d-none d-sm-none d-md-block"
                 style="background-image: url('assets/images/mut_body_bg.jpg'); background-size: cover; min-height: calc(100vh - 130px);">
            </div>
            <div class="col-sm-5">
                <div class="padding-5"><h3><?php echo $this->helper->translate('User', 'LBL_REGISTER_TITLE'); ?></h3>
                </div>

                <form action="<?php echo $this->helper->url("User", "register"); ?>" method="POST"
                      class="align-middle padding-5">
                    <div class="form-group">
                        <label for="name"
                               class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_NAME'); ?></label>
                        <input type="text" class="form-control" id="name" name="user[name]"
                               pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}"
                               title="Formato de nombre incorrecto" required value="<?php echo $user['name']; ?>">
                        <?php if (!empty($error['name'])): ?>
                            <span class=" text-danger"><?php echo $error['name']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="email"
                               class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_EMAIL'); ?></label>
                        <input type="email" class="form-control" id="email" name="user[email]"
                               pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$"
                               title="Formato de correo erróneo" required value="<?php echo $user['email']; ?>">
                        <?php if (!empty($error['email'])): ?>
                            <span class=" text-danger"><?php echo $error['email']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="user_name"
                               class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_USERNAME'); ?></label>
                        <input type="text" class="form-control" id="user_name" name="user[user_name]"
                               pattern="^([a-zA-Z0-9]){5,12}$"
                               title="Logintud de 5 a 12 caracteres entre letras y números"
                               required value="<?php echo $user['user_name']; ?>">
                        <?php if (!empty($error['user_name'])): ?>
                            <span class=" text-danger"><?php echo $error['user_name']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="password"
                               class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_PASSWORD'); ?></label>
                        <input type="password" class="form-control" id="password" name="user[password]"
                               pattern="[A-Za-z0-9!?-_]{8,12}"
                               title="Letras mayúsculas, minúsculas, números y los caracteres !?-_ Su tamaño: entre 8 y 12 caracteres."
                               required>
                        <span class="bmd-help"><?php echo $this->helper->translate('User', 'LBL_PASSWORD_REGEX'); ?></span>
                        <?php if (!empty($error['password'])): ?>
                            <span class=" text-danger"><?php echo $error['password']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="rep_password"
                               class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_REP_PASSWORD'); ?></label>
                        <input required type="password" class="form-control" id="rep_password"
                               name="user[rep_password]">
                        <?php if (!empty($error['rep_password'])): ?>
                            <span class=" text-danger"><?php echo $error['rep_password']; ?></span>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-raised" name="registrar"
                            value="Registrar"><?php echo $this->helper->translate('User', 'LBL_SUBMIT'); ?></button>
                    <p>Ir a <a href="index.php">Inicio</a></p>
                </form>
            </div>
        </div>
    </div>

<?php include_once "footer.php"; ?>