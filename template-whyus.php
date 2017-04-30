<?php
/**
 *Template Name: Why us
 *
 * @package OnePress
 */

get_header(); ?>

	<div id="content" class="site-content">

		<div class="page-header">
			<div class="container">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</div>

		<div id="content-inside" class="container no-sidebar">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>


					<?php

						$parent_id = $post->ID;
						//echo $parent_id;
						$query = new WP_Query(array(
							'post_parent' => $parent_id,
							'post_type' => 'page',
							'order' => 'ASC',
							'orderby' => 'meta_value_num'
						));

					?>
					<?php
						if ( $query->have_posts() ) :
							while ( $query->have_posts() ) :
								$query->the_post();
					?>
					<article class="page">
						<h3>
							<?php the_Title();?>
						</h3>
						<div class="entry-content">
							<?php the_Content();?>
						</div>
					</article>
					<?php
							endwhile;

						endif;
					?>

					<?php
					endwhile; // End of the loop. ?>


				</main><!-- #main -->
<div class="tocontact hidden-sm-down">
			<a href="/#contact">
			<img src="/wp-content/themes/onepress/assets/images/contact.png" />
			</a>
		</div>
			</div><!-- #primary -->
		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
