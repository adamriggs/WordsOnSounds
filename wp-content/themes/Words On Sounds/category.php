<?php
/*
Template Name: Category
*/
get_header(); ?>

<?php
    $category = get_category(get_query_var('cat'), false);

    $args = array(
        'numberposts'   => '1',
        'category_name' => $category->slug
    );
    $featured_post = get_posts($args);

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    // echo('<pre>');
    // print_r($paged);
    // echo('</pre>');
?>

<div id="container">
    <div id="content" role="main">
        <section class="category__primary">
            <?php
                global $post;
                $post = $featured_post[0];
                setup_postdata($post);
                include get_template_directory() . '/inc/featured.php';
                wp_reset_postdata();
            ?>
        </section>

        <section class="category__secondary">

            <?php 
                $args = array(
                    'category_name'     => $category->slug,
                    'paged'             => $paged,
                    'posts_per_page'    => '3',
                    'post_status'       => 'publish'
                );
                $catquery = new WP_Query($args);

                $tmp_query = $wp_query;
                $wp_query = null;
                $wp_query = $catquery;
            ?>

            <div class="row between">
                <?php
                    while($catquery->have_posts()) : $catquery->the_post();
                        echo('<div class="col-3">');
                        include get_template_directory() . '/inc/post-tile.php';
                        echo('</div>');
                    endwhile;
                ?>
            </div>

            <div class="col-12">
                <?php 

                    // global $wp_query;
                    // $big = 999999999; // need an unlikely integer
                    // echo '<div class="paginate-links">';
                    // echo paginate_links( array(
                    // 'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    // 'format' => '?paged=%#%',
                    // 'prev_text' => __('<<'),
                    // 'next_text' => __('>>'),
                    // 'current' => max( 1, get_query_var('paged') ),
                    // 'total' => $wp_query->max_num_pages
                    // ) );
                    // echo '</div>';
                    // posts_nav_link();
                    // posts_nav_link('&#8734;','Next','Prev');
                ?>
                    <section class="posts__nav row">
                        <div class="col-6"><?php next_posts_link( '&laquo; Older Posts', $catquery->max_num_pages ); ?></div>
                        <div class="col-6 end"><?php previous_posts_link( 'Newer Posts &raquo;' ); ?></div>
                    </section>
                <?php
                    $wp_query = null;
                    $wp_query = $tmp_query;
                    wp_reset_postdata();
                ?>
            </div>

        </section>

    </div>
</div>

<?php get_footer(); ?>