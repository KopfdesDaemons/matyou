<?php
function matyou_styles()
{
    $theme_directory = get_stylesheet_directory_uri();

    $styles = array(
        'matyou-styles' => '/style.css',
        'matyou-fontawesome' => '/fonts/fontawesome/css/all.min.css',
    );

    foreach ($styles as $handle => $file) {
        wp_enqueue_style($handle, $theme_directory . $file, array(), '1', 'all');
    }
}
add_action('wp_enqueue_scripts', 'matyou_styles');

// Theme Support
add_theme_support('post-thumbnails');
add_theme_support("title-tag");
add_theme_support('automatic-feed-links');
add_theme_support('html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption',
));
add_theme_support('align-wide');
add_theme_support('responsive-embeds');

function matyou_enqueue_scripts()
{
    // Load the wordpress comment script from the “\wordpress\wp-includes\js” directory.
    // This allows the comment response form to be located below the corresponding comment
    // and not at the very bottom of the page.
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('matyou_sidemenu_script', get_template_directory_uri() . '/js/matyou_sidemenu.js', null, '1.0', true);
    wp_enqueue_script('matyou_header_script', get_template_directory_uri() . '/js/matyou_header_script.js', null, '1.0', true);
}
add_action('wp_enqueue_scripts', 'matyou_enqueue_scripts');

// Number of words previewed in the feed
function matyou_custom_excerpt_length($length)
{
    return get_theme_mod('words_in_snippet', 30);
}
add_filter('excerpt_length', 'matyou_custom_excerpt_length', 999);

// Characters after snippet
function matyou_custom_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'matyou_custom_excerpt_more');

function matyou_register_menus()
{
    register_nav_menus(
        array(
            'sidemenu' => __('Sidemenu', 'matyou'),
            'header-menu' => __('Headermenu', 'matyou'),
            'legal links' => __('Legal links', 'matyou')
        )
    );
}
add_action('init', 'matyou_register_menus');

function matyou_register_sidebars()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'matyou'),
        'id' => 'my-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'matyou_register_sidebars');

// Custom menu structure
class matyou_menu_walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        if (empty($item->title)) return;

        $output .= "<li class='" .  implode(" ", (array)$item->classes) . "'>";
        $output .= "<div class='matyou_menuitem_container'>";
        $output .= '<a href="' . esc_url($item->url) . '">';
        $output .= $item->title;
        $output .= '</a>';

        if ($args->walker->has_children) {
            $output .= '<i tabindex="0" class="matyou_submenu_toggle fa-solid fa-sort-down"></i>';
        }
        $output .= "</div>";
    }
}

// customizer settings
$matyou_customizer_options = [
    'global-options.php',
    'posts-options.php',
    'pages-options.php',
    'header-options.php'
];

foreach ($matyou_customizer_options as $option) {
    require_once get_template_directory() . '/customizer-options/' . $option;
}

// Sanitize function to check checkbox value (true/false)
function matyou_sanitize_checkbox($input)
{
    return (isset($input) && true === $input) ? true : false;
}
