<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 */


get_header(); ?>
<?php if (is_active_sidebar('orchid-widgets')) : ?>
    <div class="orchid-single orchid-sidebar-active">
        <div class="orchid-main-content">
            <?php
            /* Start the Loop */
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content/content-single');
            endwhile; // End of the loop.
            ?>
        </div>
        <?php get_sidebar("orchid-widgets"); ?>
    </div>
<?php else : ?>
    <div class="orchid-single">
        <?php
        /* Start the Loop */
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content/content-single');
        endwhile; // End of the loop.
        ?>
    </div>
<?php endif;
get_footer();
