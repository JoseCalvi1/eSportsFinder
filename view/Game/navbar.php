<nav class="navbar navbar-expand-lg" style="width: 100%">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="<?php echo $this->helper->url("Game", "index"); ?>">
                <div class="d-none d-sm-block"><img height="50" src="assets/images/logo_header_black.png"></div>
                <div class="d-block d-sm-none"><img height="50" src="assets/images/icono_finder.svg"></div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <?php if ($_GET['id']) { ?>
                    <li class="nav-item">
                        <a href="<?php echo $this->helper->url("Game", "home", (array("id" => $_GET['id']))); ?>"
                           class="nav-link">
                            <?php echo $this->helper->translate('LBL_HOME'); ?>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?php echo $this->helper->url("Game", "index"); ?>" class="nav-link">
                        <?php echo $this->helper->translate('Game', 'LBL_GAMES'); ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $this->helper->url("Message", "index"); ?>" class="nav-link">
                        <?php echo $this->helper->translate('Message', 'LBL_MESSAGES') . ' <span style="color: #ff0000;font-weight: bold">(' . $this->getNoMessages() . ')</span>'; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $this->helper->url("User", "profile"); ?>" class="nav-link">
                        <?php echo $this->helper->translate('LBL_PROFILE'); ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $this->helper->url("User", "logout"); ?>" class="nav-link">
                        <?php echo $this->helper->translate('User', 'LBL_LOGOUT'); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>