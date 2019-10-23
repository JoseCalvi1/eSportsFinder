<?php include_once "header.php"; ?>

    <div class="container">
        <div class="col-sm-12 equipo">
        </div>
        <h2>Búsqueda de jugadores</h2>
        <p>Puedes buscar un jugador por su nombre, posición o modo preferido:</p>
        <input class="form-control" id="search" type="text" placeholder="Buscar..">
        <br>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
            <tr>
                <th><?php echo $this->helper->translate('GameProfile', 'LBL_NAME') ?></th>
                <th><?php echo $this->helper->translate('GameProfile', 'LBL_DESCRIPTION') ?></th>
                <th><?php echo $this->helper->translate('GameProfile', 'LBL_PLAY_TIME') ?></th>
                <th><?php echo $this->helper->translate('GameProfile', 'LBL_AVAILABILITY') ?></th>
            </tr>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user->name ?></td>
                    <td><?php echo $user->description ?></td>
                    <td><?php echo $user->play_time ?></td>
                    <td><?php echo $user->availability ?></td>
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