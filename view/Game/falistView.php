<?php include_once "header.php"; ?>

    <div class="container">
        <div class="col-sm-12 equipo">
        </div>
        <h2><?php echo $this->helper->translate('GameProfile', 'LBL_FA_TITLE') ?></h2>
        <p><?php echo $this->helper->translate('GameProfile', 'LBL_SEARCH') ?></p>
        <input class="form-control" id="search" type="text"
               placeholder="<?php echo $this->helper->translate('LBL_SEARCH') ?>...">
        <br>
        <?php foreach ($users as $user) { ?>
            <div class="border-bottom padding-5">
                <h4>
                    <b><?= $this->helper->translate('GameProfile', 'LBL_NAME') . ': </b>' . $user->name . ' <b>' . $this->helper->translate('GameProfile', 'LBL_DESCRIPTION') . ': </b>' ?>
                    <?= $user->description ?></h4>
                <p>
                    <b><?= $this->helper->translate('GameProfile', 'LBL_PLAY_TIME') . ': </b>' . $user->play_time . ' | <b>' . $this->helper->translate('GameProfile', 'LBL_AVAILABILITY') . ': </b>' . $user->availability ?>
                </p>
                <a data-toggle="modal" href="#myModal" data-target="#edit-modal-<?php echo $user->id; ?>"
                   id="<?php echo $user->id; ?>">
                    <i class="material-icons">chat</i>Conactar</a>
                <?php if($id_team) { ?>
                <a data-toggle="modal" href="#myModal" data-target="#new-player-<?php echo $user->id; ?>">
                    <i class="material-icons">add_circle_outline</i><?php echo $this->helper->translate('Team', 'LBL_NEW_PLAYER'); ?>
                </a>
                <?php } ?>
            </div>

            <div id="new-player-<?php echo $user->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="padding: 10px;">
                        <div class="modal-header">
                            <h4 class="modal-title"
                                id="myModalLabel"><?php echo $this->helper->translate('Team', 'LBL_NEW_PLAYER'); ?></h4>
                        </div>
                        <form action="<?php echo $this->helper->url("Team", "sendInvite"); ?>" method="POST"
                              class="align-middle padding-5">
                            <input type="hidden" class="form-control" id="id_game" name="player[id_game]" required
                                   value="<?php echo $id_game ?>">
                            <input type="hidden" class="form-control" id="id_team" name="player[id_team]" required
                                   value="<?php echo $id_team ?>">
                            <input type="hidden" class="form-control" id="id_team" name="player[subject]" required
                                   value="<?php echo $this->helper->translate('Team', 'LBL_TEAM_INVITE'); ?>">
                            <div class="form-group">
                                <label for="name"
                                       class="bmd-label-floating"><?php echo $this->helper->translate('GameProfile', 'LBL_NAME'); ?></label>
                                <input type="text" class="form-control" id="name" name="player[name]"
                                       value="<?php echo $user->name ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="description"
                                       class="bmd-label-floating"><?php echo $this->helper->translate('Message', 'LBL_DESCRIPTION'); ?></label>
                                <textarea class="form-control" rows="3" id="description"
                                          name="player[message]"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-raised" name="registrar"
                                    value="Registrar"><?php echo $this->helper->translate('User', 'LBL_SUBMIT'); ?></button>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <div id="edit-modal-<?php echo $user->id; ?>" class="modal fade" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="padding: 10px;">
                        <div class="modal-header">
                            <h4 class="modal-title"
                                id="myModalLabel"><?php echo $this->helper->translate('Message', 'LBL_SEND_MESSSAGE'); ?></h4>
                        </div>
                        <form action="<?php echo $this->helper->url("Message", "sendMessage"); ?>" method="POST"
                              class="align-middle padding-5">
                            <input type="hidden" class="form-control" id="description" name="message[id_user_from]"
                                   value="">
                            <input type="hidden" class="form-control" id="description" name="message[id_user_to]"
                                   required value="<?php echo $user->id_user ?>">
                            <div class="form-group">
                                <label for="subject"
                                       class="bmd-label-floating"><?php echo $this->helper->translate('Message', 'LBL_SUBJECT'); ?></label>
                                <input type="text" class="form-control" id="subject" name="message[subject]" required>
                            </div>
                            <div class="form-group">
                                <label for="description"
                                       class="bmd-label-floating"><?php echo $this->helper->translate('Message', 'LBL_DESCRIPTION'); ?></label>
                                <textarea class="form-control" rows="3" id="description" name="message[description]"
                                          required></textarea>
                            </div>
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
    <script>
        // Buscará en el evento keyup
        $(document).ready(function () {
            $("#search").keyup(function () {
                _this = this;
                // Mostrará las filas que contengan lo escrito en el buscador
                $.each($("#mytable tbody tr"), function () {
                    if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                        $(this).hide();
                    else
                        $(this).show();
                });
            });
        });
    </script>

<?php include_once "footer.php"; ?>