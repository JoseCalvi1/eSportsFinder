<?php include_once "header.php"; ?>

<div class="container">
        <div class="row">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Nombre del equipo:</label>
                        <input id="name" type="text" class="form-control" placeholder="Nombre del equipo" name="name" required>
                        <small class="form-text text-muted">Se podrá buscar el equipo por su nombre en el listado.</small>
                    </div>
                    <div class="form-group">
                        <label for="teamtag">Team Tag</label>
                        <input type="text" class="form-control" placeholder="Tag del equipo" maxlength="4" name="teamtag" required>
                        <small class="form-text text-muted">Máximo 4 letras.</small>
                    </div>
                    <div class="form-group">
                        <label for="players">Jugadores en el equipo</label>
                        <select class="form-control" name="players">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea class="form-control" rows="3" placeholder="Opcional" name="description"></textarea>
                    </div>
                    <fieldset class="form-group">
                        <label for="play_time">Tiempo dedicado/día</label>
                        <select class="form-control" name="play_time">
                            <option>Menos de 2 horas</option>
                            <option>Entre 2 y 4 horas</option>
                            <option>Más de 4 horas</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="availability">Disponibilidad</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="availability[]" value="Mañana"> Mañana
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="availability[]" value="Tarde"> Tarde
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="availability[]" value="Noche"> Noche
                            </label><br>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary" name="createteam">Crear equipo</button>
                </form>
                <br>
            </div>
        </div>
</div>

<?php include_once "footer.php"; ?>