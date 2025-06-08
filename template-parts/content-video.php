<article id="post-<?php the_ID(); ?>" <?php post_class('video-article'); ?>>
    <a href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) the_post_thumbnail('medium'); ?>
        <h4 class="entry-title"><?php the_title(); ?></h4>
    </a>
</article>