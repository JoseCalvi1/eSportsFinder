<?php include_once "view/Game/header.php"; ?>

<div class="container-fluid"
     style="margin-top:-20px; background-image: url('assets/images/<?php echo strtolower($id_game); ?>/option1.jpg'); position:relative; background-size: cover; height: 100%; width: 100% ;">
    <div class="container">
        <h1 class="info-title"
            style="color: white; padding-top: 150px"><?php echo $teams[0]->name . ' [' . $teams[0]->team_tag . ']' ?></h1>
    </div>
</div>
<div class="container">
    <!-- <h1 class="info-title"><?php echo $teams[0]->name . ' [' . $teams[0]->team_tag . ']' ?></h1> -->
    <h2><?php echo $this->helper->translate('Team', 'LBL_PLAYERS'); ?></h2>
    <a data-toggle="modal" href="#myModal" data-target="#new-player">
        <i class="material-icons">add_circle_outline</i><?php echo $this->helper->translate('Team', 'LBL_NEW_PLAYER'); ?>
    </a>
    <div class="row">

        <?php foreach ($players as $player) { ?>
            <div class="col-12 col-md-3">
                <div class="card-team">
                    <h4 class="info-title"><?php echo ($player->id == $teams[0]->id_captain) ? "<i class=\"material-icons\">star_border</i>" : ""; ?><?php echo $player->name ?></h4>
                    <p><?php echo $player->description ?></p>
                    <p><?php echo $player->play_time ?></p>
                    <p><?php echo $player->availability ?></p>
                    <?php if ($player->id_user != $current_user->id && $current_user->id == $teams[0]->id_captain) { ?>
                        <form action="<?php echo $this->helper->url("Team", "leaveTeam"); ?>" method="POST" id="leaveForm">
                            <input type="hidden" class="form-control" id="id_game" name="player[id]" required
                                   value="<?php echo $player->id ?>">
                            <input type="hidden" class="form-control" id="id_game" name="player[id_game]" required
                                   value="<?php echo $id_game ?>">
                            <button type="submit" class="btn btn-danger btn-raised">
                                <i class="material-icons">clear</i><?php echo $this->helper->translate('Team', 'LBL_KICK_OUT'); ?>
                            </button>
                        </form>
                    <?php } elseif ($player->id_user == $current_user->id) { ?>
                        <form action="<?php echo $this->helper->url("Team", "leaveTeam"); ?>" method="POST" id="leaveForm">
                            <input type="hidden" class="form-control" id="id_game" name="player[id]" required
                                   value="<?php echo $player->id ?>">
                            <input type="hidden" class="form-control" id="id_game" name="player[id_game]" required
                                   value="<?php echo $id_game ?>">
                            <button type="submit" class="btn btn-danger btn-raised">
                                <i class="material-icons">block</i><?php echo $this->helper->translate('Team', 'LBL_LEAVE_TEAM'); ?>
                            </button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div id="new-player" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                       value="<?php echo $teams[0]->id ?>">
                <input type="hidden" class="form-control" id="id_team" name="player[subject]" required
                       value="<?php echo $this->helper->translate('Team', 'LBL_TEAM_INVITE'); ?>">
                <div class="form-group">
                    <label for="name"
                           class="bmd-label-floating"><?php echo $this->helper->translate('GameProfile', 'LBL_NAME'); ?></label>
                    <input type="text" class="form-control" id="name" name="player[name]" required>
                </div>
                <div class="form-group">
                    <label for="description"
                           class="bmd-label-floating"><?php echo $this->helper->translate('Message', 'LBL_DESCRIPTION'); ?></label>
                    <textarea class="form-control" rows="3" id="description" name="player[message]"></textarea>
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

<script type="text/javascript">
    (function() {
        var form = document.getElementById('leaveForm');
        form.addEventListener('submit', function(event) {
            // si es false entonces que no haga el submit
            if (!confirm('¿Realmente desea eliminar?')) {
                event.preventDefault();
            }
        }, false);
    })();
</script>

<?php include_once "view/Game/footer.php"; ?>
