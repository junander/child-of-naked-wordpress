<?php
/*
 * Utility: functions we can use all over
 */

/**
 * Display navigation to next/previous set of posts when applicable.
 * @return void
 */
function lessontwelve_paging_nav() {
    global $wp_query;

    // Don't print empty markup if there's only one page.
    if ($wp_query->max_num_pages < 2)
        return;
    ?>
    <nav class="navigation paging-navigation" role="navigation">
        <h1 class="screen-reader-text"><?php _e('Posts navigation', 'twentythirteen'); ?></h1>
        <div class="nav-links">

            <?php if (get_next_posts_link()) : ?>
                <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen')); ?></div>
            <?php endif; ?>

            <?php if (get_previous_posts_link()) : ?>
                <div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen')); ?></div>
            <?php endif; ?>

        </div><!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
}

/**
 * Builds out title for taxonomy archives
 * @param type $t_sep
 * @return type
 */
function lessontwelve_get_taxonomy_archive_title($t_sep = ': ') {
    $title = '';
    if (is_tax()) {
        $term = get_queried_object();
        if ($term) {
            $tax = get_taxonomy($term->taxonomy);
            $title = single_term_title($tax->labels->name . $t_sep, false);
        }
    }
    
    return $title;
}
