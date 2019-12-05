<?php include_once "view/Game/header.php"; ?>

    <div class="container">
        <div class="col-sm-12 equipo">
        </div>
        <h2><?= $this->helper->translate('Trade', 'LBL_TRADE_TITLE') ?></h2>
        <?php if(!$trades) { echo $this->helper->translate('LBL_NO_RECORD'); } ?>
        <?php foreach ($trades as $trade) {
            if($trade->action == 'IN') {
                $action = $this->helper->translate('Trade', 'LBL_IN');
            } elseif($trade->action == 'OUT') {
                $action = $this->helper->translate('Trade', 'LBL_OUT');
            }
            ?>

            <div class="border-bottom padding-5">
                <h4>
                    <?= '<b>'.$trade->user_name.'</b> '.$action.' <b>'.$trade->team_name.'</b>' ?>
                </h4>
            </div>

        <?php } ?>
    </div>

<?php include_once "view/Game/footer.php"; ?>