<article id="post-<?php the_ID(); ?>" <?php post_class('grid-article'); ?>>
    <a href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) the_post_thumbnail('medium'); ?>
        <h3 class="entry-title"><?php the_title(); ?></h3>
    </a>
</article>