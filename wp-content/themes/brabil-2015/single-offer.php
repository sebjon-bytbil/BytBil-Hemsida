<?php
get_header();
$id = get_the_ID();
?>

<body class="body-offcanvas">

    <?php include('templateparts/menu.php'); ?>

    <main>
        <section class="grey-bg">
            <div class="container-fluid wrapper align-center">
            <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
            <!-- Post -->
            <?php endwhile; ?>
            <?php else : ?>
            <!-- No posts found -->
            <?php endif; ?>
            </div>
        </section>
    </main>
