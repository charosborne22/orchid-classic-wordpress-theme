<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 * 
 * 
 * 
 */

?>
<div class="orchid-grid">
    <?php while (have_posts()) :  the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class("orchid-card"); ?>>
            <a class="orchid-card-link" href=<?php echo get_permalink(); ?>>
                <?php
                if (has_post_thumbnail()) : ?>
                    <div class="orchid-card-thumbnail">
                        <?php the_post_thumbnail("orchid-thumbnail"); ?>
                    </div>
                <?php endif; ?>
            </a>
            <header class="orchid-card-text">
                <div class="orchid-categories">
                    <?php get_template_part("template-parts/categories"); ?>
                </div>
                <a class="orchid-card-link" href=<?php echo get_permalink(); ?>>
                    <?php the_title('<h1 class="orchid-card-title entry-title">', '</h1>'); ?>
                    <?php if (has_excerpt()) : ?>
                        <div class="orchid-excerpt"><?php the_excerpt() ?></div>
                    <?php endif; ?>
                </a>
            </header>

        </article>
    <?php endwhile; ?>
</div>