<?php
if (!$messages) {
    echo $this->helper->translate('LBL_NO_RECORD');
}
foreach ($messages as $message) { ?>
    <div class="col-12">
        <div class="card-message">
            <h4 class="info-title"><?php echo $message->subject ?></h4>
            <h6><?php echo $this->helper->translate('LBL_FROM') . ' ' . $message->name . ' ' . $this->helper->translate('LBL_AT') . ' ' . $message->date_modified ?></h6>
            <p><?php echo $message->message ?></p>
            <a data-toggle="modal" href="#myModal" data-target="#edit-modal-<?php echo $message->id; ?>"
               id="<?php echo $message->id; ?>">
                <i class="material-icons">chat</i><?php echo $this->helper->translate('Message', 'LBL_REPLY'); ?></a>
        </div>
    </div>

    <div id="edit-modal-<?php echo $message->id; ?>" class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 10px;">
                <div class="modal-header">
                    <h4 class="modal-title"
                        id="myModalLabel"><?php echo $this->helper->translate('Message', 'LBL_SEND_MESSSAGE'); ?></h4>
                </div>
                <form action="<?php echo $this->helper->url("Message", "sendMessage"); ?>" method="POST"
                      class="align-middle padding-5">
                    <input type="hidden" class="form-control" id="description" name="message[id_user_to]"
                           value="<?php echo $message->id_user_to ?>">
                    <input type="hidden" class="form-control" id="description" name="message[id_user_from]" required
                           value="<?php echo $message->id_user_from ?>">
                    <div class="form-group">
                        <label for="subject"
                               class="bmd-label-floating"><?php echo $this->helper->translate('Message', 'LBL_SUBJECT'); ?></label>
                        <input type="text" class="form-control" id="subject" name="message[subject]" required
                               value="RE: <?php echo $message->subject ?>">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>