<?php
function matyou_display_post_card()
{
    ob_start(); // Start output buffering

    $matyou_author_id = get_the_author_meta('ID');
    $matyou_author_name = esc_html(get_the_author_meta('display_name'));
    $matyou_author_avatar = get_avatar($matyou_author_id, 32);
    $matyou_post_categorys = get_the_category();

    // Get the current date and time
    $matyou_current_time = current_time('timestamp');

    // Get the post date
    $matyou_post_time = get_the_time('U');

    // Calculate the difference between the current time and the post time
    $matyou_time_difference = human_time_diff($matyou_post_time, $matyou_current_time);
?>
    <div class="matyou_post_card <?php if (is_sticky()) echo 'matyou_sticky_post' ?>">
        <?php if (has_post_thumbnail() && get_theme_mod('feed_post_card_image', true)) { ?>
            <a class="matyou_post_card_image_container" href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </a>
        <?php } ?>
        <div class="matyou_post_card_content_div">
            <?php if ($matyou_post_categorys) {
                echo '<div class="matyou_post_card_category_row">';
            }
            foreach ($matyou_post_categorys as $category) {
                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="matyou_post_card_category">' . esc_html($category->name) . '</a>';
            }
            echo '</div>';
            ?>
            <a href="<?php the_permalink(); ?>">
                <h2><?php the_title(); ?></h2>
            </a>
            <a href="<?php echo esc_url(get_author_posts_url($matyou_author_id)); ?>"><?php echo $matyou_author_name; ?></a>
            <span class="matyou_post_card_date"><?php printf(__('%s ago', 'matyou'), $matyou_time_difference); ?></span>
            <a href="<?php the_permalink(); ?>">
                <?php the_excerpt(); ?>
            </a>
        </div>
    </div>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}
