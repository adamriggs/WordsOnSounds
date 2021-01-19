<div class="featured">
    <?php the_post_thumbnail('full'); ?>
    <h4><?php
        if(isset($category)) {
            echo $category->cat_name;
        } else {
            $category = get_the_category();
            echo $category[0]->cat_name;
        }
    ?></h4>
    <div class="featured__title row bottom">
        <?php
            $title = get_the_title();
            $title_count = explode(" ", $title);
            $title_count = count($title_count);
            $title_class = 'col-6';
            $author_class = 'col-6';

            if($title_count > 5) {
                $title_class = 'col-8';
                $author_class = 'col-4';
            }
        ?>
        <a class="<?php echo $title_class; ?>" href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
        <span class="<?php echo $author_class; ?>">By <?php the_author(); ?></span>
    </div>
    <div class="featured__excerpt">
        <?php the_excerpt(); ?>
        <p><a href="<?php the_permalink(); ?>">Read more</a></p>
    </div>
</div>