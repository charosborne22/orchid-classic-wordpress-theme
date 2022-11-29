<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 */

get_header(); ?>
<?php get_header('image'); ?>
<?php if (is_active_sidebar('orchid-widgets')) : ?>
    <div class="orchid-index orchid-sidebar-active">
        <div class="orchid-main-content">
            <?php get_sidebar("orchid-index") ?>
            <section class="orchid-section">
                <?php
                if (have_posts()) : ?>

                <?php get_template_part('template-parts/content/content-posts');
                else :
                    get_template_part('template-parts/content/content-none');
                endif; ?>
            </section>

        </div>
        <?php get_sidebar('orchid-widgets'); ?>
    </div>
<?php else : ?>
    <div class="orchid-index">
        <?php get_sidebar("orchid-index") ?>
        <section class="orchid-section">
            <?php
            if (have_posts()) : ?>

            <?php get_template_part('template-parts/content/content-posts');
            else :
                get_template_part('template-parts/content/content-none');
            endif;
            ?>
        </section>
    </div>

<?php endif;
get_footer();
