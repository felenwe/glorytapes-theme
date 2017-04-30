<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('list-article', 'clearfix', 'row') ); ?>>

	<div class="list-article-thumb col-md-4">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php
			if ( has_post_thumbnail( ) ) {
				the_post_thumbnail( 'onepress-blog-small' );
			} else {
				echo '<img alt="" src="'. get_template_directory_uri() . '/assets/images/placholder2.png' .'">';
			}
			?>
		</a>
	</div>
	<!--
	<div class="entry-header">
		<h2><?php the_title(); ?></h2>
	</div>
	-->
	<div class="list-article-content col-md-8">
		<!--
		<div class="list-article-meta">
			<?php the_category(' / '); ?>
		</div>
		-->

		<div class="entry-excerpt">
			<?php
				the_content();
			?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'onepress' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->
