<?php include_once "header.php"; ?>

<?php include_once "navbar.php"; ?>

<div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/images/esports.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="brand text-center">
                    <h1>eSports Finder</h1>
                    <h3 class="title text-center">online</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <div class="section text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title"><?php echo $this->helper->translate('Game','LBL_CHAT')?></h2>
                        <h5 class="description"><?php echo $this->helper->translate('Game','LBL_CHAT')?></h5>
                    </div>
                </div>
                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info info-card">
                                <img width="350" height="180" src="assets/images/users.jpg">
                                <h4 class="info-title"><?php echo $this->helper->translate('Game','LBL_FA')?></h4>
                                <p class="padding-5"><?php echo $this->helper->translate('Game','LBL_FA_DESC')?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info info-card">
                                <img width="350" height="180"  src="assets/images/manage.jpg">
                                <h4 class="info-title"><?php echo $this->helper->translate('Game','LBL_MANAGE')?></h4>
                                <p class="padding-5"><?php echo $this->helper->translate('Game','LBL_MANAGE_DESC')?></p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info info-card">
                                <img width="350" height="180"  src="assets/images/teams.jpg">
                                <h4 class="info-title"><?php echo $this->helper->translate('Game','LBL_SIGN')?></h4>
                                <p class="padding-5"><?php echo $this->helper->translate('Game','LBL_SIGN_DESC')?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info info-card">
                                <img width="350" height="180"  src="assets/images/ts.jpg">
                                <h4 class="info-title"><?php echo $this->helper->translate('Game','LBL_TS')?></h4>
                                <p class="padding-5"><?php echo $this->helper->translate('Game','LBL_TS_DESC')?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info info-card">
                                <img width="350" height="180"  src="assets/images/chat.jpg">
                                <h4 class="info-title"><?php echo $this->helper->translate('Game','LBL_IMPROVE')?></h4>
                                <p class="padding-5"><?php echo $this->helper->translate('Game','LBL_IMPROVE_DESC')?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info info-card">
                                <img width="350" height="180"  src="assets/images/chat.jpg">
                                <h4 class="info-title"><?php echo $this->helper->translate('Game','LBL_CHAT')?></h4>
                                <p class="padding-5"><?php echo $this->helper->translate('Game','LBL_CHAT_DESC')?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>
