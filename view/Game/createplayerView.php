<?php include_once "header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="<?php echo $this->helper->url("Game", "createPlayer"); ?>" method="POST">
                    <div class="form-group">
                        <input id="id_game" type="hidden" class="form-control" name="player[id_game]"
                               value="<?php echo $id_game ?>" required>
                        <label for="name">Nombre de jugador:</label>
                        <input id="name" type="text" class="form-control" placeholder="Nombre del jugador"
                               name="player[name]" required>
                        <small class="form-text text-muted">Se podrá buscar el jugador por su nombre en el listado.
                        </small>
                    </div>
                    <fieldset class="form-group">
                        <label for="description">Descripción</label>
                        <select class="form-control" name="player[description]">
                            <?php foreach ($role as $key => $item) { ?>
                                <option><?= $role[$key]->name; ?></option>
                            <?php } ?>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="play_time">Tiempo dedicado/día</label>
                        <select class="form-control" name="player[play_time]">
                            <option>Menos de 2 horas</option>
                            <option>Entre 2 y 4 horas</option>
                            <option>Más de 4 horas</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="availability">Disponibilidad</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="player[availability][]" value="Mañana"> Mañana
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" name="player[availability][]" value="Tarde"> Tarde
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" name="player[availability][]" value="Noche"> Noche
                            </label><br>
                        </div>

                    </fieldset>
                    <button type="submit" class="btn btn-primary" name="createteam">Crear jugador</button>
                </form>
                <br>
            </div>
        </div>
    </div>

<?php include_once "footer.php"; ?>