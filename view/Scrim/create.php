<form action="<?php echo $this->helper->url("Message", "sendMessage"); ?>" method="POST"
      class="align-middle padding-5">
    <input type="hidden" class="form-control" id="description" name="message[id_user_from]"
           value="<?php echo $scrim->id_user_to ?>">
    <input type="hidden" class="form-control" id="description" name="message[id_user_to]" required
           value="<?php echo $scrim->id_user_from ?>">
    <div class="form-group">
        <label for="subject"
               class="bmd-label-floating"><?php echo $this->helper->translate('Message', 'LBL_SUBJECT'); ?></label>
        <input type="text" class="form-control" id="subject" name="message[subject]" required
               value="<?php echo $scrim->subject ?>">
    </div>
    <div class="form-group">
        <label for="description"
               class="bmd-label-floating"><?php echo $this->helper->translate('Message', 'LBL_DESCRIPTION'); ?></label>
        <textarea class="form-control" rows="3" id="description" name="message[description]"
                  required></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-raised" name="registrar"
            value="Registrar"><?php echo $this->helper->translate('User', 'LBL_SUBMIT'); ?></button>
</form>