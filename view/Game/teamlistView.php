<?php include_once "header.php"; ?>

    <div class="container">
        <div class="col-sm-12 equipo">
        </div>
        <h2><?php echo $this->helper->translate('Team', 'LBL_TEAM_TITLE') ?></h2>
        <p><?php echo $this->helper->translate('Team', 'LBL_SEARCH') ?></p>
        <input class="form-control" id="search" type="text"
               placeholder="<?php echo $this->helper->translate('LBL_SEARCH') ?>...">
        <br>

        <?php if(!$teams) { echo $this->helper->translate('LBL_NO_RECORD'); } ?>

        <?php foreach ($teams as $team) { ?>

            <div class="border-bottom padding-5">
                <h4>
                    <b><?= $this->helper->translate('GameProfile', 'LBL_NAME') . ': </b>' . $team->name . ' <b>' . $this->helper->translate('GameProfile', 'LBL_DESCRIPTION') . ': </b>' ?>
                        [<?= $team->team_tag ?>]</h4>
                <p>
                    <b><?= $this->helper->translate('GameProfile', 'LBL_PLAY_TIME') . ': </b>' . $team->play_time . ' | <b>' . $this->helper->translate('GameProfile', 'LBL_AVAILABILITY') . ': </b>' . $team->availability ?>
                </p>
                <a data-toggle="modal" href="#myModal" data-target="#edit-modal-<?php echo $team->id; ?>"
                   id="<?php echo $team->id; ?>">
                    <i class="material-icons">chat</i>Conactar</a>
            </div>

            <div id="edit-modal-<?php echo $team->id; ?>" class="modal fade" tabindex="-1" role="dialog"
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
                                   required value="<?php echo $team->created_by ?>">
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