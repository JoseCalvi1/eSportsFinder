<?php include_once "header.php"; ?>

    <div class="container">
        <div class="col-sm-12 equipo">
        </div>
        <h2><?= $this->helper->translate('GameProfile', 'LBL_FA_TITLE') ?></h2>
        <p><?= $this->helper->translate('GameProfile', 'LBL_SEARCH') ?></p>
        <div id="myBtnContainer">
            <button class="btn active" onclick="filterSelection('all')"> <?= $this->helper->translate('LBL_ALL'); ?></button>
            <?php foreach ($roles as $key => $rol) {
                if ($roles[$key]->name) { ?>
                <button class="btn"
                        onclick="filterSelection('<?= $roles[$key]->name ?>')"> <?= $roles[$key]->name ?></button>
            <?php }  
        } ?>
        </div>
        <br>
        <?php if (!$users) {
            echo $this->helper->translate('LBL_NO_RECORD');
        } ?>
        <?php foreach ($users as $user) { ?>
            <div class="border-bottom padding-5 filterDiv <?= $user->description; ?>">
                <h4>
                    <b><?= $this->helper->translate('GameProfile', 'LBL_NAME') . ': </b>' . $user->name . ' <b>' . $this->helper->translate('GameProfile', 'LBL_DESCRIPTION') . ': </b>' ?>
                    <?= $user->description ?></h4>
                <p>
                    <b><?= $this->helper->translate('GameProfile', 'LBL_PLAY_TIME') . ': </b>' . $user->play_time . ' | <b>' . $this->helper->translate('GameProfile', 'LBL_AVAILABILITY') . ': </b>' . $user->availability ?>
                </p>
                <a data-toggle="modal" href="#myModal" data-target="#edit-modal-<?= $user->id; ?>"
                   id="<?= $user->id; ?>">
                    <i class="material-icons">chat</i>Conactar</a>
                <?php if ($id_team) { ?>
                    <a data-toggle="modal" href="#myModal" data-target="#new-player-<?= $user->id; ?>">
                        <i class="material-icons">add_circle_outline</i><?= $this->helper->translate('Team', 'LBL_NEW_PLAYER'); ?>
                    </a>
                <?php } ?>
            </div>

            <div id="new-player-<?= $user->id; ?>" class="modal fade" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="padding: 10px;">
                        <div class="modal-header">
                            <h4 class="modal-title"
                                id="myModalLabel"><?= $this->helper->translate('Team', 'LBL_NEW_PLAYER'); ?></h4>
                        </div>
                        <form action="<?= $this->helper->url("Team", "sendInvite"); ?>" method="POST"
                              class="align-middle padding-5">
                            <input type="hidden" class="form-control" id="id_game" name="player[id_game]" required
                                   value="<?= $id_game ?>">
                            <input type="hidden" class="form-control" id="id_team" name="player[id_team]" required
                                   value="<?= $id_team ?>">
                            <input type="hidden" class="form-control" id="id_team" name="player[subject]" required
                                   value="<?= $this->helper->translate('Team', 'LBL_TEAM_INVITE'); ?>">
                            <div class="form-group">
                                <label for="name"
                                       class="bmd-label-floating"><?= $this->helper->translate('GameProfile', 'LBL_NAME'); ?></label>
                                <input type="text" class="form-control" id="name" name="player[name]"
                                       value="<?= $user->name ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="description"
                                       class="bmd-label-floating"><?= $this->helper->translate('Message', 'LBL_DESCRIPTION'); ?></label>
                                <textarea class="form-control" rows="3" id="description"
                                          name="player[message]"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-raised" name="registrar"
                                    value="Registrar"><?= $this->helper->translate('User', 'LBL_SUBMIT'); ?></button>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <div id="edit-modal-<?= $user->id; ?>" class="modal fade" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="padding: 10px;">
                        <div class="modal-header">
                            <h4 class="modal-title"
                                id="myModalLabel"><?= $this->helper->translate('Message', 'LBL_SEND_MESSSAGE'); ?></h4>
                        </div>
                        <form action="<?= $this->helper->url("Message", "sendMessage"); ?>" method="POST"
                              class="align-middle padding-5">
                            <input type="hidden" class="form-control" id="description" name="message[id_user_from]"
                                   value="">
                            <input type="hidden" class="form-control" id="description" name="message[id_user_to]"
                                   required value="<?= $user->id_user ?>">
                            <div class="form-group">
                                <label for="subject"
                                       class="bmd-label-floating"><?= $this->helper->translate('Message', 'LBL_SUBJECT'); ?></label>
                                <input type="text" class="form-control" id="subject" name="message[subject]" required>
                            </div>
                            <div class="form-group">
                                <label for="description"
                                       class="bmd-label-floating"><?= $this->helper->translate('Message', 'LBL_DESCRIPTION'); ?></label>
                                <textarea class="form-control" rows="3" id="description" name="message[description]"
                                          required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-raised" name="registrar"
                                    value="Registrar"><?= $this->helper->translate('User', 'LBL_SUBMIT'); ?></button>
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
        window.onload = function () {
            filterSelection("all");
        };

        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("filterDiv");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }

        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>

<?php include_once "footer.php"; ?>