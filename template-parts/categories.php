<?php
$categories = get_the_category();
$separator = ' ';
$output = '';
if (!empty($categories)) {
    foreach ($categories as $category) {
        $output .= '<a class="orchid-category-link" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>' . $separator;
    }
    echo trim($output, $separator);
}
