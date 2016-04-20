<?php
/**
 * This is a custom template for an "artists" page
 * For this template to initiate you need to make a page called 'Artists' and ensure that the slug is 'artists'
 */
get_header(); // This fxn gets the header.php file and renders it 
?>
<div id="primary" class="row-fluid">
    <div id="content" role="main" class="span8 offset2">

        <?php
        if (have_posts()) :
            /**
             * This is for the primary query for this page
             * We expect WordPress to just return the post data for this page
             * In other words, the Loop will only iterate once
             */
            ?>

            <?php
            while (have_posts()) : the_post();
                // If we have a page to show, start a loop that will display it
                ?>

                <article class="post">

                    <h1 class="title"><?php the_title(); // Display the title of the page  ?></h1>

                    <div class="the-content">
                        <?php
                        the_content();
                        // This call the main content of the page, the stuff in the main text box while composing.
                        ?>
                    </div><!-- the-content -->

                </article>

    <?php endwhile; // OK, let's stop the page loop once we've displayed it  ?>

<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error)  ?>

            <article class="post error">
                <h1 class="404">Nothing posted yet</h1>
            </article>

        <?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>

        <?php
        /**
         * After we loop through the core content of our Artists page, we are going to create a custom loop to look at a specific list of artists
         * Learn more: https://codex.wordpress.org/Class_Reference/WP_Query
         */
        $args = array(
            /**
             * This argument essentially says 'find me all of the posts with a "Style" term of "Rock n' Roll" *or* "Pop"'
             */
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'style',
                    'field' => 'slug',
                    'terms' => 'rock-n-roll',
                ),
                array(
                    'taxonomy' => 'style',
                    'field' => 'slug',
                    'terms' => 'pop',
                ),
            ),
            /**
             * This argument says 'find me all of the posts of post type "artist"'
             */
            'post_type' => 'artist',
            /**
             * This argument says 'find me all of the posts that are published'
             */
            'post_status' => 'publish',
            /**
             * This argument says 'return *all* of the posts you find with the above critera - no cap on the number"
             */
            'posts_per_page' => -1
        );

        /**
         * See the index.php file in this theme for a complete breakdown of a custom query
         */
        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()):
            ?>

            <ul class="artist-list">

                <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

                    <li><?php the_title(); ?></li>

            <?php endwhile; ?>

            </ul>

        <?php else: ?>

            <p>There are no artists available right now.</p>

<?php endif; ?>

    </div><!-- #content .site-content -->
</div><!-- #primary .content-area -->
<?php
get_footer(); // This fxn gets the footer.php file and renders it ?>