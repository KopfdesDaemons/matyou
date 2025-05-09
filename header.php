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
    <a href="#matyou_main_content"
        class="matyou_skip_link"><?php echo esc_html__('Skip to main content', 'matyou') ?></a>
    <?php
        include_once get_template_directory() . '/template-parts/sidemenu.php';
        require_once get_template_directory() . '/template-parts/header.php';
    ?>