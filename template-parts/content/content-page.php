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
                <?php the_title('<h1 class="orchid-post-title entry-title">', '</h1>');

                ?>
            </div>

        </header>
    <?php else : ?>
        <header class="orchid-post-header">
            <?php the_title('<h1 class="orchid-post-title entry-title">', '</h1>'); ?>
        </header>
    <?php endif; ?>

    <div class="orchid-post-content">
        <?php the_content(); ?>
    </div>
</article>