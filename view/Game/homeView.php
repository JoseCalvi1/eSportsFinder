<?php include_once "header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 card-title padding-5">
                <a href="#">Ver más</a>
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                    <tr>
                        <th>Equipo</th>
                        <th>Team Tag</th>
                        <th>Play time</th>
                        <th>Availability</th>
                    </tr>
                    <?php foreach ($teams as $team) { ?>
                        <tr>
                            <td><?php echo $team->name ?></td>
                            <td><?php echo $team->description ?></td>
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
                <a href="#" class="link-title">
                    <div class="info info-card">
                        <img src="assets/img/manage.jpg">
                        <h4 class="info-title"><?php echo $this->helper->translate('Game','LBL_MANAGE')?></h4>
                        <p>Divide details about your product or agency work into parts. Write a few lines about each
                            one. A paragraph describing a feature will be enough.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 card-title padding-5">
                <a href="#" class="link-title">
                    <div class="info info-card">
                        <img src="assets/img/users.jpg">
                        <h4 class="info-title"><?php echo $this->helper->translate('Game','LBL_FA')?></h4>
                        <p>Divide details about your product or agency work into parts. Write a few lines about each
                            one. A paragraph describing a feature will be enough.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 card-title padding-5">
                <a href="#" class="link-title">
                    <div class="info info-card">
                        <img src="assets/img/ts.jpg">
                        <h4 class="info-title"><?php echo $this->helper->translate('Game','LBL_TS')?></h4>
                        <p>Divide details about your product or agency work into parts. Write a few lines about each
                            one. A paragraph describing a feature will be enough.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 card-title padding-5">
                <a href="#" class="link-title">
                    <div class="info info-card">
                        <img src="assets/img/chat.jpg">
                        <h4 class="info-title"><?php echo $this->helper->translate('Game','LBL_CHAT')?></h4>
                        <p>Divide details about your product or agency work into parts. Write a few lines about each
                            one. A paragraph describing a feature will be enough.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

<?php include_once "footer.php"; ?>