<?php include_once "header.php"; ?>

<div class="container">
    <?php if (!empty($error)): ?>
        <p class="text-center text-danger"><?php echo $error; ?></p>
    <?php endif; ?>
    <div><h3><?php echo $this->helper->translate('User','LBL_REGISTER_TITLE');?></h3></div>

    <form action="<?php echo $this->helper->url("User", "register"); ?>" method="POST">
        <div class="form-group">
            <label for="name" class="bmd-label-floating"><?php echo $this->helper->translate('User','LBL_NAME');?></label>
            <input type="text" class="form-control" id="name" name="name" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" title="Formato de nombre incorrecto" required>
        </div>
        <div class="form-group">
            <label for="email" class="bmd-label-floating"><?php echo $this->helper->translate('User','LBL_EMAIL');?></label>
            <input type="email" class="form-control" id="email" name="email" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="Formato de correo erróneo" required>
        </div>
        <div class="form-group">
            <label for="user_name" class="bmd-label-floating"><?php echo $this->helper->translate('User','LBL_USERNAME');?></label>
            <input type="text" class="form-control" id="user_name" name="user_name" pattern="^([a-zA-Z0-9]){5,12}$" title="Logintud de 5 a 12 caracteres entre letras y números" required>
        </div>
        <div class="form-group">
            <label for="password" class="bmd-label-floating"><?php echo $this->helper->translate('User','LBL_PASSWORD');?></label>
            <input type="password" class="form-control" id="password" name="password" pattern="[A-Za-z0-9!?-]{8,12}" title="Letras mayúsculas, minúsculas, números y los caracteres !?- Su tamaño: entre 8 y 12 caracteres." required>
        </div>
        <div class="form-group">
            <label for="rep_password" class="bmd-label-floating"><?php echo $this->helper->translate('User','LBL_REP_PASSWORD');?></label>
            <input type="password" class="form-control" id="rep_password" name="rep_password">
        </div>
        <button type="submit" class="btn btn-primary btn-raised" name="registrar" value="Registrar"><?php echo $this->helper->translate('User','LBL_SUBMIT');?></button>
        <p>Ir a <a href="index.php">Inicio</a></p>
    </form>
</div>

<?php include_once "footer.php"; ?>