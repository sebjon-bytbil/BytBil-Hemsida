<?php
/*
Template name: Företagssida
*/

get_header();
$company_post = IntranetHandler::get_user_company_post();
$user_role = IntranetHandler::get_current_user_role();

$register_form = false;
if($company_post != null){
    $register_form = true;
}
?>
<main>
    
<?php
if($user_role == 'null' || $user_role == null) {
    ?>
    <section class="section-block padded-block white" style="background: #fff;">
        <div class="container-fluid wrapper">
            <div class="col-xs-12" style="text-align: center;">
                <?php /* If there are no posts to display, such as an empty archive page */ ?>

                    <h1>Min P-plats</h1>
                    <p><strong>Här måste du logga in för att komma åt innehållet</strong><br/> Sidan du försökte nå är ej tillgängligt förrän du loggar in på ditt Företags P-plats. Använd inloggningsformuläret nedan - eller kontakta oss för att anmäla ditt företag.</p>
                    
                    <!-- Site Login Form -->
                    <?php
                    if(!is_user_logged_in()){ ?>
                        <div class="login_form" style="text-align: left;">
                            <?php
                            $slug = IntranetHandler::get_company_page_slug();
                            $redirect_url = site_url($_SERVER['REQUEST_URI']) . $slug;
                            wp_login_form(
                                array(
                                    "redirect" => $redirect_url,
                                    "form_id" => "my-parking-login",
                                    "label_username" => "Användarnamn",
                                    "label_password" => "Lösenord",
                                    "label_remember" => "Kom ihåg?",
                                    "label_log_in" => "Logga in",
                                    "id_submit" => "submit-button"
                                )
                            ); ?>
<!--                        <button type="button" class="register-button">Registrera företag</button>-->
                        </div>
                    <?php }else{
                        $current_user = wp_get_current_user();
                        $current_username = $current_user->user_login; ?>
                        <div>
                            <p>Inloggad som <?php echo $current_username; ?></p>
                            <p><a href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</a></p>
                        </div>
                    <?php } ?>
<!--                    <p>-->
<!--                        <label for="" class="">Användarnamn</label><br>-->
<!--                        <input type="text" name="" class="" placeholder="Ange ditt användarnamn">-->
<!--                        <i class="icon icon-user"></i>-->
<!--                    </p>-->
<!--                    <p>-->
<!--                        <label for="" class="">Lösenord</label><br>-->
<!--                        <input type="text" name="" class="" placeholder="Ange ditt lösenord">-->
<!--                        <i class="icon icon-lock"></i>-->
<!--                    </p>-->
<!--                    <button type="submit" class="submit-button">Logga in</button>-->
            </div>

        </div>

    </section>
    <?php
}
else {
    if($company_post) {
        ?>

        <?php if($user_role == 'foretagsadmin' || 'foretagsanvandare' ||  'administrator'){ 
            
        global $post;
        $post = $company_post;
        setup_postdata($post);
            
        ?>
        <?php bytbil_content_loop_old($scroll, true); ?>

        <?php wp_reset_postdata();
        }

        ?>
        <?php
        if ($register_form) { ?>
            <?php if($user_role == 'foretagsadmin' || $user_role == 'administrator') { ?>
            <section class="section-block dark scroll" style="background: #fff ;" name="register-company-users">
                <div class="container-fluid wrapper default-padding">
                    <div class="col-xs-12 col-sm-5">
                        <h2>Registrera företagsanvändare</h2>
                        <p>Här kan du enkelt registrera en användare till ditt företag. Fyll i e-post och ett lösenord så skapas den upp och er personal kan logga in med de uppgifterna.</p>
                        <form id="add-company-users" action="<?php echo admin_url('admin-post.php') ?>" method="post">
                            <input name="action" value="company_user_create" type="hidden"/>
                            <input name="company" value="<?php echo $company_post->post_title; ?>" type="hidden"/>
                            <p>
                                <label for="user_login">E-postadress</label>
                                <input type="text" name="user_login" placeholder="E-postadress" id="user_email" class="input" required/>
                            </p>
                            <p>
                                <label for="password">Lösenord</label>
                                <input type="password" name="password" placeholder="Lösenord" id="user_email" class="input" required/>
                            </p>
                            <p>
                                <input type="submit" id="register-button" value="Registrera" id="register"/>
                            </p>
                        </form>
                    </div>
                </div>
            </section>
            <?php } ?>
        <?php }
    }   
}

    ?>
    <?php
    $fields = get_fields($company_post->ID);
    ?>
</main>
<script>
    $(function(){
        location.hash = "<?php echo $company_title;?>";
        
        var company_logo = '<div class="company-logo-wrapper"><img src="<?php echo $fields['company_logotype']; ?>" alt="<?php echo $company_post->post_title; ?>" title="<?php echo $company_post->post_title; ?>" class="company-logotype"></div>';
        $('.submenu-title h1').prepend(company_logo);
    });

</script>
<style>
    .company-logo-wrapper {
        display: block;
        width: 100%;
        float: left;
        position: relative;
    }
    .company-logotype {
        max-height: 3.8em;
        display: inline-block;
        padding-bottom: 30px;
    }
    
    .scroll-menu {
        margin-bottom: 150px;
    
    }
    .scroll-menu .submenu-wrapper.affix .company-logo-wrapper {
        width: auto;
        display: inline-block;
        float: none;
    }
    
    .scroll-menu .submenu-wrapper.affix .company-logotype {
        padding-bottom: 0;
        max-height: 2em;
        padding-right: 15px;
    }
    
      
</style>
<?php get_footer();
