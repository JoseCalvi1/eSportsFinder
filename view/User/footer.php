<footer style="background-color: #1A1A1A">
    <div class="container">
        <div class="row" style="padding: 50px 0px;">
            <div class="col-sm-6 col-xs-12">
                <img height="50" src="assets/images/logo_footer.png" style="width: 100%;">
            </div>
            <div class="col-sm-6 col-xs-12">
                <h2 style="color: white;margin-top: unset;"><strong><?php echo $this->helper->translate('LBL_FIND_US'); ?></strong></h2>
                <a href="https://twitter.com/esportFinder_" class="fa fa-twitter"></a>
            </div>
        </div>
        <div class="row" style="color: white;padding: 10px 0px;">
            <div class="col-sm-6 col-xs-12">
                <a style="color:white;" href="<?php echo $this->config['site_url']; ?>"><strong><?php echo $this->config['app_name']; ?></strong></a> -
                Copyright
                &copy; <?php echo date("Y"); ?>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="vendor/jQuery/jquery.min.js"></script>
<script src="vendor/bootstrap-material-design/js/popper.js"></script>
<script src="vendor/bootstrap-material-design/js/bootstrap-material-design.js"></script>
<script src="view/Global/javascript/global.js<?php echo $this->config['debug'] ? '?version=' . uniqid() : ''; ?>"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150282465-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-150282465-1');
</script>
</body>
</html>