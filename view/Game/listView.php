<?php include_once "header.php"; ?>


<div class="container" style="max-width: 100vw;">
    <div class="row">

        <?php foreach($games as $game) { ?>
            <div class="col-6 col-md-3 card-title">
                <a href="<?php echo ($game->status)=='READY' ? $this->helper->url("Game", "home").'&id='.$game->id : '#'; ?>" class="link-title">
                    <img class="title-img" width="150" height="230" src="assets/images/<?php echo strtolower($game->media); ?>.jpg"><br>
                    <span class="title"><?php echo $game->name; ?> / <?php echo ($game->crossplay) ? "All platforms" : $game->platform; ?></span>
                    <span class="platform"></span><br>
                    <span><?php echo $game->description; ?></span>
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<?php include_once "footer.php"; ?>