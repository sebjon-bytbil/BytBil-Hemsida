<?php get_header(); ?>
<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <div class="wrapper">
            <div style="background: #fff; padding: 40px; text-align: center; font-size: 1.1em;">
                <h1>Sidan kunde inte hittas</h1>

                <p>Tyvärr kunde sidan du försökte nå inte hittas, den kan ha flyttats eller tagits bort.</p>

                <p><strong>Sök gärna nedan efter det du letar efter:</strong></p>
                <?php get_search_form(); ?>
                <p>Annars kan du alltid gå tillbaka till <a href="<?php home_url(); ?>">startsidan</a> för uppleva vår
                    Volvosite.</a></p>
            </div>

            <div class="left-column">

                <?php include 'mobile-menu.php'; ?>

            </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>
