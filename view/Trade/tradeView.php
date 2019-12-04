<?php include_once "view/Game/header.php"; ?>

    <div class="container">
        <div class="col-sm-12 equipo">
        </div>
        <h2><?= $this->helper->translate('Trade', 'LBL_TRADE_TITLE') ?></h2>
        <?php if(!$trades) { echo $this->helper->translate('LBL_NO_RECORD'); } ?>
        <?php foreach ($trades as $trade) {
            if($trade->action == 'IN') {
                $action = $this->helper->translate('Trade', 'LBL_IN');
            } elseif($trade->action == 'OUT') {
                $action = $this->helper->translate('Trade', 'LBL_OUT');
            }
            ?>

            <div class="border-bottom padding-5">
                <h4>
                    <?= '<b>'.$trade->user_name.'</b> '.$action.' <b>'.$trade->team_name.'</b>' ?>
                </h4>
                <hr>
            </div>

        <?php } ?>
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

<?php include_once "view/Game/footer.php"; ?>