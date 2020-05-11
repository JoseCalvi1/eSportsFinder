<?php
if (!$messages) {
    echo $this->helper->translate('LBL_NO_RECORD');
}
?>
<div class="col-12">
    <form action="<?php echo $this->helper->url("Message", "sendMessage"); ?>" method="POST"
          class="align-middle padding-5">
        <div class="form-group">
            <label for="subject"
                   class="bmd-label-floating"><?php echo $this->helper->translate('Message', 'LBL_USER_TO'); ?></label>
            <input type="text" class="form-control" id="description" name="message[user_to]">
        </div>
        <div class="form-group">
            <label for="subject"
                   class="bmd-label-floating"><?php echo $this->helper->translate('Message', 'LBL_SUBJECT'); ?></label>
            <input type="text" class="form-control" id="subject" name="message[subject]" required>
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
</div>
