<?php
get_header();
include_once get_template_directory() . '/template-parts/sidemenu.php';
?>

<!-- author header -->
<?php if (is_author() && get_theme_mod('author_header', true)) {
    $matyou_author_id = get_the_author_meta('ID');
    $matyou_author_name = esc_html(get_the_author_meta('display_name'));
    $matyou_author_description = esc_html(get_the_author_meta('description'));
    $matyou_author_website = esc_url(get_the_author_meta('user_url'));
    $matyou_author_posts_count = count_user_posts($matyou_author_id);
    $matyou_author_roles = get_the_author_meta('roles');
    $matyou_user_registered = get_the_author_meta('matyou_user_registered');
    $matyou_timestamp = strtotime($matyou_user_registered);
    $matyou_formatted_date = date_i18n(get_option('date_format'), $matyou_timestamp);
    $matyou_author_avatar = get_avatar($matyou_author_id, 160);
?>
    <section class="matyou_post_author_headline_section">
        <header>
            <?php echo $matyou_author_avatar ?>
            <div class="matyou_author_data">
                <h1>
                    <?php
                    the_post();
                    echo get_the_author(); // Author name
                    rewind_posts();
                    ?>
                </h1>
                <span class="matyou_author_name"><?php echo get_the_author() ?></span>
                <span
                    class="matyou_author_number_of_posts"><?php echo $matyou_author_posts_count . ' ' . esc_html__('Posts', 'matyou') ?></span>
                <p><?php echo $matyou_author_description; ?></p>
                <a class="matyou_author_website" href="<?php echo $matyou_author_website; ?>" target="_blank">
                    <?php echo $matyou_author_website ?></a>
    </section>
<?php } ?>

<main role="main">
    <section class="matyou_content_spacer matyou_content_spacer_feed matyou_content_and_sidebar_grid"
        id="matyou_main_content">
        <?php
        global $wp_query;
        $matyou_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        if ($wp_query->have_posts()) {
            while ($wp_query->have_posts()) {
                $wp_query->the_post();
                require_once get_template_directory() . '/template-parts/post-card.php';
                echo matyou_display_post_card();
            }
            wp_reset_postdata();
        } else {
            echo esc_html__('No posts found.', 'matyou');
        }

        // Pagination only if needed
        if ($wp_query->max_num_pages > 1) {
            echo '<div class="matyou_pagination">';
            echo '<div class="matyou_pagination_content">';

            echo '<div class="matyou_pagination_controls">';
            previous_posts_link('«');
            echo '</div>';

            echo '<div class="matyou_pagination_pages">';
            echo paginate_links(array(
                'total' => $wp_query->max_num_pages,
                'current' => $matyou_paged,
                'prev_next' => false,
            ));
            echo '</div>';

            echo '<div class="matyou_pagination_controls">';
            next_posts_link('»', $wp_query->max_num_pages);
            echo '</div>';

            echo '</div>';
            echo '</div>';
        }

        wp_reset_postdata();
        ?>
    </section>
</main>
<?php get_footer(); ?>