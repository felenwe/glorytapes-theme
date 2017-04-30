<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */

get_header(); ?>

	<div id="content" class="site-content">

		<div class="page-header">
			<div class="container">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
			</div>
		</div>

		<?php echo onepress_breadcrumb(); ?>

		<div id="content-inside" class="container right-sidebar">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'list' );
						?>

					<?php endwhile; ?>
					<div id="pagenavi" class="pagenavi">
					<?php
					wp_pagenavi(); ?>
					<?php //the_posts_navigation(); ?>
					</div>
				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>
				<?php


				    if ( is_tax() ) {
				    	$page_title = single_term_title( '', false );

				    	$page =  get_page_by_title( $page_title);

				    	if( $page) {
				    		echo $page-> post_content;
				    	}
					}
				?>
				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>

		</div><!--#content-inside -->
		<div class="tocontact hidden-sm-down">
        			<a href="/#contact">
        			<img src="/wp-content/themes/onepress/assets/images/contact.png" />
        			</a>
        		</div>
	</div><!-- #content -->

<?php get_footer(); ?>