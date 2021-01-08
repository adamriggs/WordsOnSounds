<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main post" role="main">
        <h3><?php the_title(); ?></h3>
        <div class="post__container">
            <div>
        		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_post_thumbnail(); ?>
        			<?php the_content(); ?>
        		<?php endwhile; endif; ?>
            </div>
        </div>
        <?php previous_post_link(); ?>    <?php next_post_link(); ?>
	</main>
</div>

<?php get_footer(); ?>
