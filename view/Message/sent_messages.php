<?php
if (!$sent_messages) {
    echo $this->helper->translate('LBL_NO_RECORD');
}
foreach ($sent_messages as $message) { ?>
    <div class="col-12">
        <div class="card-message">
            <h4 class="info-title"><?php echo $message->subject ?></h4>
            <h6><?php echo $this->helper->translate('LBL_FROM') . ' ' . $message->name . ' ' . $this->helper->translate('LBL_AT') . ' ' . $message->date_modified ?></h6>
            <p><?php echo $message->message ?></p>
        </div>
    </div>
<?php } ?>