<?php
if (!$scrims) {
    echo $this->helper->translate('LBL_NO_RECORD');
}
foreach ($scrims as $scrim) { ?>
    <div class="col-12">
        <div class="card-message">
            <h4 class="info-title">VS. <?php echo $scrim->NAME1 ?></h4>
            <h6><?php echo $scrim->date_scrim ?></h6>
            <h6><?php echo $scrim->duration ?></h6>
        </div>
    </div>
<?php } ?>