<form action="<?php echo $this->helper->url("Scrim", "createTS"); ?>" method="POST"
      class="align-middle padding-5">
    <input type="hidden" class="form-control" id="id_game" name="scrim[id_game]"
           value="<?php echo $user->id_game ?>">
    <input type="hidden" class="form-control" id="id_team" name="scrim[id_team]" required
           value="<?php echo $user->id_team ?>">
    <div class="form-group">
        <label for="subject"
               class="bmd-label-floating"><?php echo $this->helper->translate('Scrim', 'LBL_DURATION'); ?></label>
        <input type="text" class="form-control" id="subject" name="scrim[duration]" required>
    </div>
    <div class="form-group">
        <input type="datetime-local" class="form-control" id="date_scrim" name="scrim[date_scrim]" required>
    </div>
    <button type="submit" class="btn btn-primary btn-raised" name="registrar"
            value="Registrar"><?php echo $this->helper->translate('User', 'LBL_SUBMIT'); ?></button>
</form>