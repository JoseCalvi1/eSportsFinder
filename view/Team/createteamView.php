<?php include_once "view/Game/header.php"; ?>

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
                            <b>Error Alert:</b> <?= $this->helper->translate('Team', 'LBL_NAME_EXISTING') ?>
                        </div>
                    </div>
                <?php } ?>
                <form action="<?php echo $this->helper->url("Team", "createTeam"); ?>" method="POST">
                    <div class="form-group">
                        <input id="id_game" type="hidden" class="form-control" name="team[id_game]"
                               value="<?php echo $id_game ?>" required>
                        <label for="name"><?= $this->helper->translate('GameProfile', 'LBL_NAME') ?>:</label>
                        <input id="name" type="text" class="form-control"
                               placeholder="<?= $this->helper->translate('GameProfile', 'LBL_NAME') ?>"
                               name="team[name]" required>
                    </div>
                    <div class="form-group">
                        <label for="teamtag"><?= $this->helper->translate('Team', 'LBL_TEAM_TAG') ?></label>
                        <input type="text" class="form-control" placeholder="Tag del equipo" maxlength="4"
                               name="team[team_tag]" required>
                    </div>
                    <div class="form-group">
                        <label for="description"><?= $this->helper->translate('Team', 'LBL_DESCRIPTION') ?></label>
                        <textarea class="form-control" rows="3" placeholder="Opcional"
                                  name="team[description]"></textarea>
                    </div>
                    <fieldset class="form-group">
                        <label for="play_time"><?= $this->helper->translate('GameProfile', 'LBL_PLAY_TIME') ?></label>
                        <select class="form-control" name="team[play_time]">
                            <option>-- Select --</option>
                            <option><?= $this->helper->translate('GameProfile', 'LBL_TWO') ?></option>
                            <option><?= $this->helper->translate('GameProfile', 'LBL_TWO_FOUR') ?></option>
                            <option><?= $this->helper->translate('GameProfile', 'LBL_FOUR') ?></option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="availability"><?= $this->helper->translate('Team', 'LBL_AVAILABILITY') ?></label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="team[availability][]"
                                       value="<?= $this->helper->translate('GameProfile', 'LBL_MORNING') ?>"> <?= $this->helper->translate('GameProfile', 'LBL_MORNING') ?>
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" name="team[availability][]"
                                       value="<?= $this->helper->translate('GameProfile', 'LBL_AFTERNOON') ?>"> <?= $this->helper->translate('GameProfile', 'LBL_AFTERNOON') ?>
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" name="team[availability][]"
                                       value="<?= $this->helper->translate('GameProfile', 'LBL_NIGHT') ?>"> <?= $this->helper->translate('GameProfile', 'LBL_NIGHT') ?>
                            </label><br>
                        </div>

                    </fieldset>
                    <button type="submit" class="btn btn-primary" name="createteam">Crear equipo</button>
                </form>
                <br>
            </div>
        </div>
    </div>

<?php include_once "view/Game/footer.php"; ?>