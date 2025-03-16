<?php
function matyou_custom_searchresults($wp_customize)
{
    // Section
    $wp_customize->add_section('searchresults', array(
        'title' => __('Search Results', 'matyou'),
        'priority' => 30,
        'description' => __('Options for the search results.', 'matyou'),
    ));

    // Sidebar
    $wp_customize->add_setting('searchresults_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'matyou_sanitize_checkbox',
    ));

    $wp_customize->add_control('searchresults_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'matyou'),
        'section' => 'searchresults',
    ));
}
add_action('customize_register', 'matyou_custom_searchresults');
