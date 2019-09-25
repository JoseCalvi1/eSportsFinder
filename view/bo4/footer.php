<footer>
    <hr/>
    <a class="showLoader" href="<?php echo $this->config['site_url'];?>"><?php echo $this->config['app_name'];?></a> - Copyright
    &copy; <?php echo date("Y"); ?>
    <br><br>
</footer>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="vendor/jQuery/jquery.min.js"></script>
<script src="vendor/bootstrap-material-design/js/popper.js"></script>
<script src="vendor/bootstrap-material-design/js/bootstrap-material-design.js"></script>
<script>$(document).ready(function () {
        $('body').bootstrapMaterialDesign();
    });</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.showLoader').on('click', function (e) {
            $('#loader_container').show();
        });
        setTimeout(function () {
            $("#div_alert").fadeOut("normal", function () {
                $(this).remove();
            });
        }, 5000);
    });
</script>
</body>
</html>