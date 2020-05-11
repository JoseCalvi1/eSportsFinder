<?php
if (!$scrims) {
    echo $this->helper->translate('LBL_NO_RECORD');
}
foreach ($scrims as $scrim) { ?>
    <div class="col-12">
        <div class="card-message">
            <?php if($scrim->id_team1 != $user->id_team) { ?>
            <form action="<?php echo $this->helper->url("Scrim", "responseScrim"); ?>" method="POST" class="response" style="float: right;">
                <input type="hidden" class="form-control" id="id_scrim" name="scrim[id_game]" required
                       value="<?php echo $scrim->id_game ?>">
                <input type="hidden" class="form-control" id="id_team1" name="scrim[id_team1]" required
                       value="<?php echo $scrim->id_team1 ?>">
                <input type="hidden" class="form-control" id="id_team2" name="scrim[id_team2]" required
                       value="<?php echo $user->id_team ?>">
                <input type="hidden" class="form-control" id="duration" name="scrim[duration]" required
                       value="<?php echo $scrim->duration ?>">
                <input type="hidden" class="form-control" id="data_scrim" name="scrim[date_scrim]" required
                       value="<?php echo $scrim->date_scrim ?>">
                <button type="submit" class="btn btn-info btn-outline-info">
                    <i class="material-icons">done</i> <?php echo $this->helper->translate('Scrim', 'LBL_RESPONSE'); ?>
                </button>
            </form>
            <?php } ?>
            <?php if($scrim->id_team1 == $user->id_team) { ?>
            <form action="<?php echo $this->helper->url("Scrim", "deleteScrim"); ?>" method="POST" class="decline" style="float: right;">
                <input type="hidden" class="form-control" id="id" name="scrim[id]" required
                       value="<?php echo $scrim->id ?>">
                <input type="hidden" class="form-control" id="id_scrim" name="scrim[id_game]" required
                       value="<?php echo $scrim->id_game ?>">
                <button type="submit" class="btn btn-danger btn-outline-danger">
                    <i class="material-icons">clear</i> <?php echo $this->helper->translate('Scrim', 'LBL_DECLINE'); ?>
                </button>
            </form>
            <?php } ?>
            <h4 class="info-title">VS. <?php echo $scrim->NAME1 ?></h4>
            <h6><?php echo $scrim->date_scrim ?> - <?php echo $scrim->duration ?></h6>

        </div>

    </div>
<?php } ?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.response').click(function () {
            return confirm("<?php echo $this->helper->translate('Scrim', 'LBL_RESPONSE_TEXT'); ?>");
        });
    });

    jQuery(document).ready(function () {
        jQuery('.decline').click(function () {
            return confirm("<?php echo $this->helper->translate('Scrim', 'LBL_DECLINE_TEXT'); ?>");
        });
    });
</script>
