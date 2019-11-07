<?php include_once "header.php"; ?>

    <div class="container">
        <div class="col-sm-12 equipo">
        </div>
        <h2><?php echo $this->helper->translate('Team', 'LBL_TEAM_TITLE') ?></h2>
        <p><?php echo $this->helper->translate('Team', 'LBL_SEARCH') ?></p>
        <input class="form-control" id="search" type="text" placeholder="<?php echo $this->helper->translate('LBL_SEARCH') ?>...">
        <br>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
            <tr>
                <th><?php echo $this->helper->translate('Team', 'LBL_NAME') ?></th>
                <th><?php echo $this->helper->translate('Team', 'LBL_DESCRIPTION') ?></th>
                <th><?php echo $this->helper->translate('Team', 'LBL_PLAY_TIME') ?></th>
                <th><?php echo $this->helper->translate('Team', 'LBL_AVAILABILITY') ?></th>
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
    <script>
        // Buscará en el evento keyup
        $(document).ready(function () {
            $("#search").keyup(function () {
                _this = this;
                // Mostrará las filas que contengan lo escrito en el buscador
                $.each($("#mytable tbody tr"), function () {
                    if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                        $(this).hide();
                    else
                        $(this).show();
                });
            });
        });
    </script>

<?php include_once "footer.php"; ?>