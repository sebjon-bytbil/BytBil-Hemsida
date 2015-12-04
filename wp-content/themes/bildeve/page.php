<?php
get_header();
$dir = get_template_directory_uri();
?>

    <main>

        <?php if(!is_front_page() ) { ?>
        <div class="container-fluid marked">
            <div class="wrapper  breadcrumbs">

                <div class="row">

                    <div class="col-xs-12 col-sm-8">
                        <?php the_breadcrumbs(); ?>
                    </div>

                    <div class="col-xs-12 col-sm-4 hidden-xs">
                        <div class="sharing">
                            Dela sidan:
                            <a href="https://www.facebook.com/bildeve?fref=ts" target="_blank"><img src="<?php echo $dir; ?>/images/icon-facebook.png" /></a>
                            <a href="https://www.twitter.com/bildeve" target="_blank"><img src="<?php echo $dir; ?>/images/icon-twitter.png" /></a>
                            <a href="#"><img src="<?php echo $dir; ?>/images/icon-envelope.png" /></a>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
        
        <?php } ?>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


        <div class="container-fluid wrapper">
            <?php the_content(); ?>
            
            <div class="col-xs-12 col-sm-3">
                <div class="box-simple">

                    <?php
                    $menu = new wp_bootstrap_navwalker();

                    $menu_string = wp_nav_menu(array(
                            'menu' => 'Huvudmeny',
                            'echo' => false,
                            'depth' => 3,
                            'container' => false,
                            'menu_class' => 'nav submenu',
                            'start_in' => $ID_of_page,
                            'theme_location' => 'primary',
                            'walker' => $menu
                        )
                    );
                    echo $menu_string;
                    ?>
                </div>
                
            </div>

                        <!--<div class="col-xs-12 col-sm-12">
                            <div class="box-simple">
                                <div class="row no-margins">

                                    <div class="col-xs-12 col-custom-wide">
                                        <div class="padding-thick">
                                            <h3>Kontakta våra verkstäder</h3>

                                            <p>Alla våra verkstäder uppfyller de senaste krav som ställs på lokaler och utrustning med all den senaste tekniker för felsökning på Volvo, Renault.
                                                Kom förbi, ring oss eller hör av dig via vårt kontaktformulär.</p><br />

                                            <?php
                                            //get_facilities_compact();
                                            ?>

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-custom-narrow" style="border-left: 1px solid #f7f7f7;">
                                        <div class="padding">
                                            <h3>Hör av dig till oss</h3>

                                            Skicka oss ett meddelande så hör vi av oss när det passar dig.

                                            <form>
                                                <div class="form-row">
                                                    <input type="text" placeholder="Namn" />
                                                </div>
                                                <div class="form-row">
                                                    <input type="text" placeholder="E-post" />
                                                </div>
                                                <div class="form-row">
                                                    <input type="text" placeholder="Telefon" />
                                                </div>
                                                <div class="form-row">
                                                    <div class="select-wrapper">
                                                        <select>
                                                            <option value="" disabled selected>Välj anläggning</option>
                                                            <option>Helsingborg</option>
                                                            <option>Landskrona</option>
                                                            <option>Höganäs</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <textarea placeholder="Meddelande" rows="3"></textarea>
                                                </div>

                                                <br />

                                                <h6>Kontakta mig på</h6>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-7">
                                                        <div class="form-row">
                                                            <div class="checkbox-wrapper"><input type="checkbox" /><span></span></div>&nbsp; E-post &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="checkbox-wrapper"><input type="checkbox" /><span></span></div>&nbsp; Telefon<br /><br />
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-5">
                                                        <input type="submit" value="Skicka" class="btn btn-block btn-primary" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        -->

                    </div>

            </div>
        </div>

        <?php endwhile; endif; ?>

    </main>

<?php get_footer(); ?>