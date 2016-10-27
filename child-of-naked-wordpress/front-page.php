<?php
/**
 * The template for displaying any single page.
 *
 */
get_header(); // This fxn gets the header.php file and renders it 
?>


<h1>This is my Front Page</h1>

<div id="primary" class="row-fluid">
    <div id="content" role="main" class="span8 offset2">

        <?php
        if (have_posts()) :
            // Do we have any posts/pages in the databse that match our query?
            ?>

            <?php
            while (have_posts()) : the_post();
                // If we have a page to show, start a loop that will display it
                ?>

                <article class="post">

                    <h1 class="title"><?php the_title(); // Display the title of the page        ?></h1>

                    <div class="the-content">
                        <?php
                        the_content();
                        // This call the main content of the page, the stuff in the main text box while composing.
                        // This will wrap everything in p tags
                        ?>

                        <?php wp_link_pages(); // This will display pagination links, if applicable to the page  ?>
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
         * After we loop through the core content of the homepage page, we are going to create some custom loops to create fine tuned queries
         * Learn more: https://codex.wordpress.org/Class_Reference/WP_Query
         */
        /**
         * First custom query: posts_per_page
         * Controls: number of posts returned to query
         * Default: 10, or whatever is set in Settings->Reading
         */
        $args = array(
            /**
             * This parameter says 'return x number of posts'; use -1 to return all available posts
             */
            'posts_per_page' => 7
        );
        $count = 1;

        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()):
            ?>

            <h2>Posts per page example</h2>

            <ul class="artist-list">

                <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

                    <li><?php echo $count; ?>. <?php the_title(); ?></li>
                    
                    <?php $count++; ?>

                <?php endwhile; ?>

            </ul>

        <?php else: ?>

            <?php //this is a fallback, in case the query does not return anything ?>
            <p>There are no posts available for this query.</p>

        <?php endif; ?>

        <?php
        /**
         * Second custom query: post_status
         * Filters posts by a particular status, i.e. 'publish', 'draft', etc.
         * Default: 'publish' for logged out users, 'publish' and 'private' for logged in users
         */
        $args = array(
            /**
             * This parameter says 'find me all of the posts of post status x'
             */
            'post_status' => 'publish'
        );

        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()):
            ?>

            <h2>Posts status example</h2>

            <ul class="artist-list">

                <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

                    <li><?php the_title(); ?></li>

                <?php endwhile; ?>

            </ul>

        <?php else: ?>

            <p>There are no posts available for this query.</p>

        <?php endif; ?>

        <?php
        /**
         * Third custom query: post_type
         * Filters posts by a particular post type, i.e. 'post', 'page', or custom post types
         * Default: 'post', however if the tax_query params are set (see below), the default changes to 'any'
         */
        $args = array(
            /**
             * This parameter says 'find me all of the posts of post type x'
             */
            'post_type' => 'artist'
        );

        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()):
            ?>

            <h2>Posts type example</h2>

            <ul class="artist-list">

                <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

                    <li><?php the_title(); ?></li>

                <?php endwhile; ?>

            </ul>

        <?php else: ?>

            <p>There are no posts available for this query.</p>

        <?php endif; ?>

        <?php
        /**
         * Fourth custom query: tax_query
         * Filters posts by a taxonomy term, or multiple taxonomies/terms
         * Default: no default
         */
        $args = array(
            /**
             * This parameter says 'find me all of the posts tagged with the style taxonomy term "pop"'
             */
            'tax_query' => array(
                array(
                    'taxonomy' => 'style',
                    'field' => 'slug',
                    'terms' => 'pop',
                ),
            ),
        );

        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()):
            ?>

            <h2>Posts tax query example</h2>

            <ul class="artist-list">

                <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

                    <li><?php the_title(); ?></li>

                <?php endwhile; ?>

            </ul>

        <?php else: ?>

            <p>There are no posts available for this query.</p>

        <?php endif; ?>

        <?php
        /**
         * Fifth custom query: putting it all together
         * The real power of WordPress queries is pulling together multiple params to target very specific sets of posts
         * Note that tax_query in this case shows how to combine more than one term
         */
        
        $args = array(
            /**
             * This param essentially says 'find me all of the posts with a "Style" term of "Rock n' Roll" *or* "Pop"'
             */
            'tax_query' => array(
                'relation' => 'AND', //also try 'OR' to see how that works
                array(
                    'taxonomy' => 'style',
                    'field' => 'slug',
                    'terms' => 'rock',
                ),
                array(
                    'taxonomy' => 'style',
                    'field' => 'slug',
                    'terms' => 'pop',
                ),
            ),
            /**
             * This param says 'find me all of the posts of post type "artist"'
             */
            'post_type' => 'artist',
            /**
             * This param says 'find me all of the posts that are published'
             */
            'post_status' => 'publish',
            /**
             * This param says 'return *all* of the posts you find with the above critera - no cap on the number"
             */
            'posts_per_page' => -1
        );

        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()):
            ?>
            
            <h2>Putting it all together example</h2>

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