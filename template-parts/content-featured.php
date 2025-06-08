<article id="post-<?php the_ID(); ?>" <?php post_class('featured-article'); ?>>
    <a href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) the_post_thumbnail('large'); ?>
        <h2 class="entry-title"><?php the_title(); ?></h2>
    </a>
</article>