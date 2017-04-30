<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('list-article', 'clearfix', 'col-lg-6', 'col-md-12', 'col-sm-12') ); ?>>

	<div class="col-md-4 col-xs-12 col-sm-12 col-lg-3">
		<a href="#">
			<?php
			if ( has_post_thumbnail( ) ) {
				the_post_thumbnail();
			} else {
				echo '<img alt="" src="'. get_template_directory_uri() . '/assets/images/placholder2.png' .'">';
			}
			?>
		</a>
	</div>
	<div class="col-md-8 col-xs-12 col-sm-12 col-lg-9">
		<!--
		<div class="list-article-meta">
			<?php the_category(' / '); ?>
		</div>
		-->

		<h3 style="color:#ff9900;">
		<?php
			 $mykey_values = get_post_custom_values( 'position', $query->post->ID);
			 foreach ( $mykey_values as $key => $value ) {
			 	echo $value;
			 }
		?>
		</h3>
		<h3>
		<?php the_title(); ?>
		</h3>
		<div class="entry-content">
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
