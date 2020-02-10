<?php include_once "view/Game/header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="<?php echo $this->helper->url("User", "editUser"); ?>" method="POST"
                  class="align-middle padding-5">
                <input type="hidden" class="form-control" id="name" name="user[id]" value="<?= $current_user->id; ?>">
                <div class="form-group">
                    <label for="name"
                           class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_NAME'); ?></label>
                    <input type="text" class="form-control" id="name" name="user[name]" value="<?= $current_user->name; ?>">
                </div>
                <div class="form-group">
                    <label for="name"
                           class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_EMAIL'); ?></label>
                    <input type="text" class="form-control" id="email" name="user[email]"
                           value="<?= $current_user->email; ?>">
                </div>
                <div class="form-group">
                    <label for="name"
                           class="bmd-label-floating"><?php echo $this->helper->translate('User', 'LBL_USERNAME'); ?></label>
                    <input type="text" class="form-control" id="name" name="user[user_name]"
                           value="<?= $current_user->user_name; ?>">
                </div>
                <button type="submit" class="btn btn-info btn-raised">
                    <i class="material-icons">create</i> <?php echo $this->helper->translate('GameProfile', 'LBL_PLAYER_EDIT'); ?>
                </button>
            </form>
        </div>

        <div class="col-12">
            <?php foreach ($player AS $key => $gameprofile) { ?>
                <div class="card-message">
                    <p><b><?= $gameprofile->game_name ?></b></p>
                    <div class="row">
                        <div class="col-6 col-md-2"><?= $gameprofile->name ?></div>
                        <div class="col-6 col-md-2"><?= $gameprofile->description ?></div>
                        <div class="col-6 col-md-2"><?= $gameprofile->play_time ?></div>
                        <div class="col-6 col-md-2"><?= $gameprofile->availability ?></div>
                        <div class="col-6 col-md-2">
                            <a data-toggle="modal" href="#myModal" data-target="#edit-player-<?= $gameprofile->id ?>">
                                <i class="material-icons">create</i><?php echo $this->helper->translate('GameProfile', 'LBL_PLAYER_EDIT'); ?>
                            </a>
                        </div>
                        <div class="col-6 col-md-2">
                            <form action="<?php echo $this->helper->url("User", "deleteProfile"); ?>" method="POST"
                                  class="delete">
                                <input type="hidden" class="form-control" id="id_game" name="player[id]" required
                                       value="<?= $gameprofile->id ?>">
                                <button type="submit" class="btn btn-danger btn-raised">
                                    <i class="material-icons">block</i><?php echo $this->helper->translate('GameProfile', 'LBL_DELETE_PLAYER'); ?>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="edit-player-<?= $gameprofile->id ?>" class="modal fade" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="padding: 10px;">
                            <div class="modal-header">
                                <h4 class="modal-title"
                                    id="myModalLabel"><?php echo $this->helper->translate('GameProfile', 'LBL_PLAYER_EDIT'); ?></h4>
                            </div>
                            <form action="<?php echo $this->helper->url("User", "editPlayer"); ?>" method="POST"
                                  class="align-middle padding-5">
                                <input type="hidden" class="form-control" id="id" name="player[id]" required
                                       value="<?= $gameprofile->id ?>">
                                <div class="form-group">
                                    <label for="name"><?= $this->helper->translate('GameProfile', 'LBL_NAME') ?>
                                        :</label>
                                    <input id="name" type="text" class="form-control"
                                           placeholder="<?= $this->helper->translate('GameProfile', 'LBL_NAME') ?>"
                                           name="player[name]" value="<?= $gameprofile->name ?>">
                                </div>
                                <fieldset class="form-group">
                                    <label for="description"><?= $this->helper->translate('GameProfile', 'LBL_GAME_ROL') ?></label>
                                    <input id="description" type="text" class="form-control"
                                           placeholder="<?= $this->helper->translate('GameProfile', 'LBL_NAME') ?>"
                                           name="player[description]" value="<?= $gameprofile->description ?>">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="play_time"><?= $this->helper->translate('GameProfile', 'LBL_PLAY_TIME') ?></label>
                                    <select class="form-control" name="player[play_time]">
                                        <option><?= $this->helper->translate('GameProfile', 'LBL_TWO') ?></option>
                                        <option><?= $this->helper->translate('GameProfile', 'LBL_TWO_FOUR') ?></option>
                                        <option><?= $this->helper->translate('GameProfile', 'LBL_FOUR') ?></option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="availability"><?= $this->helper->translate('GameProfile', 'LBL_AVAILABILITY') ?></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="player[availability][]"
                                                   value="<?= $this->helper->translate('GameProfile', 'LBL_MORNING') ?>"> <?= $this->helper->translate('GameProfile', 'LBL_MORNING') ?>
                                        </label><br>
                                        <label class="form-check-label">
                                            <input type="checkbox" name="player[availability][]"
                                                   value="<?= $this->helper->translate('GameProfile', 'LBL_AFTERNOON') ?>"> <?= $this->helper->translate('GameProfile', 'LBL_AFTERNOON') ?>
                                        </label><br>
                                        <label class="form-check-label">
                                            <input type="checkbox" name="player[availability][]"
                                                   value="<?= $this->helper->translate('GameProfile', 'LBL_NIGHT') ?>"> <?= $this->helper->translate('GameProfile', 'LBL_NIGHT') ?>
                                        </label><br>
                                    </div>

                                </fieldset>
                                <button type="submit" class="btn btn-primary btn-raised" name="registrar"
                                        value="Registrar"><?php echo $this->helper->translate('User', 'LBL_SUBMIT'); ?></button>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <form action="<?php echo $this->helper->url("User", "deleteFUser"); ?>" method="POST"
              class="align-middle padding-5">
            <input type="hidden" class="form-control" id="name" name="user[id]" value="<?= $current_user->id; ?>">
            <button type="submit" class="btn btn-danger btn-raised">
                <i class="material-icons">block</i> <?php echo $this->helper->translate('GameProfile', 'LBL_DELETE_PLAYER'); ?>
            </button>
        </form>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.delete').click(function () {
            return confirm("<?php echo $this->helper->translate('GameProfile', 'LBL_DELETE'); ?>");
        });
    });
</script>

<?php include_once "view/Game/footer.php"; ?>
