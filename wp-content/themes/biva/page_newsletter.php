<?php

/*
Template Name: Nyhetsbrev
*/

get_header();
$dir = get_template_directory_uri();
$topImage = get_post_meta($post->ID, 'top-image', true);
?>

<?php bytbil_init_slideshows(); ?>

<div id="backdrop" <?php if (!empty($topImage)) {
    echo 'style="background-image: url(' ?><?php the_field('top-image'); ?><?php echo ')"';
} ?>>
    <h1><?php the_title(); ?></h1>
</div>

<div id="content">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-xs-12">
                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            </div>
            <div class="hidden-xs col-sm-3 col-first">

                <?php
                $args = array(
                    'theme_location' => 'primary',
                    'start_in' => $ID_of_page,
                    'container-class' => 'main-nav',
                    'menu_class' => 'nav submenu',
                );
                wp_nav_menu($args);
                ?>

            </div>
            <div class="col-xs-12 col-sm-9 blocks">

                <?php while (have_posts()) : the_post(); ?>

                    <?php if (!get_field('setting-hide-page-header')): ?>
                        <h1><?php the_title(); ?></h1>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-xs-12">
                            <?php the_content(); ?>

                            <br>

                            <script language="JavaScript">
                                <!--
                                function MailingListValidation(SubscriberForm){
                                    var counter = 0;
                                    for (i=1; i<=SubscriberForm.pf_CounterMailinglists.value; i++)
                                    {
                                        var checkBoxName = "pf_MailinglistName" + i;
                                        if (document.getElementsByName(checkBoxName)[0].checked || document.getElementsByName(checkBoxName)[0].type == "hidden") counter++;
                                    }
                                    if (counter == 0)
                                    {
                                        alert("En eller flera e-postlistor krävs för detta formulär.");
                                        return false; }
                                }//-->
                            </script>
                            <form name="SubscriberForm" class="contact-form" action="http://www.anpdm.com/public/process-subscription-form.aspx?formId=41415D4479424650477240" onSubmit="return MailingListValidation(this);" method="post">

                                <div class="row" style="padding-left: 10px !important; padding-right: 10px !important;">
                                    <div class="col-xs-12 col-sm-6">
                                        Förnamn:<br/><input type="text" name="pf_Demographicfield5" value="" style="width: 100%;" /><br>

                                        Efternamn:<br/><input type="text" name="pf_Demographicfield6" value="" style="width: 100%;" /><br>
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        Välj din anläggning:<br/><!--<input type="text" name="pf_Demographicfield2" value="" style="width: 100%;" /><br>-->
                                        <select name="pf_Demographicfield2" style="width: 100%;">
                                            <option value="" disabled="disabled" selected>Välj från listan</option>
                                            <option value="Borlänge">Borlänge</option>
                                            <option value="Falun">Falun</option>
                                            <option value="Karlskoga">Karlskoga</option>
                                            <option value="Linköping">Linköping</option>
                                            <option value="Norrköping">Norrköping</option>
                                            <option value="Uppsala">Uppsala</option>
                                            <option value="Örebro">Örebro</option>
                                        </select>

                                        E-postadress:<br/><input type="text" name="pf_Email" value="" style="width: 100%;" /><br>
                                    </div>

                                    <div class="col-xs-12 col-sm-6">

                                        <select name="pf_DeliveryFormat" style = "display:none;" ><option value="HTML" selected >HTML</option><option value="Text"  >Text</option></select></td></tr><tr><td>
                                        <input type="submit" name="Submit" value="Prenumerera" class="btn action" />

                                        <!-- Ändra inte namn eller typ på Skicka-knappen. För att ändra den synliga texten, ändra istället texten för \ &quot;värde \&quot; -->
                                        <input type="hidden" name="pf_FormType" value="OptInForm">
                                        <input type="hidden" name="pf_OptInMethod" value="SingleOptInMethod">
                                        <input type="hidden" name="pf_CounterDemogrFields" value="3">
                                        <input type="hidden" name="pf_CounterMailinglists" value="1">
                                        <input type="hidden" name="pf_AccountId" value="17122">
                                        <input type="hidden" name="pf_ListById" value="1">
                                        <input type="hidden" name="pf_Version" value="2">
                                        <input type="hidden" name="pf_MailinglistName1" value="1134976">

                                    </div>
                                </div>

                            </form><br>

                            <?php if (have_rows('content-button')): ?>
                                <div class="linkbuttons">
                                    <?php while (have_rows('content-button')): the_row(); ?>
                                        <a class="button" href="<?php the_sub_field('content-button-url'); ?>"
                                           target="<?php the_sub_field('content-button-target'); ?>"><?php the_sub_field('content-button-text'); ?>
                                            <i class="fa fa-angle-right"></i></a>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div>
        </div>
    </div>
</div>
</div>

<?php require_once('bottom-plugs.php'); ?>

<?php require_once('brands.php'); ?>

<?php get_footer(); ?>
