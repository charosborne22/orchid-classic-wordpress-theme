<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 */

if (!function_exists('orchid_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress  
     * features.
     *
     * It is important to set up these functions before the init hook so
     * that none of these features are lost.
     *
     *  @since orchid 1.0
     * 
     */
    function orchid_setup()
    {

        // Load styles & scripts
        function orchid_add_theme_scripts()
        {
            wp_enqueue_style('style', get_stylesheet_uri());
            wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto&display=swap', false);
            // wp_enqueue_style('fa', '"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet', false);

            wp_enqueue_style('general', get_template_directory_uri() . '/assets/styles/general.css', array(), '1.0', 'all');
            wp_enqueue_style('nav', get_template_directory_uri() . '/assets/styles/nav.css', array(), '1.0', 'all');
            wp_enqueue_style('footer', get_template_directory_uri() . '/assets/styles/footer.css', array(), '1.0', 'all');
            wp_enqueue_style('content', get_template_directory_uri() . '/assets/styles/content.css', array(), '1.0', 'all');

            wp_enqueue_script('gsap-scrolltrigger', get_template_directory_uri() . '/assets/vendor/gsap/minified/ScrollTrigger.min.js', array(), '3.11.3', true);
            wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/vendor/gsap/minified/gsap.min.js', array(), '3.11.3', true);
            wp_enqueue_script('script', get_template_directory_uri() . '/assets/scripts/script.js', array('jquery'), 1.0, true);

            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
        }
        add_action('wp_enqueue_scripts', 'orchid_add_theme_scripts');

        //Automatic feed links enables post and comment RSS feeds by default. These feeds will be displayed in <head> automatically. 
        add_theme_support('automatic-feed-links');

        // Post thumbnails and featured images allow your users to choose an image to represent their post.
        add_theme_support('post-thumbnails');

        // Allow custom logo
        add_theme_support(
            'custom-logo',
        );

        add_theme_support('custom-logo', array(
            'height' => 120,
            'width' => 120,
            'flex-width' => true
        ));

        // Enables Custom_Backgrounds support for a theme.
        add_theme_support('custom-background');

        // Enables plugins and themes to manage the document title tag. This should be used in place of wp_title() function.
        add_theme_support("title-tag");
        // Allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption.
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));

        // Add custom header
        $header_args = array(
            'default-image'      => get_template_directory_uri() . '/assets/img/orchid-landscape.jpg',
            'width'              => 1440,
            'height'             => 720,
        );
        add_theme_support('custom-header', $header_args);

        // Add image size 
        add_image_size('orchid-thumbnail', 620, 420, true);
        add_image_size('featured', 1920, 540, true);

        // Register navigation menus
        register_nav_menus(array(
            'primary'   => __('Primary Menu', 'orchid'),
            'footer' => __('Footer Menu', 'orchid')
        ));

        // Register widgets
        function orchid_widgets_init()
        {
            register_sidebar(
                array(
                    'name'          => esc_html__('Orchid', 'orchid'),
                    'id'            => 'orchid-widgets',
                    'description'   => esc_html__('Add widgets here to appear in your main sidebar.', 'orchid'),
                    'before_widget' => '<div id="%1$s" class="orchid-widget widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );

            register_sidebar(
                array(
                    'name'          => esc_html__('Orchid Header', 'orchid'),
                    'id'            => 'orchid-header',
                    'description'   => esc_html__('Add widgets here to appear on the index custom header.', 'orchid'),
                    'before_widget' => '<div id="%1$s" class="orchid-widget widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );

            register_sidebar(
                array(
                    'name'          => esc_html__('Orchid Index', 'orchid'),
                    'id'            => 'orchid-index',
                    'description'   => esc_html__('Add widgets here to appear on the index page.', 'orchid'),
                    'before_widget' => '<div id="%1$s" class="orchid-widget widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );

            register_sidebar(
                array(
                    'name'          => esc_html__('Footer', 'orchid'),
                    'id'            => 'orchid-footer-widgets',
                    'description'   => esc_html__('Add widgets here to appear in your footer.', 'orchid'),
                    'before_widget' => '<div id="%1$s" class="orchid-widget widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
        }
        add_action('widgets_init', 'orchid_widgets_init');
    }

endif;

add_action('after_setup_theme', 'orchid_setup');
