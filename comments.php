<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="matyou_comments_layout_portal">
    <h2>
        <?php
        $matyou_comments_number = get_comments_number();
        if ($matyou_comments_number === 1) {
            printf(__('One Comment', 'matyou'));
        } else {
            printf(__('%d Comments', 'matyou'), $matyou_comments_number);
        }
        ?>
    </h2>

    <?php if (have_comments()) : ?>


        <ul
            class="matyou_comment_list <?php if (!get_theme_mod('comments_image', true)) echo 'matyou_comments_without_image'; ?>">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => get_theme_mod('image_size_comments', 40),
            ));
            ?>
        </ul>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav role="navigation">
                <div class="nav-previous"><?php previous_comments_link(__('Older Comments', 'matyou')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments', 'matyou')); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply_before' => '<h2 class="matyou_comment_reply_title">',
        'title_reply_after'  => '</h2>',
    ));
    ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p><?php _e('Comments are closed.', 'matyou'); ?></p>
    <?php endif; ?>


</div>