<?php include_once "header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 card-title padding-5">
                <a class="link-theme" href="<?php echo $this->helper->url("Game", "teamlist").'&id='.$_GET['id'] ?>"><?php echo $this->helper->translate('LBL_SEE_MORE') ?></a><br>
                <?php if(!$teams) { echo $this->helper->translate('LBL_NO_RECORD'); } ?>
                <?php foreach ($teams as $team) { ?>
                    <div class="border-bottom padding-5">
                        <h4><b><?= $this->helper->translate('Team', 'LBL_NAME').': </b>'.$team->name.' <b>'.$this->helper->translate('Team', 'LBL_TEAM_TAG').': </b>' ?> [<?= $team->team_tag ?>]</h4>
                        <p><b><?= $this->helper->translate('Team', 'LBL_PLAY_TIME').': </b>'.$team->play_time.' | <b>'.$this->helper->translate('Team', 'LBL_AVAILABILITY').': </b>'.$team->availability ?></p>
                    </div>
                <?php } ?>
            </div>
            <div class="col-12 col-md-4 card-title padding-5">
                <a href="<?php echo $this->helper->url("Team", "manageTeam").'&id='.$_GET['id'] ?>" class="link-title">
                    <div class="info info-card">
                        <img src="assets/images/manage.jpg">
                        <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_MANAGE') ?></h4>
                        <p class="padding-5"><?php echo $this->helper->translate('Game', 'LBL_MANAGE_DESC') ?></p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 card-title padding-5">
                <a href="<?php echo $this->helper->url("Game", "userlist").'&id='.$_GET['id'] ?>" class="link-title">
                    <div class="info info-card">
                        <img src="assets/images/users.jpg">
                        <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_FA') ?></h4>
                        <p class="padding-5"><?php echo $this->helper->translate('Game', 'LBL_FA_DESC') ?></p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 card-title padding-5">
                <a href="<?php echo $this->helper->url("Scrim", "index").'&id='.$_GET['id'] ?>" class="link-title">
                    <div class="info info-card">
                        <img src="assets/images/ts.jpg">
                        <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_TS') ?></h4>
                        <p class="padding-5"><?php echo $this->helper->translate('Game', 'LBL_TS_DESC') ?></p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 card-title padding-5">
                <a href="<?php echo $this->helper->url("Trade", "index").'&id='.$_GET['id'] ?>" class="link-title">
                    <div class="info info-card">
                        <img src="assets/images/chat.jpg">
                        <h4 class="info-title"><?php echo $this->helper->translate('Trade', 'LBL_TRADE_TITLE') ?></h4>
                        <p class="padding-5"><?php echo $this->helper->translate('Game', 'LBL_SIGN_DESC') ?></p>
                    </div>
                </a>
            </div>
        </div>
    </div>

<?php include_once "footer.php"; ?>