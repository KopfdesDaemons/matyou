<?php get_header(); ?>
<?php include_once get_template_directory() . '/template-parts/sidemenu.php'; ?>
<main role="main" <?php if (get_theme_mod('feed_sidebar', true)) echo 'class="matyou_has_sidebar"' ?>>
    <section class="matyou_content_spacer matyou_feed" id="matyou_main_content">
        <?php
        $matyou_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $matyou_posts_per_page = get_option('posts_per_page');
        $matyou_args = array(
            'post_type' => 'post',
            'posts_per_page' => $matyou_posts_per_page,
            'paged' => $matyou_paged
        );

        $matyou_query = new WP_Query($matyou_args);

        if ($matyou_query->have_posts()) {
            while ($matyou_query->have_posts()) {
                $matyou_query->the_post();
                // Show Posts
                require_once get_template_directory() . '/template-parts/post-card.php';
                echo matyou_display_post_card();
            }
            wp_reset_postdata();
        } else {
            echo esc_html__('No posts found.', 'matyou');
        }
        ?>
    </section>
</main>
<aside id="matyou_sidebar"><?php get_sidebar(); ?></aside>
<?php get_footer(); ?>