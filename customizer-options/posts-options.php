<?php
function matyou_custom_posts($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_theme_article', array(
        'title' => __('Posts', 'matyou'),
        'priority' => 30,
        'description' => __('Settings of the individual posts.', 'matyou')
    ));

    // Post Image
    $wp_customize->add_setting('post_image', array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'matyou_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_image', array(
        'type' => 'checkbox',
        'label' => __('Show post image', 'matyou'),
        'section' => 'custom_theme_article',
    ));

    // Author details
    $wp_customize->add_setting('post_author', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'matyou_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_author', array(
        'type' => 'checkbox',
        'label' => __('Show author', 'matyou'),
        'section' => 'custom_theme_article',
    ));

    // Maximum width of the post
    $wp_customize->add_setting('maximum_width_of_posts', array(
        'default' => '90',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('maximum_width_of_posts', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __('Maximum width of posts', 'matyou'),
        'section' => 'custom_theme_article',
        'input_attrs' => array(
            'min' => 50,
            'max' => 150,
            'step' => 1,
        ),
    ));

    // Background color
    $wp_customize->add_setting('background_color_posts', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Posts_background_color', array(
        'label' => __('Posts background color', 'matyou'),
        'section' => 'custom_theme_article',
        'settings' => 'background_color_posts'
    )));

    // Sidebar
    $wp_customize->add_setting('post_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'matyou_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'matyou'),
        'section' => 'custom_theme_article',
    ));

    // Date
    $wp_customize->add_setting('post_date', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'matyou_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_date', array(
        'type' => 'checkbox',
        'label' => __('Show date', 'matyou'),
        'section' => 'custom_theme_article',
    ));


    function post_date_active_callback($control)
    {
        return $control->manager->get_setting('post_date')->value();
    }

    // Date format
    $wp_customize->add_setting('posts_date_format', array(
        'default' => 'date',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('posts_date_format', array(
        'type' => 'select',
        'section' => 'custom_theme_article',
        'label' => __('Date format', 'matyou'),
        'choices' => [
            'span' => __('span', 'matyou'),
            'date' => __('date', 'matyou')
        ],
        'active_callback' => 'post_date_active_callback',
    ));

    // Categories
    $wp_customize->add_setting('post_categories', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'matyou_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_categories', array(
        'type' => 'checkbox',
        'label' => __('Show categories', 'matyou'),
        'section' => 'custom_theme_article',
    ));

    // Tags
    $wp_customize->add_setting('tags', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'matyou_sanitize_checkbox',
    ));

    $wp_customize->add_control('tags', array(
        'type' => 'checkbox',
        'label' => __('Show tags', 'matyou'),
        'section' => 'custom_theme_article',
    ));

    // Author details
    $wp_customize->add_setting('author_details', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'matyou_sanitize_checkbox',
    ));

    $wp_customize->add_control('author_details', array(
        'type' => 'checkbox',
        'label' => __('Show author box', 'matyou'),
        'section' => 'custom_theme_article',
    ));

    // Pagination
    $wp_customize->add_setting('post_pagination', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'matyou_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_pagination', array(
        'type' => 'checkbox',
        'label' => __('Show post pagination', 'matyou'),
        'section' => 'custom_theme_article',
    ));
}
add_action('customize_register', 'matyou_custom_posts');
