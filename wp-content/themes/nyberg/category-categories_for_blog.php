<?php
/*
 */

get_header('undersida'); ?>
	</div><!-- #primary -->
                	<div id="primary" class="content-area">
	    <div id="content" class="nyberg-site-content" role="main">

	        <div class="midcontent">

	            <div class="nyberg-middle-bar">
	                <div class="nyberg-breadcrumbs">
	                	<?php if (function_exists('bcn_display')) {
    bcn_display();
} ?>
	                </div>
	                <?php echo do_shortcode('[nyberg_social_plugs]'); ?>
	            </div>	            
	        </div>
	        <div class="midcontent">
	            <div class="nyberg-subpage-maincontent">
	            	<div class="nyberg-subpage-content">
                        <img class="commentimg" src="<?php bloginfo('template_url'); ?>/images/comments-bubble-archive.gif" />
                        <ul class="listcategories">
			<?php while (have_posts()) : the_post(); ?>
    <li>
        <a href="<?php the_permalink(); ?>">
            <span class="archdate"><?php the_time('F j Y'); ?></span>
            <span class="comments_number"><?php comments_number('0', '1', '%'); ?></span>
            <span class="the_title"><?php the_title(); ?></span>
        </a>
    </li>

<?php endwhile; ?>
                           </ul>
                            <div class="nav-previous alignleft"><?php next_posts_link('Older posts'); ?></div>
                            <div class="nav-next alignright"><?php previous_posts_link('Newer posts'); ?></div>

	            	</div>
	            	<div class="nyberg-subpage-plugs">
	            		 <?php wp_list_categories($args); ?>
	            	</div>
	            </div>
	            <div class="clear"></div>
	        </div>
	    </div>
	    <!-- #content -->
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>