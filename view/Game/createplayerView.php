<?php include_once "header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($error == 'true') { ?>
                    <div class="alert alert-danger">
                        <div class="container">
                            <div class="alert-icon">
                                <i class="material-icons">error_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                            <b>Error Alert:</b> <?= $this->helper->translate('GameProfile', 'LBL_NAME_EXISTING') ?>
                        </div>
                    </div>
                <?php } ?>
                <form action="<?php echo $this->helper->url("Game", "createPlayer"); ?>" method="POST">
                    <div class="form-group">
                        <input id="id_game" type="hidden" class="form-control" name="player[id_game]"
                               value="<?php echo $id_game ?>" required>
                        <label for="name"><?= $this->helper->translate('GameProfile','LBL_NAME') ?>:</label>
                        <input id="name" type="text" class="form-control" placeholder="<?= $this->helper->translate('GameProfile','LBL_NAME') ?>"
                               name="player[name]" required>
                    </div>
                    <fieldset class="form-group">
                        <label for="description"><?= $this->helper->translate('GameProfile','LBL_GAME_ROL') ?></label>
                        <select class="form-control" name="player[description]">
                            <?php foreach ($role as $key => $item) { ?>
                                <option><?= $role[$key]->name; ?></option>
                            <?php } ?>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="play_time"><?= $this->helper->translate('GameProfile','LBL_PLAY_TIME') ?></label>
                        <select class="form-control" name="player[play_time]">
                            <option><?= $this->helper->translate('GameProfile','LBL_TWO') ?></option>
                            <option><?= $this->helper->translate('GameProfile','LBL_TWO_FOUR') ?></option>
                            <option><?= $this->helper->translate('GameProfile','LBL_FOUR') ?></option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="availability"><?= $this->helper->translate('GameProfile','LBL_AVAILABILITY') ?></label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="player[availability][]" value="<?= $this->helper->translate('GameProfile','LBL_MORNING') ?>"> <?= $this->helper->translate('GameProfile','LBL_MORNING') ?>
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" name="player[availability][]" value="<?= $this->helper->translate('GameProfile','LBL_AFTERNOON') ?>"> <?= $this->helper->translate('GameProfile','LBL_AFTERNOON') ?>
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" name="player[availability][]" value="<?= $this->helper->translate('GameProfile','LBL_NIGHT') ?>"> <?= $this->helper->translate('GameProfile','LBL_NIGHT') ?>
                            </label><br>
                        </div>

                    </fieldset>
                    <button type="submit" class="btn btn-primary" name="createteam">Crear jugador</button>
                </form>
                <br>
            </div>
        </div>
    </div>

<?php include_once "footer.php"; ?>