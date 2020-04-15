<?php include_once "header.php"; ?>

<?php include_once "navbar.php"; ?>

<div class="page-header header-filter" data-parallax="true"
     style="background-image: url('assets/images/finderonline.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="brand text-center">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="main">
    <div class="container-fluid" style="background-color: #b1b1b1;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img height="65" style="float: left;padding-top:20px;" src="assets/images/icono_finder.svg">
                    <p style="font-size: 25px; padding: 20px;margin-left: 40px;"> Únete
                        <strong>gratis</strong> y comienza a
                        competir con otros equipos</p>
                </div>
                <div class="col-md-6">
                    <img height="65" style="float: left;padding-top: 20px;" src="assets/images/icono_finder.svg">
                    <p style="font-size: 25px; padding: 20px;margin-left: 40px;"> Encuentra
                        a otros jugadores y juega junto
                        a
                        ellos contra tus oponentes</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="section text-center" style="padding: unset;">
            <div class="section text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title"><?php echo $this->helper->translate('LBL_DISCOVER') ?></h2>
                    </div>
                </div>
                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info info-card">
                                <img width="350" height="180" src="assets/images/users.jpg">
                                <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_FA') ?></h4>
                                <p class="padding-5"><?php echo $this->helper->translate('Game', 'LBL_FA_DESC') ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info info-card">
                                <img width="350" height="180" src="assets/images/manage.jpg">
                                <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_MANAGE') ?></h4>
                                <p class="padding-5"><?php echo $this->helper->translate('Game', 'LBL_MANAGE_DESC') ?></p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info info-card">
                                <img width="350" height="180" src="assets/images/teams.jpg">
                                <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_SIGN') ?></h4>
                                <p class="padding-5"><?php echo $this->helper->translate('Game', 'LBL_SIGN_DESC') ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info info-card">
                                <img width="350" height="180" src="assets/images/ts.jpg">
                                <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_TS') ?></h4>
                                <p class="padding-5"><?php echo $this->helper->translate('Game', 'LBL_TS_DESC') ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info info-card">
                                <img width="350" height="180" src="assets/images/discord.jpg">
                                <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_DISCORD') ?></h4>
                                <p class="padding-5"><?php echo $this->helper->translate('Game', 'LBL_DISCORD_DESC') ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info info-card">
                                <img width="350" height="180" src="assets/images/chat.jpg">
                                <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_CHAT') ?></h4>
                                <p class="padding-5"><?php echo $this->helper->translate('Game', 'LBL_CHAT_DESC') ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 50px;">
                        <div class="col-sm-6 col-xs-12">
                            <div style="text-align: justify;">
                                <h1 style="font-weight: bold;">
                                    <strong><?php echo $this->helper->translate('LBL_KNOW_MORE') ?></strong></h1>
                                <p style="font-size: large"><?php echo $this->helper->translate('LBL_KNOW_MORE_TEXT') ?></p>
                                <a style="font-size: large; padding: 20px;border-radius: 50px;margin-top:10px;position:absolute;" href="<?php echo $this->helper->url("User", "register"); ?>"
                                   class="badge badge-dark"><?php echo $this->helper->translate('User', 'LBL_REGISTER'); ?></a>
                            </div>
                        </div>
                        <div class="col-6 d-none d-sm-block">
                            <img height="400" src="assets/images/mockup_games.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>
