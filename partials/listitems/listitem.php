<?php // Remember to style the containing link to "display: block;" -- if you go with this markup ?>

<a class="" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

    <?php the_title( '<h3 class="a-medium a-listitem-title">', '</h3>' ); ?>
    <p class="<?php echo (has_post_thumbnail() ? ' has-thumb' : ''); ?>">

        <?php the_time('Y-m-d');
        if (has_tag()) {
            echo strip_tags(get_the_tag_list(' &#183; ',' &#183; ',''));
        }
        echo '<br/>';
       echo get_the_excerpt(); ?>

    </p>
</a>