<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 */

get_header();

if (is_active_sidebar('orchid-widgets')) : ?>
    <div class="orchid-search-results orchid-sidebar-active">
        <div class="orchid-main-content">
            <?php
            if (have_posts()) {
            ?>

                <h1 class="orchid-page-title orchid-search-title page-title">
                    <?php
                    printf(
                        /* translators: %s: Search term. */
                        esc_html__('Results for "%s"', 'orchid'),
                        '<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
                    );
                    ?>
                </h1>


                <div class="orchid-search-result-count search-result-count">
                    <?php
                    printf(
                        esc_html(
                            /* translators: %d: The number of search results. */
                            _n(
                                'We found %d result for your search.',
                                'We found %d results for your search.',
                                (int) $wp_query->found_posts,
                                'orchid'
                            )
                        ),
                        (int) $wp_query->found_posts
                    );
                    ?>
                </div><!-- .search-result-count -->
                <?php
                // Start the Loop.
                while (have_posts()) {
                    the_post();

                    /*
                    * Include the Post-Format-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                    */
                ?>
                    <div <?php post_class("orchid-search-item"); ?> id="post-<?php echo get_the_ID() ?>">
                        <?php
                        the_title(sprintf('<h2 class="orchid-title"><a href="%s">', esc_url(get_permalink())), '</a></h2>');
                        the_excerpt();
                        ?>
                    </div>
            <?php
                } // End the loop.

                the_posts_pagination(
                    array(
                        'class'              => 'orchid-pagination',
                        'prev_text' => __('Prev', 'orchid'),
                        'next_text' => __('Next', 'orchid'),
                    )
                );
                // If no content, include the "No posts found" template.
            } else {
                get_template_part('template-parts/content/content-none');
            } ?>
        </div>
        <?php get_sidebar("orchid-widgets"); ?>
    </div>
<?php else : ?>
    <div class="orchid-search-results">
        <?php if (have_posts()) { ?>
            <h1 class="orchid-page-title orchid-search-title page-title">
                <?php
                printf(
                    /* translators: %s: Search term. */
                    esc_html__('Results for "%s"', 'orchid'),
                    '<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
                );
                ?>
            </h1>
            <div class="orchid-search-result-count search-result-count">
                <?php
                printf(
                    esc_html(
                        /* translators: %d: The number of search results. */
                        _n(
                            'We found %d result for your search.',
                            'We found %d results for your search.',
                            (int) $wp_query->found_posts,
                            'orchid'
                        )
                    ),
                    (int) $wp_query->found_posts
                );
                ?>
            </div><!-- .search-result-count -->
            <?php
            // Start the Loop.
            while (have_posts()) {
                the_post(); ?>
                <div class="orchid-search-item">
                    <?php
                    the_title(sprintf('<h2 class="orchid-title"><a href="%s">', esc_url(get_permalink())), '</a></h2>');
                    the_excerpt();
                    ?>
                </div>
        <?php
            } // End the loop.

            the_posts_pagination(
                array(
                    'class'              => 'orchid-pagination',
                    'prev_text' => __('Prev', 'orchid'),
                    'next_text' => __('Next', 'orchid'),
                )
            );
            // If no content, include the "No posts found" template.
        } else {
            get_template_part('template-parts/content/content-none');
        } ?>
    </div>

<?php endif; ?>
<?php
get_footer();
