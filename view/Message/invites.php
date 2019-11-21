<?php
foreach ($invitations as $invitation) { ?>
    <div class="col-12">
        <div class="card-message">
            <h4 class="info-title"><?php echo $invitation->subject ?></h4>
            <h6><?php echo $this->helper->translate('LBL_FROM').' '.$invitation->name.' '.$this->helper->translate('LBL_AT').' '.$invitation->date_modified ?></h6>
            <p><?php echo $invitation->message ?></p>
            <a data-toggle="modal" href="#myModalAcp" data-target="#accept-modal-<?php echo $invitation->id; ?>" id="<?php echo $invitation->id; ?>">
                <i class="material-icons">check</i><?php echo $this->helper->translate('LBL_ACCEPT'); ?></a>
            <a data-toggle="modal" href="#myModalRef" data-target="#refuse-modal-<?php echo $invitation->id; ?>" id="<?php echo $invitation->id; ?>">
                <i class="material-icons">clear</i><?php echo $this->helper->translate('LBL_REFUSE'); ?></a>
        </div>
    </div>

    <div id="accept-modal-<?php echo $invitation->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 10px;">
                <div class="modal-header">
                    <h4 class="modal-title"
                        id="myModalLabel"><?php echo $this->helper->translate('Message', 'LBL_ACCEPT_INV'); ?></h4>
                </div>
                <form action="<?php echo $this->helper->url("Message", "acceptInv"); ?>" method="POST"
                      class="align-middle padding-5">
                    <input type="hidden" class="form-control" id="description" name="message[id]"
                           value="<?php echo $invitation->id ?>">
                    <input type="hidden" class="form-control" id="id_game" name="message[id_game]" value="<?php echo $invitation->id_game ?>">
                    <input type="hidden" class="form-control" id="id_team" name="message[id_team]" value="<?php echo $invitation->id_team ?>">
                    <button type="submit" class="btn btn-primary btn-raised" name="registrar"
                            value="Registrar"><?php echo $this->helper->translate('User', 'LBL_SUBMIT'); ?></button>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="refuse-modal-<?php echo $invitation->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 10px;">
                <div class="modal-header">
                    <h4 class="modal-title"
                        id="myModalLabel"><?php echo $this->helper->translate('Message', 'LBL_REFUSE_INV'); ?></h4>
                </div>
                <form action="<?php echo $this->helper->url("Message", "refuseInv"); ?>" method="POST"
                      class="align-middle padding-5">
                    <input type="hidden" class="form-control" id="description" name="message[id]"
                           value="<?php echo $invitation->id ?>">
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