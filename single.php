<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package OnePress
 */

get_header(); ?>

	<div id="content" class="site-content">
		<div class="page-header">
			<div class="container">
			<?php if ( get_post_type() != 'blog'){?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php } else {?>
				<h1 class="entry-title">BLOG</h1>
				<?php }?>
			</div>
		</div>

		<?php echo onepress_breadcrumb(); ?>

		<div id="content-inside" class="container right-sidebar">

		<?php if ( get_post_type() != 'blog'){?>

			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>

			<?php }
			else{
			?>
			<div id="primary">
				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content-blog', 'single' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div>
			<?php
			}
			?>
		</div><!--#content-inside -->
		<div class="tocontact hidden-sm-down">
        			<a href="/#contact">
        			<img src="/wp-content/themes/onepress/assets/images/contact.png" />
        			</a>
        		</div>
	</div><!-- #content -->

<?php get_footer(); ?>
<style>

.list-article-meta{
	font-style: italic;
	border-bottom: 1px #777777 dashed;
}
</style>