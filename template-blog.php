<?php
/**
 *Template Name: Blog
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

		<div id="content-application-inside" class="container no-sidebar">
			<p>&nbsp;</p>
			<div class="container">
				<?php
				$query = new WP_Query(
					array(
						'nopaging' => true,
						'post_type' => 'blog',
						//'order' => 'ASC',
						//'orderby' => 'title',
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
							get_template_part( 'template-parts/content-blog', 'list' );
						?>

					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
<style>

.list-article-meta{
	font-style: italic;
	border-bottom: 1px #777777 dashed;
}
</style>
