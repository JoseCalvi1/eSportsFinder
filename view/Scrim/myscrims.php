<?php
if (!$my_scrims) {
    echo $this->helper->translate('LBL_NO_RECORD');
}
foreach ($my_scrims as $my_scrim) { ?>
    <div class="col-12">
        <div class="card-message">
            <h4 class="info-title"><?php echo $my_scrim->NAME1 ?>  VS  <?php echo $my_scrim->NAME2 ?></h4>
            <h6><?php echo $my_scrim->date_scrim ?></h6>
            <h6><?php echo $my_scrim->duration ?></h6>
        </div>
    </div>
<?php } ?>