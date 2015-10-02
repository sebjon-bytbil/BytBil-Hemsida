    <footer class="blue-bg">
        <div class="container-fluid wrapper">
            <?php
                
                $facilities = get_field('settings-facilities','options');
                foreach($facilities as $facility) {
                    $facility_fields = get_fields($facility->ID);
                ?>
                    <div class="col-xs-12 col-sm-3">
                        <h4 class="bold"><?php echo get_the_title($facility->ID); ?></h4>
                        <strong>Växel:</strong> <a href="tel:<?php echo $facility_fields['facility-telephone']; ?>"><?php echo $facility_fields['facility-telephone']; ?></a>
                        <br>
                        <strong>Fax:</strong> <?php echo $facility_fields['facility-telefax']; ?>
                        <br>
                        <a href="mailto:<?php echo $facility_fields['facility-email']; ?>"><?php echo $facility_fields['facility-email']; ?></a>
                    </div>
            
                <?php
                }
                ?>
            
        </div>
    </footer>

    <?php wp_footer(); ?>

    <!-- Bootstrap -->
    <script src="/wp-content/themes/ahlberg-bil/js/bootstrap.min.js"></script>
    <script src="/wp-content/themes/ahlberg-bil/js/jquery.flexslider-min.js"></script>
    <script src="/wp-content/themes/ahlberg-bil/js/init.js"></script>


</body>
</html>