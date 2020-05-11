<?php include_once "view/Game/header.php"; ?>

    <style>
        .nav-tabs .nav-item .nav-link {
            color: #000 !important;
        }

        .nav-tabs .nav-link.active {
            color: rgba(0, 0, 0, 0.87) !important;
            border-bottom: 2px solid #9c27b0 !important;
        }

        .nav-tabs .nav-item .nav-link:hover, .nav-tabs .nav-item .nav-link:focus {
            border-bottom: 2px solid #9c27b0 !important;
            color: #000 !important;
            font-weight: 500;
        }

        .tab-content {
            padding: 15px;
            width: 100%;
        }
    </style>
    <div class="container">
        <h2><?php echo $this->helper->translate('Scrim', 'LBL_TITLE'); ?></h2>
       <!-- <?php /*echo('<pre>'.print_r($this, true).'</pre>');
        if ($error) { */?>
            <div class="alert alert-danger" role="alert">
                This is a danger alert—check it out!
            </div>
        --><?php /*} */?>
        <div class="row">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile"
                       aria-selected="false"><?php echo $this->helper->translate('Scrim', 'LBL_MY_SCRIMS'); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home"
                       aria-selected="true"><?php echo $this->helper->translate('Scrim', 'LBL_SCRIMS'); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                       aria-controls="contact"
                       aria-selected="false"><?php echo $this->helper->translate('Scrim', 'LBL_CREATE_SCRIM'); ?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel"
                     aria-labelledby="profile-tab"><?php include_once "myscrims.php"; ?></div>
                <div class="tab-pane fade" id="home" role="tabpanel"
                     aria-labelledby="home-tab"><?php include_once "scrims.php"; ?></div>
                <div class="tab-pane fade" id="contact" role="tabpanel"
                     aria-labelledby="contact-tab"><?php include_once "create.php"; ?></div>
            </div>
        </div>
    </div>


<?php include_once "view/Game/footer.php"; ?>