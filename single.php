<?php
    get_header();
    include_once get_template_directory() . '/template-parts/sidemenu.php';
    while (have_posts()) :
        the_post();
?>
<main <?php if (get_theme_mod('post_sidebar', true)) echo 'class="matyou_has_sidebar"' ?>>
    <section class="matyou_hero">
        <header>
            <?php if (get_theme_mod('post_image', true) & has_post_thumbnail()) : ?>
                <div class="matyou_post_thumbnail">
                    <div>
                        <?php the_post_thumbnail(); ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php
            $matyou_author_id = get_the_author_meta('ID');
            $matyou_author_name = esc_html(get_the_author_meta('display_name'));
            $matyou_author_avatar = get_avatar($matyou_author_id, 40);
            
            // Get the current date and time
            $matyou_current_time = current_time('timestamp');
            
            // Get the post date
            $matyou_post_time = get_the_time('U');
            
            // Calculate the difference between the current time and the post time
            $matyou_time_difference = human_time_diff($matyou_post_time, $matyou_current_time);
            
            $matyou_date_format = sprintf(__('%s ago', 'matyou'), $matyou_time_difference);
            if (get_theme_mod('posts_date_format', 'date') === 'date') $matyou_date_format = get_the_date();
            ?>
                
            <?php if (get_theme_mod('post_categories', true)) { ?>
                <div class="matyou_metadata_box">
                <?php if (get_theme_mod('post_date', true)) { ?>
                    <span class="matyou_date"><?php echo esc_html($matyou_date_format); ?></span>
                <?php } ?>
                <div class="matyou_categorie_list">
                    <?php
                    $matyou_categories = get_the_category();
                    if (!empty($matyou_categories)) {
                        echo '<ul>';
                        foreach ($matyou_categories as $category) {
                            echo '<li class="' . 'matyou_chips_layout_' . str_replace("-", "_", get_theme_mod('posts_categories_layout', 'color-blocks')) . '"><a href="' . esc_url(get_category_link($category->term_id)) . '">' . $category->name . '</a></li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
            </div>
            <?php } ?>

            <h1 class="title"><?php the_title(); ?></h1>
            
        </header>
    </section>
    <section class="matyou_content_spacer" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <article class="matyou_user_content_container" id="matyou_main_content">
            <?php the_content(); ?>
        </article>

        <footer class="matyou_post_footer">
            <!-- Pagination-->
            <?php
            wp_link_pages(
                array(
                    'before'         => '<div class="matyou_pagination"><span class="page-links-title">' . esc_html__('Pages:', 'matyou') . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                )
            );
            ?>

            <!-- Tags -->
            <?php
            $matyou_tags_options = get_theme_mod('tags', true);
            $matyou_tags = get_the_tags();
            if ($matyou_tags_options & !empty($matyou_tags)) {
                echo '<div class="matyou_post_tags"><ul>';
                foreach ($matyou_tags as $tag) {
                    echo '<li class="' . 'matyou_chips_layout_' . str_replace("-", "_", esc_attr(get_theme_mod('posts_tags_layout', 'portal'))) . '"><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . $tag->name . '</a></li>';
                }
                echo '</ul></div>';
            }

            // Author
            $matyou_author_info = get_theme_mod('author_details', true);
            if ($matyou_author_info) {
                $matyou_author_id = get_the_author_meta('ID');
                $matyou_author_name = esc_html(get_the_author_meta('display_name'));
                $matyou_author_description = esc_html(get_the_author_meta('description'));
                $matyou_author_website = esc_url(get_the_author_meta('user_url'));
                $matyou_author_avatar = get_avatar($matyou_author_id, 500);
            ?>
                <div class="matyou_authorbox">
                    <div class="matyou_author_avatar">
                        <a href="<?php echo esc_url(get_author_posts_url($matyou_author_id)); ?>">
                            <?php echo $matyou_author_avatar; ?>
                        </a>
                    </div>
                    <div class="matyou_author_details">
                        <div class="matyou_author_name_row">
                            <h3>
                                <a
                                    href="<?php echo esc_url(get_author_posts_url($matyou_author_id)); ?>"><?php echo $matyou_author_name; ?></a>
                            </h3>
                            <?php if ($matyou_author_website) : ?>
                                <a href="<?php echo $matyou_author_website; ?>" target="_blank">
                                    <i class="fa-solid fa-globe"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        <p><?php echo $matyou_author_description; ?></p>
                    </div>
                </div>
            <?php } ?>

            <?php
            $post_pagination = get_theme_mod('post_pagination', true);
            if ($post_pagination) { ?>
                <div class="matyou_post_pagination">
                    <div class="matyou_post_pagination_prev">
                        <?php previous_post_link('%link', __('&laquo; Previous Post', 'matyou')); ?> </div>
                    <div class="matyou_post_pagination_next">
                        <?php next_post_link('%link', __('Next Post &raquo;', 'matyou')); ?> </div>
                </div>
            <?php } ?>

            <!-- Comments -->
        <?php
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
    endwhile;
        ?>
        </footer>
        </div>
    </section>
</main>
<?php if (get_theme_mod('post_sidebar', true)) { ?>
    <aside id="matyou_sidebar"><?php get_sidebar(); ?></aside>
<?php }
get_footer(); ?>