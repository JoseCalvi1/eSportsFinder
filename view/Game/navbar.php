<nav class="navbar navbar-expand-lg" style="width: 100%">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="<?php echo $this->helper->url("Game", "index"); ?>">
                Esports Finder </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?php echo $this->helper->url("Game", "index"); ?>" class="nav-link">
                        <?php echo $this->helper->translate('Game','LBL_GAMES');?>
                    </a>
                </li>
                <?php if($_GET['id']) { ?>
                <li class="nav-item">
                    <a href="<?php echo $this->helper->url("Game", "home").'&id='.$_GET['id']; ?>" class="nav-link">
                        <?php echo $this->helper->translate('LBL_HOME');?>
                    </a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?php echo $this->helper->url("Message", "index"); ?>" class="nav-link">
                        <?php echo $this->helper->translate('Message','LBL_MESSAGES');?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $this->helper->url("User", "profile"); ?>" class="nav-link">
                        <?php echo $this->helper->translate('LBL_PROFILE');?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $this->helper->url("User", "logout"); ?>" class="nav-link">
                        <?php echo $this->helper->translate('User','LBL_LOGOUT');?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>