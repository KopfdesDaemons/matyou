<?php get_header(); ?>
<?php include_once get_template_directory() . '/template-parts/sidemenu.php'; ?>
<main role="main">
    <section class="matyou_content_spacer">
        <div class="matyou_error" id="matyou_main_content">
            <div class="matyou_404_headline_row">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h1><?php esc_html_e('File not found', 'matyou'); ?></h1>
            </div>
            <p><?php echo esc_html__("The page you are looking for could not be found. Please check the URL or go back to the homepage.", 'matyou'); ?></p>
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo __('Go to the home page', 'matyou'); ?></a>
        </div>
    </section>
</main>
<?php get_footer(); ?>