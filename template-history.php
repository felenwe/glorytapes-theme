<?php
/**
 *Template Name: History
 *
 * @package OnePress
 */

get_header(); ?>

	<div id="content-history" class="site-content">

		<div class="page-header">
			<div class="container">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			</div>
		</div>

		<div id="content-history-inside" class="container no-sidebar">

			<div class="container">
				<?php
				$query = new WP_Query(
					array(
						'nopaging' => true,
						'post_type' => 'origin',
						'order' => 'ASC',
						'orderby' => 'title',
						//'category_name' => 'history',
						//'posts_per_page' => 3
					)
				);
				?>
				<?php if ( $query->have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<?php
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content-history', 'list' );
						?>

					<?php endwhile; ?>
				<?php endif; ?>
			</div>

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

            					<?php endwhile; // End of the loop. ?>

            				</main><!-- #main -->
            			</div><!-- #primary -->
		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
