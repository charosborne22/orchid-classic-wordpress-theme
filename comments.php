<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Orchid
 * @since Orchid 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}

$orchid_comment_count = get_comments_number();
?>

<div id="comments" class="orchid-comments comments-area <?php echo get_option('show_avatars') ? 'show-avatars' : ''; ?>">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php if ('1' === $orchid_comment_count) :
                esc_html_e('1 comment', 'orchid');
            else :
                printf(
                    esc_html(_nx('%s comment', '%s comments', $orchid_comment_count, 'Comments title', 'orchid')),
                    esc_html(number_format_i18n($orchid_comment_count))
                );
            endif; ?>
        </h2>

        <ol class="orchid-comment-list comment-list">
            <?php
            wp_list_comments(
                array(
                    'avatar_size' => 32,
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'reverse_top_level' => true,

                )
            );
            ?>
        </ol>

        <div class="orchid-pagination">
            <?php
            paginate_comments_links(array(
                'screen_reader_text' => __('Pagination', 'orchid'),
                'prev_text' => __('Prev', 'orchid'),
                'next_text' => __('Next', 'orchid'),
            ));
            ?>
        </div>

        <?php if (!comments_open()) : ?>
            <p class="orchid-no-comments no-comments"><?php esc_html_e('Comments are closed.', 'orchid'); ?></p>
    <?php endif;
    endif;
    comment_form(
        array(
            'class_container' => 'orchid-comment-form-container',
            'class_form' => "orchid-comment-form",
            'label_submit' => esc_html__('Post', 'orchid'),
            'title_reply'        => esc_html__('Leave a comment', 'orchid'),
            'title_reply_before' => '<h2 id="reply-title" class="orchid-reply-title comment-reply-title">',
            'title_reply_after'  => '</h2>',
        )
    );
    ?>
</div>