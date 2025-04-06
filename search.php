<?php get_header(); ?>
<?php include_once get_template_directory() . '/template-parts/sidemenu.php'; ?>
<main role="main" <?php if (get_theme_mod('searchresults_sidebar', true)) echo 'class="matyou_has_sidebar"' ?>>
    <section class="matyou_content_spacer" id="matyou_main_content">
        <?php
        $matyou_search_query = get_search_query();
        $matyou_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $matyou_posts_per_page = get_option('posts_per_page');
        $matyou_args = array(
            'post_type' => 'post',
            'posts_per_page' => $matyou_posts_per_page,
            'paged' => $matyou_paged,
            's' => $matyou_search_query,
        );

        $matyou_query = new WP_Query($matyou_args);

        if ($matyou_query->have_posts()) {
            echo '<h1 class="matyou_search_headline">' . sprintf(esc_html__('Search results for "%s"', 'blog-layouts'), esc_html($matyou_search_query)) . '</h1>';
            while ($matyou_query->have_posts()) {
                $matyou_query->the_post();
                // Show Posts
                require_once get_template_directory() . '/template-parts/post-card.php';
                echo matyou_display_post_card();
            }
            wp_reset_postdata();
        } else {
            echo '<span class="matyou_no_post_found">' . esc_html__('No posts found.', 'matyou') . '</span>';
        }
        ?>
    </section>
</main>
<?php if (get_theme_mod('searchresults_sidebar', true)) { ?>
    <aside id="matyou_sidebar"><?php get_sidebar(); ?></aside>
<?php } ?>
<?php get_footer(); ?>