<?php include_once "view/Game/header.php"; ?>

<div class="container">
    <h1 class="info-title"><?php echo $teams[0]->name.' ['.$teams[0]->description.']' ?></h1>
    <h2><?php echo $this->helper->translate('Team', 'LBL_PLAYERS'); ?></h2>
    <div class="row">
        <?php foreach ($players as $player) { ?>
            <div class="col-3">
                <div class="card-team">
                    <h4 class="info-title"><?php echo $player->name ?></h4>
                    <p><?php echo $player->description ?></p>
                    <p><?php echo $player->play_time ?></p>
                    <p><?php echo $player->availability ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include_once "view/Game/footer.php"; ?>
