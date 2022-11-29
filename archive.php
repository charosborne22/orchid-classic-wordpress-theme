<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 */

get_header();
$description = get_the_archive_description(); ?>
<?php if (is_active_sidebar('orchid-widgets')) : ?>
    <div class="orchid-archive orchid-sidebar-active">
        <div class="orchid-main-content">
            <?php if (have_posts()) : ?>
                <header class="orchid-archive-header">
                    <?php the_archive_title('<h1 class="orchid-archive-title page-title">', '</h1>');
                    if ($description) : ?>
                        <div class="orchid-archive-description"><?php echo wp_kses_post(wpautop($description)); ?></div>
                    <?php endif; ?>
                </header>
            <?php get_template_part('template-parts/content/content-posts');
            else :
                get_template_part('template-parts/content/content-none');
            endif; ?>
            <div class="orchid-posts-pagination orchid-pagination">
                <?php the_posts_pagination(); ?>
            </div>
        </div>
        <?php get_sidebar("orchid-widgets"); ?>
    </div>
<?php else : ?>
    <div class="orchid-archive orchid-category-<?php echo strtolower($category_name); ?>">
        <?php if (have_posts()) :
            the_archive_title('<h1 class="orchid-archive-title page-title">', '</h1>');
            if ($description) : ?>
                <div class="archive-description"><?php echo wp_kses_post(wpautop($description)); ?></div>
        <?php endif;
            get_template_part('template-parts/content/content-posts');
        else :
            get_template_part('template-parts/content/content-none');
        endif; ?>
        <div class="orchid-posts-pagination orchid-pagination">
            <?php the_posts_pagination(); ?>
        </div>
    </div>
<?php endif; ?>
<?php get_footer();
