<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 */

$blog_info = get_bloginfo('name');
$description  = get_bloginfo('description');
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a href="#content" class="orchid-skip-link">Skip to main content.</a>
    <header class="orchid-header orchid-main-header">
        <div class="orchid-header-container orchid-container">
            <div class="orchid-site-info">
                <?php if (has_custom_logo()) : ?>
                    <div class="orchid-logo site-logo"><?php the_custom_logo(); ?></div>
                <?php endif; ?>
                <?php if (display_header_text()) : ?>
                    <div class="orchid-title-desc">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class=" orchid-site-title"><?php echo esc_html($blog_info); ?></a>
                        <p class="orchid-site-description"><?php echo esc_html($description); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <nav class="orchid-nav">
                <div class="orchid-nav-icon">
                    <div class="orchid-line orchid-line1"></div>
                    <div class="orchid-line orchid-line2"></div>
                    <div class="orchid-line orchid-line3"></div>
                </div>
                <?php if (has_nav_menu('primary')) : ?>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container_class' => 'orchid-primary-container',
                        'items_wrap'      => '<ul id="orchid-primary-menu-list" class="%2$s orchid-primary-menu-list">%3$s</ul>'
                    )); ?>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main id="content" class="orchid-container orchid-main">