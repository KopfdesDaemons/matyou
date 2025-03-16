<div id="matyou_sidemenu_closing_div"></div>
<aside id="matyou_sidemenu">
    <div class="matyou_sidebar_content">
        <nav>
            <ul class="matyou_sidebar_mainmenu">
                <li>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <i class="fa-solid fa-house"></i>
                        <span> <?php echo esc_html__('Startpage', 'matyou') ?></span>
                    </a>
                </li>
            </ul>
        </nav>
        <nav>
            <?php
            if (has_nav_menu('sidemenu')) {
                wp_nav_menu(array(
                    'theme_location' => 'sidemenu',
                    'menu_class' => 'matyou_sidemenu',
                    'container'      => false,
                    'walker' => new matyou_menu_walker(),
                ));
            } else {
                echo '<div>' . esc_html__('Select a menu in the customizer', 'matyou') . '</div>';
            }
            ?>
        </nav>
        <?php
        if (has_nav_menu('legal links')) {
            wp_nav_menu(array(
                'theme_location' => 'legal links',
                'menu_class' => 'matyou_sidebar_lagal_links',
                'container'      => false,
            ));
        }
        ?>
        <div class="matyou_theme_info">
            <div>
                <a href="https://wordpress.org/themes/matyou/" target="_blank">MatYou WordPress Theme</a>
            </div>
        </div>
    </div>
</aside>