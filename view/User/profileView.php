<?php include_once "view/Game/header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="<?php echo $this->helper->url("", ""); ?>" method="POST"
                  class="align-middle padding-5">
                <div class="form-group">
                    <label for="name"
                           class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_NAME'); ?></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $current_user->name; ?>">
                </div>
                <div class="form-group">
                    <label for="name"
                           class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_EMAIL'); ?></label>
                    <input type="text" class="form-control" id="email" name="email"
                           value="<?= $current_user->email; ?>">
                </div>
                <div class="form-group">
                    <label for="name"
                           class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_USERNAME'); ?></label>
                    <input type="text" class="form-control" id="name" name="user_name"
                           value="<?= $current_user->user_name; ?>">
                </div>
            </form>
        </div>

        <div class="col-12">
            <?php foreach ($player AS $key => $gameprofile) { ?>
                <div class="card-message">
                    <p><?= $gameprofile->game_name ?></p>
                    <div class="row">
                        <div class="col-6 col-md-3"><?= $gameprofile->name ?></div>
                        <div class="col-6 col-md-3"><?= $gameprofile->description ?></div>
                        <div class="col-6 col-md-3"><?= $gameprofile->play_time ?></div>
                        <div class="col-6 col-md-3"><?= $gameprofile->availability ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include_once "view/Game/footer.php"; ?>
