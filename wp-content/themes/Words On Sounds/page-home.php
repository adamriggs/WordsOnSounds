<?php get_header(); ?>

<?php

    $featured_post = get_field('featured_post');

    $args = array(
        'numberposts'   => '1',
        'category_name' => 'book-reviews'
    );
    $book = get_posts($args);

    $args = array(
        'numberposts'   => '1',
        'category_name' => 'essays'
    );
    $essay = get_posts($args);

    $args = array(
        'numberposts'   => '1',
        'category_name' => 'news'
    );
    $news = get_posts($args);

    $about = get_field('about');
    $about_image = $about['image']['url'];
    $about_title = $about['title'];
    $about_body = $about['body'];

    // echo('<pre>');
    // print_r($book);
    // echo('</pre>');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main home" role="main">

        <section class="home__primary">
            <?php
                global $post;
                $post = $featured_post;
                setup_postdata($post);
                include get_template_directory() . '/inc/featured.php';
                wp_reset_postdata();
            ?>
        </section>

        <section class="home__secondary row">
            <?php
                $category_slug = 'music-reviews';
                include get_template_directory() . '/inc/post-row.php';
            ?>

            <?php
                $category_slug = 'podcasts';
                include get_template_directory() . '/inc/post-row.php';
            ?>

            <div class="row between">

                <div class="col-3">
                    <?php 
                        if($book) { 
                            echo '<h4>Latest Book Review</h4>';
                            global $post;
                            $post = $book[0];
                            setup_postdata($post);
                            include get_template_directory() . '/inc/post-tile.php';
                            wp_reset_postdata();
                        }
                    ?>
                </div>

                <div class="col-3">
                    <?php
                        if($book) { 
                            echo '<h4>Latest Essay</h4>';
                            global $post;
                            $post = $essay[0];
                            setup_postdata($post);
                            include get_template_directory() . '/inc/post-tile.php';
                            wp_reset_postdata();
                        }
                    ?>
                </div>

                <div class="col-3">
                    <?php
                        if($news) {
                            echo '<h4>Latest News</h4>';
                            global $post;
                            $post = $news[0];
                            setup_postdata($post);
                            include get_template_directory() . '/inc/post-tile.php';
                            wp_reset_postdata();
                        }
                    ?>
                </div>

            </div>

        </section>

        <section class="home__tertiary">

            <h4>About</h4>
            <img src="<?php echo $about_image; ?>">
            <h5><?php echo $about_title; ?></h5>
            <p><?php echo $about_body; ?></p>

        </section>

    </main>
</div>

<?php get_footer(); ?>
