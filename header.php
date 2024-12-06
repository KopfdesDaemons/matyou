<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php if (is_singular() && pings_open()) { ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php }

    wp_head(); ?>

    <?php require_once get_template_directory() . '/customizer-options/css-variables.php'; ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- <header id="matyou_header">
        <a href="#matyou_main_content"
            class="matyou_skip_link"><?php echo esc_html__('Skip to main content', 'matyou') ?></a>
        <div id="matyou_sidemenu_toggle" tabindex="1">
            <i class="fa-solid fa-bars"></i>
        </div>
        <?php
        $favicon_url = get_site_icon_url();
        $home_url = esc_url(home_url('/'));

        if (!empty($favicon_url)) {
            echo '<a class="matyou_header_logo" href="' . $home_url . '"><img src="' . esc_url($favicon_url) . '" alt="Favicon" /></a>';
        }

        ?>
        <a class="matyou_name" href="<?php echo $home_url ?>"><?php echo get_bloginfo('name'); ?></a>
        <?php get_search_form() ?>
    </header> -->