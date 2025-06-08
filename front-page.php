<?php get_header(); ?>

<div class="promo-banner">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/promo.jpg" alt="Promotion">
</div>

<div class="home-wrapper">
    <div class="home-column home-left">
        <section class="home-sport">
            <h2>Sport</h2>
            <?php
            $sport_query = new WP_Query(array(
                'category_name'  => 'sport',
                'posts_per_page' => 3
            ));
            if ($sport_query->have_posts()):
                while ($sport_query->have_posts()): $sport_query->the_post();
                    get_template_part('template-parts/content', 'small');
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </section>

        <section class="home-webtv">
            <h2>Web TV</h2>
            <?php
            $webtv_query = new WP_Query(array(
                'category_name'  => 'web-tv',
                'posts_per_page' => 3
            ));
            if ($webtv_query->have_posts()):
                while ($webtv_query->have_posts()): $webtv_query->the_post();
                    get_template_part('template-parts/content', 'video');
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </section>

        <section class="home-thumbs">
            <h2>Autres articles</h2>
            <?php
            $thumb_query = new WP_Query(array(
                'posts_per_page' => 4,
                'offset'         => 5
            ));
            if ($thumb_query->have_posts()):
                while ($thumb_query->have_posts()): $thumb_query->the_post();
                    get_template_part('template-parts/content', 'thumbnail');
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </section>
    </div>

    <div class="home-column home-center">
        <section class="home-featured">
            <?php
            $featured_query = new WP_Query(array(
                'category_name'  => 'a-la-une',
                'posts_per_page' => 2
            ));
            if ($featured_query->have_posts()):
                while ($featured_query->have_posts()): $featured_query->the_post();
                    get_template_part('template-parts/content', 'featured');
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </section>

        <section class="home-grid">
            <?php
            $grid_query = new WP_Query(array(
                'category_name'  => 'culture',
                'posts_per_page' => 6
            ));
            echo '<div class="grid-wrapper">';
            if ($grid_query->have_posts()):
                while ($grid_query->have_posts()): $grid_query->the_post();
                    get_template_part('template-parts/content', 'grid');
                endwhile;
                wp_reset_postdata();
            endif;
            echo '</div>';
            ?>
        </section>
    </div>

    <div class="home-column home-right">
        <section class="home-people">
            <h2>People</h2>
            <?php
            $people_query = new WP_Query(array(
                'category_name'  => 'people',
                'posts_per_page' => 4
            ));
            if ($people_query->have_posts()): echo '<ul class="people-list">';
                while ($people_query->have_posts()): $people_query->the_post();
                    echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                endwhile;
                echo '</ul>';
                wp_reset_postdata();
            endif;
            ?>
        </section>

        <section class="home-recent-posts">
            <h2>Articles récents</h2>
            <ul>
            <?php
            $recent_query = new WP_Query(array(
                'posts_per_page' => 5
            ));
            if ($recent_query->have_posts()):
                while ($recent_query->have_posts()): $recent_query->the_post();
                    echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
            </ul>
        </section>

        <section class="home-recent-comments">
            <h2>Commentaires récents</h2>
            <ul>
            <?php
            $recent_comments = get_comments(array('number' => 5, 'status' => 'approve'));
            foreach($recent_comments as $comment){
                echo '<li><a href="'.get_comment_link($comment->comment_ID).'">'.get_comment_author($comment->comment_ID).'</a></li>';
            }
            ?>
            </ul>
        </section>

        <section class="home-ad">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ad-placeholder.jpg" alt="Publicité">
        </section>
    </div>
</div>

<?php get_footer(); ?>

