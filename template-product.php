<?php
/**
 *Template Name: Product
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

		<div id="content-inside" class="container left-sidebar">
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


					<div class="container" id="test">

                    				<?php
                    					$terms = get_terms('product_category', array(
                    						'hide_empty' => false,
                    						'orderby' => 'slug',
                    						'order' => 'asc'
                    					) );
                    					foreach($terms as $term){
                    						$term_name = $term->name;
                    				?>
                    				<section id="<?php echo str_replace(' ', '', $term_name);?>"  class="onepage-section">
                    					<h2 style="color:#ff9900;"><?php echo $term_name;?></h2>
                    					<hr/>
                    				</section>
                    					<?php
                    						$query = new WP_Query(
                    							array(
                    								'nopaging' => true,
                    								'post_type' => 'product',
                    								'order' => 'ASC',
                    								'orderby' => 'meta_value_order',
                    								'tax_query' => array(
                    									array(
                    										'taxonomy' => 'product_category',
                    										'field'    => 'name',
                    										'terms'    => $term_name,
                    									),
                    								),
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
                    								get_template_part( 'template-parts/content-product', 'list' );
                    							?>

                    						<?php endwhile; ?>
                    					<?php endif; ?>

                    				<?php
                    					}
                    				?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<div class="sidebar">
				<ul style="position: fixed;">
					<?php
						$terms = get_terms('product_category', array(
							'hide_empty' => false,
							'orderby' => 'slug',
							'order' => 'asc'
						) );
						foreach($terms as $term){
							$term_name = $term->name;
					?>
						<li><a href="#<?php echo str_replace(' ', '', $term_name);?>"><?php echo $term_name;?></a>

						<?php
							$query = new WP_Query(
								array(
									'nopaging' => true,
									'post_type' => 'product',
									'order' => 'ASC',
									'orderby' => 'meta_value_order',
									'tax_query' => array(
										array(
											'taxonomy' => 'product_category',
											'field'    => 'name',
											'terms'    => $term_name,
										),
									),
									//'posts_per_page' => 3
								)
							);
						?>
						<?php if ( $query->have_posts() ) : ?>
							<ul>
							<?php /* Start the Loop */ ?>
							<?php while ( $query->have_posts() ) : $query->the_post(); ?>
								<li>
								<a href="#p-<?php echo str_replace(' ', '', get_the_title());?>"><?php  echo get_the_title();?></a>
								</li>
							<?php endwhile; ?>
							</ul>
						<?php endif; ?>
						</li>
					<?php
						}
					?>
					</ul>
			</div>
			<?php //get_sidebar(); ?>

		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>


