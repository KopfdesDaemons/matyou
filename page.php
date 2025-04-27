<?php get_header(); ?>
<main <?php if (get_theme_mod('pages_sidebar', true)) echo 'class="matyou_has_sidebar"' ?>>
    <h1 class="title"><?php the_title(); ?></h1>
    <section class="matyou_content_spacer">
        <div class="matyou_content" id="matyou_main_content">
            <?php
            while (have_posts()) {
                the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('matyou_user_content_container'); ?>>
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

                    <!-- Comments -->
                    <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                    ?>
                </footer>
            <?php } ?>
        </div>
    </section>
</main>
<?php if (get_theme_mod('pages_sidebar', true)) { ?>
    <aside id="matyou_sidebar"><?php get_sidebar(); ?></aside>
<?php }
get_footer(); ?>