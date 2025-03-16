<?php
function matyou_header($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_theme_header', array(
        'title' => __('Header', 'matyou'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('fixed_header', array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'matyou_sanitize_checkbox',
    ));

    $wp_customize->add_control('fixed_header', array(
        'type' => 'checkbox',
        'label' => __('Fix Header', 'matyou'),
        'section' => 'custom_theme_header',
    ));

    // Searchbar
    $wp_customize->add_setting('searchbar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'matyou_sanitize_checkbox',
    ));

    $wp_customize->add_control('searchbar', array(
        'type' => 'checkbox',
        'label' => __('Show search bar', 'matyou'),
        'section' => 'custom_theme_header',
    ));

    // Title size setting
    $wp_customize->add_setting('header_headline_font_size', array(
        'default' => '25',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('header_headline_font_size', array(
        'type' => 'range',
        'label' => __('Menu font size', 'matyou'),
        'section' => 'custom_theme_header',
        'input_attrs' => array(
            'min' => 10,
            'max' => 50,
            'step' => 1,
        )
    ));
}
add_action('customize_register', 'matyou_header');
