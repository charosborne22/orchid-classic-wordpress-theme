<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 */

$blog_info = get_bloginfo('name');
$current_year = date("Y");
?>
</main>
<footer class="orchid-footer">
    <div class="orchid-container">
        <div class="orchid-footer-widgets">
            <?php if (is_active_sidebar("orchid-footer-widgets")) :
                dynamic_sidebar("orchid-footer-widgets");
            endif;
            ?>
        </div>
        <nav class="orchid-footer-nav">
            <?php if (has_nav_menu('footer')) : ?>
                <?php wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container_class' => 'orchid-footer-container',
                    'items_wrap'      => '<ul id="orchid-footer-menu-list" class="%2$s orchid-footer-menu-list">%3$s</ul>'
                )); ?>
            <?php endif; ?>
        </nav>
        <p class="orchid-copyright">Copyright &copy; <?php echo $blog_info ?> <?php echo $current_year ?></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>