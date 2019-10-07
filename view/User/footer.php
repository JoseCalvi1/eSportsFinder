<footer>
    <hr/>
    <center>
    <a class="showLoader" href="<?php echo $this->config['site_url']; ?>"><?php echo $this->config['app_name']; ?></a> -
    Copyright
    &copy; <?php echo date("Y"); ?>
    <br><br>
    </center>
</footer>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="vendor/jQuery/jquery.min.js"></script>
<script src="vendor/bootstrap-material-design/js/popper.js"></script>
<script src="vendor/bootstrap-material-design/js/bootstrap-material-design.js"></script>
<script src="view/Global/javascript/global.js<?php echo $this->config['debug'] ? '?version=' . uniqid() : ''; ?>"></script>
</body>
</html>