<?php get_header(); ?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">

        <?php if (have_posts()) : ?>
            <header class="archive-header">
                <h1 class="archive-title"><?php echo lessontwelve_get_taxonomy_archive_title(); ?></h1>
            </header><!-- .archive-header -->

            <?php /* The loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <?php the_excerpt(); ?>
            <?php endwhile; ?>

            <?php
            //see lib/utility.php
            lessontwelve_paging_nav();
            ?>

        <?php else : ?>
            <p>No posts for this taxonomy</p>
        <?php endif; ?>

    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>