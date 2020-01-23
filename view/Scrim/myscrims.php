<?php
if (!$my_scrims) {
    echo $this->helper->translate('LBL_NO_RECORD');
}
echo '<h4>'.$this->helper->translate('Scrim', 'LBL_READY').'</h4>';
foreach ($my_scrims as $my_scrim) { ?>
    <div class="col-12">
        <div class="card-message">
            <h4 class="info-title"><?php echo $my_scrim->NAME1 ?>  VS  <?php echo $my_scrim->NAME2 ?></h4>
            <h6><?php echo $my_scrim->date_scrim ?></h6>
            <h6><?php echo $my_scrim->duration ?></h6>
        </div>
    </div>
<?php }
echo '<h4>'.$this->helper->translate('Scrim', 'LBL_WAITING').'</h4>';
if (!$waiting) {
    echo $this->helper->translate('LBL_NO_RECORD');
}
foreach ($waiting as $my_scrim) { ?>
    <div class="col-12">
        <div class="card-message">
            <h4 class="info-title"><?php echo $my_scrim->NAME1 ?>  VS  <?php echo $my_scrim->NAME2 ?></h4>
            <h6><?php echo $my_scrim->date_scrim ?></h6>
            <h6><?php echo $my_scrim->duration ?></h6>
        </div>
    </div>
<?php } ?>



