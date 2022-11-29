<?php

/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$orchid_unique_id = wp_unique_id('search-form-');
$orchid_aria_label = !empty($args['aria_label']) ? 'aria-label="' . esc_attr($args['aria_label']) . '"' : '';
?>
<form role="search" method="get" class="orchid-search-form search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="sr-only" for="<?php echo esc_attr($orchid_unique_id); ?>"><?php _e('Search', 'orchid'); ?></label>
    <input type="search" id="<?php echo esc_attr($orchid_unique_id); ?>" class="orchid-search-field" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_attr('Search', 'orchid'); ?>" />
    <button type="submit" class="orchid-search-btn">Search</button>
</form>