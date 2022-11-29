<?php

/**
 * The header.
 *
 * This is the template that displays the custom header image
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 */

if (get_header_image()) : ?>
    <div class="orchid-custom-header">
        <img src="<?php header_image(); ?>" width="<?php echo absint(get_custom_header()->width); ?>" height="<?php echo absint(get_custom_header()->height); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
        <?php get_sidebar("orchid-header"); ?>
    </div>
<?php endif; ?>