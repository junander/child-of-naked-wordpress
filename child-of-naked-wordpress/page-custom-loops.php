<?php
/**
 * The template for displaying any single page.
 *
 */

get_header();?>

<h1>This is my custom loops page template</h1>

	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8 offset2">

			<?php if ( have_posts() ) : 
			
			?>

				<?php while ( have_posts() ) : the_post(); 
					//global $post;
					//echo '<pre>'.print_r($post, true).'</pre>';
				?>

					<article class="post">
					
						<h1 class="title"><?php the_title(); ?></h1>
						
						<div class="the-content">
							<?php the_content(); 
							?>
							
							<?php wp_link_pages();  ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; ?>

			<?php else :?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; ?>
			
			<div style="margin-top: 150px; background: #a9a9a9;">
			
			<h1>This is my custom loop</h1>
			
			<?php $args = array(
			 'post_type' => array('artist','music_label'),
			  'post_status' => 'publish',
			  'posts_per_page' => -1,
			); 
			
			$custom_query = new WP_Query($args);
			//echo '<pre>'.print_r($custom_query->posts, true).'</pre>';
			
			if ($custom_query->have_posts()):
            ?>

            <h2>Labels and Artists</h2>

            <ul class="artist-list">

                <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

                    <li><?php the_title(); ?></li>

                <?php endwhile; ?>

            </ul>

        <?php else: ?>

            <p>There are no posts available for this query.</p>

        <?php endif; ?>
			
			
			</div>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer();  ?>