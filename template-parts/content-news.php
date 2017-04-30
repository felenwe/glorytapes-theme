<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */
?>

<article id="post-<?php the_ID(); ?>" style="text-align:center;" <?php post_class( array('list-article', 'clearfix', 'col-xs-12', 'col-sm-6', 'col-md-4', 'col-lg-3') ); ?>>

	<div class="list-article-thumb">
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

	<div class="list-article-content">
	    <!--
		<div class="list-article-meta">
			<?php the_category(' / '); ?>
		</div>
		-->
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="/index.php/product/#%s" rel="bookmark">', str_replace(' ', '', get_the_title() )), '</a></h2>' ); ?>

			<?php //the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-excerpt">
			<?php
				//the_excerpt();
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
