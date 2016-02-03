<?php
$dir = get_template_directory_uri();

?>
<footer>
    <div class="wrapper">
        <div class="row">
            <!-- Sidfot -->
            <div class="col-xs-12 col-sm-6 pull-left">
                <p>&copy;&nbsp;&nbsp;Biva AB &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="<?php echo home_url('/'); ?>vara-anlaggningar/om-biva/"> Om Biva </a> &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="<?php echo home_url('/'); ?>vara-anlaggningar/anlaggningar/"> Kontakta oss </a> &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="<?php echo home_url('/'); ?>vara-anlaggningar/lediga-jobb/"> Lediga jobb</a> &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="<?php echo home_url('/'); ?>nyhetsbrev/"> Nyhetsbrev</a>
                </p>
            </div>
            <div class="col-xs-12 col-sm-6 pull-right footer-right">
                <p>
                    Följ oss:&nbsp;&nbsp;&nbsp;
                    <a href="/vara-anlaggningar/anlaggningar/" class="social-icon facebook"></a>&nbsp;&nbsp;
                    <!--<span class="social-icon instagram"></span>&nbsp;&nbsp;-->
                    <a href="https://www.youtube.com/user/BivaBilvaruhuset" class="social-icon youtube"></a>
                </p>
            </div>
        </div>
    </div>
</footer>
<script>
    $('body').on('touchstart.dropdown', '.dropdown-menu', function (e) {
        e.stopPropagation();
    });

    $(document).ready(function () {
        $("a.colorbox-window").colorbox({iframe: true, innerWidth: 720, innerHeight: 720});
    });

</script>
<?php wp_footer(); ?>

</body>

</html>