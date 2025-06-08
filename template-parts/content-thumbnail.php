<article id="post-<?php the_ID(); ?>" <?php post_class('thumbnail-article'); ?>>
    <a href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) the_post_thumbnail('thumbnail'); ?>
        <h5 class="entry-title"><?php the_title(); ?></h5>
    </a>
</article>