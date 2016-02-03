<?php
/*
Template Name: Företagssida
*/
get_header();
$company_post = IntranetHandler::get_user_company_post();
$register_form = false;
if($company_post != null){
    $register_form = true;
}
$cid = $company_post->ID;
$title = get_field("company_start_title", $cid);
?>
    <main>
        <section class="section-block padded-block white">
            <div class="container-fluid wrapper">
                <?php echo $title; ?>
            </div>
        </section>
    </main>

<?php
$user_role = IntranetHandler::get_current_user_role();
if($register_form && $user_role == "foretagsadmin"){ ?>
    <form action="<?php echo admin_url('admin-post.php') ?>" method="post">
        <input name="action" value="company_user_create" type="hidden"/>
        <input name="company" value="<?php echo $company_post->post_title;?>" type="hidden"/>
        <input type="text" name="user_login" placeholder="E-postadress" id="user_email" class="input" />
        <input type="password" name="password" placeholder="Lösenord" id="user_email" class="input"  />
        <input type="submit" value="Register" id="register" />
    </form>
<?php }
get_footer();