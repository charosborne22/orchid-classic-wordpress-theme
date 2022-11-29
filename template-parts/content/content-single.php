<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <header class="orchid-post-header">
            <div class="orchid-header-img">
                <?php
                the_post_thumbnail("featured"); ?>
            </div>

            <div class="orchid-header-post-text">
                <?php the_title('<h1 class="orchid-post-title entry-title">', '</h1>'); ?>
                <p><?php _e("Posted by", "orchid"); ?> <?php the_author(); ?> <?php _e("on", "orchid"); ?> <?php the_date() ?></p>
            </div>

            <div class="orchid-categories">
                <?php get_template_part("template-parts/categories"); ?>
            </div>
        </header>
    <?php else : ?>
        <header>
            <?php the_title('<h1 class="orchid-post-title entry-title">', '</h1>'); ?>
            <p><?php _e("Posted by", "orchid"); ?> <?php the_author(); ?> <?php _e("on", "orchid"); ?> <?php the_date() ?> </p>
        </header>
    <?php endif; ?>

    <div class="orchid-post-content entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'orchid') . '">',
                'after'    => '</nav>',
                /* translators: %: Page number. */
                'pagelink' => esc_html__('Page %', 'orchid'),
            )
        );

        ?>
    </div>

    <?php $posttags = get_the_tags();
    if ($posttags) { ?>
        <div class="orchid-tag-list">
            <span><?php esc_html_e("Tagged as:", "orchid") ?> </span>
            <?php foreach ($posttags as $tag) {
                echo '<a class="orchid-tag-link" href=' . esc_url(get_tag_link($tag->term_id))  . '>' . '#' . $tag->name . '</a> ';
            } ?>
        </div>
    <?php  } ?>

    <nav class="orchid-posts-nav">
        <span class="orchid-previous-post"><?php previous_post_link(); ?></span>
        <span class="orchid-next-post"><?php next_post_link(); ?></span>
    </nav>
    <div class="orhcid-comments">
        <?php
        // If comments are open or there is at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        } ?>
    </div>
</article>