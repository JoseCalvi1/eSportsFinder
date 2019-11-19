<?php include_once "header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 card-title padding-5">
                <a href="<?php echo $this->helper->url("Game", "teamlist").'&id='.$_GET['id'] ?>"><?php echo $this->helper->translate('LBL_SEE_MORE') ?></a>
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                    <tr>
                        <th><?php echo $this->helper->translate('Team', 'LBL_NAME') ?></th>
                        <th><?php echo $this->helper->translate('Team', 'LBL_TEAM_TAG') ?></th>
                        <th><?php echo $this->helper->translate('Team', 'LBL_PLAY_TIME') ?></th>
                        <th><?php echo $this->helper->translate('Team', 'LBL_AVAILABILITY') ?></th>
                    </tr>
                    <?php foreach ($teams as $team) { ?>
                        <tr>
                            <td><?php echo $team->name ?></td>
                            <td><?php echo $team->team_tag ?></td>
                            <td><?php echo $team->play_time ?></td>
                            <td><?php echo $team->availability ?></td>
                        </tr>
                    <?php } ?>
                    </thead>
                    <tbody id="tabla">

                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-4 card-title padding-5">
                <a href="<?php echo $this->helper->url("Team", "manageTeam").'&id='.$_GET['id'] ?>" class="link-title">
                    <div class="info info-card">
                        <img src="assets/images/manage.jpg">
                        <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_MANAGE') ?></h4>
                        <p>Divide details about your product or agency work into parts. Write a few lines about each
                            one. A paragraph describing a feature will be enough.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 card-title padding-5">
                <a href="<?php echo $this->helper->url("Game", "userlist").'&id='.$_GET['id'] ?>" class="link-title">
                    <div class="info info-card">
                        <img src="assets/images/users.jpg">
                        <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_FA') ?></h4>
                        <p>Divide details about your product or agency work into parts. Write a few lines about each
                            one. A paragraph describing a feature will be enough.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 card-title padding-5">
                <a href="#" class="link-title">
                    <div class="info info-card">
                        <img src="assets/images/ts.jpg">
                        <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_TS') ?></h4>
                        <p>Divide details about your product or agency work into parts. Write a few lines about each
                            one. A paragraph describing a feature will be enough.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 card-title padding-5">
                <a href="#" class="link-title">
                    <div class="info info-card">
                        <img src="assets/images/chat.jpg">
                        <h4 class="info-title"><?php echo $this->helper->translate('Game', 'LBL_CHAT') ?></h4>
                        <p>Divide details about your product or agency work into parts. Write a few lines about each
                            one. A paragraph describing a feature will be enough.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

<?php include_once "footer.php"; ?>