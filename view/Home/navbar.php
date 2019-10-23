<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="<?php echo $this->config['site_url']; ?>">
                eSports Finder </a>
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
                    <a href="<?php echo $this->helper->url("User", "index"); ?>" class="nav-link">
                        <?php echo $this->helper->translate('User','LBL_INIT_SESSION');?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $this->helper->url("User", "register"); ?>" class="nav-link">
                        <?php echo $this->helper->translate('User','LBL_REGISTER');?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>