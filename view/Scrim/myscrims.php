<?php
echo '<h4><b>' . $this->helper->translate('Scrim', 'LBL_READY') . '</b></h4>';
if (!$my_scrims) {
    echo $this->helper->translate('LBL_NO_RECORD');
}
foreach ($my_scrims as $my_scrim) { ?>
    <div class="col-12">
        <div class="card-message">
            <h4 class="info-title"><?php echo $my_scrim->NAME1 ?> VS <?php echo $my_scrim->NAME2 ?></h4>
            <h6><?php echo $my_scrim->date_scrim ?></h6>
            <h6><?php echo $my_scrim->duration ?></h6>
        </div>
    </div>
<?php }
echo '<h4><b>' . $this->helper->translate('Scrim', 'LBL_WAITING') . '</b></h4>';
if (!$waiting) {
    echo $this->helper->translate('LBL_NO_RECORD');
}
foreach ($waiting as $my_scrim) { ?>
    <div class="col-12">
        <div class="card-message">
            <?php if ($my_scrim->id_team1 == $user->id_team) { ?>
                <form action="<?php echo $this->helper->url("Scrim", "deleteScrim"); ?>" method="POST" class="decline"
                      style="float: right;">
                    <input type="hidden" class="form-control" id="id" name="scrim[id]" required
                           value="<?php echo $my_scrim->id ?>">
                    <input type="hidden" class="form-control" id="id_game" name="scrim[id_game]" required
                           value="<?php echo $my_scrim->id_game ?>">
                    <button type="submit" class="btn btn-danger btn-outline-danger">
                        <i class="material-icons">clear</i> <?php echo $this->helper->translate('Scrim', 'LBL_DECLINE'); ?>
                    </button>
                </form>
                <form action="<?php echo $this->helper->url("Scrim", "acceptScrim"); ?>" method="POST" class="response"
                      style="float: right;">
                    <input type="hidden" class="form-control" id="id" name="scrim[id]" required
                           value="<?php echo $my_scrim->id ?>">
                    <input type="hidden" class="form-control" id="id_game" name="scrim[id_game]" required
                           value="<?php echo $my_scrim->id_game ?>">
                    <button type="submit" class="btn btn-success btn-outline-success">
                        <i class="material-icons">done</i> <?php echo $this->helper->translate('Scrim', 'LBL_ACCEPT'); ?>
                    </button>
                </form>
            <?php } ?>
            <h4 class="info-title"><?php echo $my_scrim->NAME1 ?> VS <?php echo $my_scrim->NAME2 ?></h4>
            <h6><?php echo $my_scrim->date_scrim ?></h6>
            <h6><?php echo $my_scrim->duration ?></h6>
        </div>
    </div>
<?php } ?>



