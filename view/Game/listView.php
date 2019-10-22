<?php include_once "header.php"; ?>

<?php include_once "navbar.php"; ?>

<div class="container">
    <div class="row">

        <?php foreach($games as $game) { ?>
            <div class="col-6 col-md-3 card-title">
                <a href="<?php echo ($game->status)=='READY' ? $this->helper->url("Game", "home") : '#'; ?>" class="link-title">
                    <img class="title-img" width="180" height="250" src="assets/images/<?php echo strtolower($game->media); ?>.jpg"><br>
                    <span class="title"><?php echo $game->name; ?> / <?php echo ($game->crossplay) ? "All platforms" : $game->platform; ?></span>
                    <span class="platform"></span><br>
                    <span><?php echo $game->description; ?></span>
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<?php include_once "footer.php"; ?>