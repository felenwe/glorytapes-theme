<?php
/**
 *Template Name: Contact
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


		<div id="content-contact-inside" class="container no-sidebar">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<section id="location"  class="onepage-section">
						<p></p>
						<h3>Location</h3>
						<hr>
						</section>
					<div class="container">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

					<?php endwhile; // End of the loop. ?>
					</div>


					<?php
                    					$terms = get_terms('employee_category', array(
                    						'hide_empty' => false,
                    						'orderby' => 'slug',
                    						'order' => 'asc'
                    					) );
                    					foreach($terms as $term){
                    						$term_name = $term->name;
                    				?>

                                    <section id="<?php echo str_replace(' ', '', $term_name);?>"  class="onepage-section container">
                    					<div class="row">
											<p></p>
											<h3><?php echo $term_name;?></h3>
											<hr>
                    					</div>

                    					</section>
                    					<div class="container">
                    					<div class="row">
                    					<?php
                    						$query = new WP_Query(
                    							array(
                    								'nopaging' => true,
                    								'post_type' => 'employee',
                    								'order' => 'ASC',
                    								'meta_key' => 'order',
                    								'orderby' => 'meta_value',
                    								'tax_query' => array(
                    									array(
                    										'taxonomy' => 'employee_category',
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
                    						<?php
                    						$i = 1;
                    						while ( $query->have_posts() ) : $query->the_post();
                    							$i++;
                    							if ($i%2 ==0){
                    								echo "</div><div class=\"row\">";
                    							}
                    						?>

                    							<?php
                    								/*
                    								 * Include the Post-Format-specific template for the content.
                    								 * If you want to override this in a child theme, then include a file
                    								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                    								 */
                    								get_template_part( 'template-parts/content-contact', 'list' );
                    							?>

                    						<?php endwhile; ?>
                    					<?php endif; ?>
											</div>
                    				<?php
                    					}
                    				?>
					</div>
				</main><!-- #main -->
			</div><!-- #primary -->
			<div class="container">

			</div>
		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
