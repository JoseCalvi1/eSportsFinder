<?php include_once "header.php"; ?>

    <div class="container-fluid d-none d-sm-block"
         style="margin-top:-20px; background-image: url('assets/images/game_list.jpg'); background-position:center; background-size: cover; height: 100%; width: 100% ;background-repeat: no-repeat">
        <div class="container">
            <h1 class="info-title"
                style="color: white; padding-top: 220px"></h1>
        </div>
    </div>

    <div class="container" style="max-width: 100vw;">
        <div class="row">

            <div class="col-12 card-title">
                <iframe style="width: 70%; margin-top: 25px;" src="https://discordapp.com/widget?id=686877443109158913&theme=dark"
                        height="250" allowtransparency="true"
                        frameborder="0"></iframe>
            </div>

            <div class="col-12 card-title">
                <h2 class="info-title"><?= $this->helper->translate('Game', 'LBL_GAMES') ?></h2>
            </div>

            <?php foreach ($games as $game) { ?>
                <div class="col-6 col-md-3 card-title">
                    <a href="<?php echo ($game->status) == 'READY' ? $this->helper->url("Game", "home") . '&id=' . $game->id : '#'; ?>"
                       class="link-title">
                        <img class="title-img" width="150" height="230"
                             src="assets/images/<?php echo strtolower($game->media); ?>.jpg"><br>
                        <?php if (($game->status) == 'PENDING') { ?>
                            <span>Próximamente</span><br>
                        <?php } ?>
                        <span class="title"><?php echo $game->name; ?> / <?php echo ($game->crossplay) ? "All platforms" : $game->platform; ?></span>
                        <span class="platform"></span><br>
                        <span><?php echo $game->description; ?></span>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

<?php include_once "footer.php"; ?>