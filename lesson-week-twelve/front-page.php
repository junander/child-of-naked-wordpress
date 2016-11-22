<?php get_header(); ?>

<?php
$attachment_args = array(
    'post_parent' => get_the_ID(),
    'post_status' => 'inherit',
    'post_type' => 'attachment',
    'order' => 'ASC',
    'orderby' => 'menu_order',
);
?>

<div id="primary" class="row-fluid">
    <div id="content" role="main" class="span8 offset2">

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>

                <article class="post">
                    <div class="the-content">
        <?php the_content(); ?>
                    </div>
                </article>

        <?php
    endwhile;
else:
    ?>

            <article class="post error">
                <h1 class="404">Nothing posted yet</h1>
            </article>

<?php
endif;
?>

    </div>
</div>

<?php get_footer(); ?>