<?php
foreach ($invitations as $invitation) { ?>
    <div class="col-12">
        <div class="card-message">
            <h4 class="info-title"><?php echo $invitation->subject ?></h4>
            <h6><?php echo $this->helper->translate('LBL_FROM').' '.$invitation->name.' '.$this->helper->translate('LBL_AT').' '.$invitation->date_modified ?></h6>
            <p><?php echo $invitation->message ?></p>
        </div>
    </div>
<?php } ?>