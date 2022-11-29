<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 */
get_header(); ?>
<?php if (is_active_sidebar('orchid-widgets')) : ?>
    <div class="orchid-page orchid-404 orchid-sidebar-active">
        <div class="orchid-main-content">
            <h1><?php esc_html_e('Error 404: This Page Not Found', 'orchid'); ?></h1>
            <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'orchid'); ?></p>
            <?php get_search_form() ?>
        </div>
        <?php get_sidebar("orchid-widgets"); ?>
    </div>
<?php else : ?>
    <div class="orchid-page">
        <h1><?php esc_html_e('Error 404: This Page Not Found', 'orchid'); ?></h1>
        <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'orchid'); ?></p>
        <?php get_search_form() ?>
    </div>
<?php endif; ?>
<?php get_footer();
