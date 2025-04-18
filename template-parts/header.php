<?php
$fixed_header = (get_theme_mod('fixed_header', true)) ? 'matyou_fixed_header' : '';
?>

<header class="matyou_header <?php echo esc_attr($fixed_header) ?>">
    <a href="#matyou_main_content"
        class="matyou_skip_link"><?php echo esc_html__('Skip to main content', 'matyou') ?></a>

    <div class="matyou_material_header_content">

        <div class="matyou_header_title_div">
            <a href="<?php echo esc_url(home_url('/')); ?>"
                class="matyou_material_header_title"><?php echo get_bloginfo('name'); ?></a>
            <span class="matyou_material_header_description"><?php echo get_bloginfo('description'); ?></span>
        </div>


        <button id="matyou_sidemenu_toggle">
            <i class="fa-solid fa-bars"></i>
        </button>

        <?php
        if (has_nav_menu('header-menu')) {
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'menu_class' => 'matyou_header_menu',
                'container' => false,
                'walker' => new matyou_menu_walker(),
            ));
        } else {
            echo '<div class="matyou_header_menu">' . esc_html__('Select a menu in the customizer', 'matyou') . '</div>';
        }
        ?>

        <?php if (get_theme_mod('searchbar', true)) { ?>
            <div class="matyou_material_header_search_div">
                <button id="matyou_header_search_icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <div id="matyou_expandable_search_field">
                    <?php get_search_form(array('button_text' => 's')); ?>
                </div>
            </div>
        <?php } ?>
    </div>
</header>