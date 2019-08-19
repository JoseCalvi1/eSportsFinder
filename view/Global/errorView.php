<div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class=" col-12 text-center">
            <?php if ($this->config['debug']): ?>
                <h1 class="error-number"><?php echo $number; ?></h1>
            <?php else: ?>
                <h1 class="error-number">Oops!</h1>
                <img src="assets/images/error.png"
                     alt="<?php $this->helper->translate('LBL_ERROR_SOMETHING_WENT_WRONG'); ?>" class="img-fluid">
            <?php endif; ?>
        <h6 class="error-message"><?php echo $this->config['debug'] ? $message : $this->helper->translate('LBL_ERROR_SOMETHING_WENT_WRONG') . ' ' . $this->helper->translate('LBL_ERROR_TRY_AGAIN'); ?></h6>
    </div>
</div>