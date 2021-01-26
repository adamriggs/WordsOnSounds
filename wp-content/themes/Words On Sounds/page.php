<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section>
            <?php 
                if ( has_post_thumbnail() ) {
            ?>
                    <div class="featured__image background-image" style="background-image: url(<?php echo the_post_thumbnail_url('full'); ?>)"></div>
            <?php
                } 
            ?>
        </section>
        <section>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </section>
    </main>
</div>

<?php get_footer(); ?>
