<?php
if (!$my_scrims) {
    echo $this->helper->translate('LBL_NO_RECORD');
}
foreach ($my_scrims as $my_scrim) { ?>
    <div class="col-12">
        <div class="card-message">
            <h4 class="info-title"><?php echo $my_scrim->subject ?></h4>
            <h6><?php echo $this->helper->translate('LBL_FROM') . ' ' . $my_scrim->name . ' ' . $this->helper->translate('LBL_AT') . ' ' . $my_scrim->date_modified ?></h6>
            <p><?php echo $my_scrim->message ?></p>
        </div>
    </div>
<?php } ?>