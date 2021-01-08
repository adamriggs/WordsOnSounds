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
    <div class="featured__title">
        <h1><?php the_title(); ?></h1>
        <span>By <?php the_author(); ?></span>
    </div>
    <div class="featured__excerpt">
        <?php the_excerpt(); ?>
    </div>
</div>