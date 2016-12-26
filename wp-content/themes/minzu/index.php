<?php get_header(); ?>
	<section id="content" class="widecol alignleft">
					<?php if( is_home() ) : ?>

					<div class="slider-wrapper theme-default">
					<div id="slider" class="nivoSlider">
						<?php $j2theme_slider_param = array (
							'cat' => '9',/* This number needs to change based on your theme */
							'post_count' => '5',
						);

						$the_query = new WP_Query( $j2theme_slider_param );

						if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<a href="<?php $j2theme_slider_url = get_post_custom_values( 'url' ); echo $j2theme_slider_url[0]; ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'slider' ); ?></a>

							<?php endwhile; endif;
							wp_reset_postdata(); ?>


							</div><!-- slider -->
						 </div><!-- slider-wrapper -->

					 <?php endif; ?>


					 <div id="posts">
						<h2 class="osc-cond txttranup"><?php echo get_the_category_by_id( get_option( 'default_category' ) ); ?></h2>
						<?php global $postcount;
						$postcount = 0; ?>

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


							<article id="post-<?php the_ID(); ?>" <?php $postcount&1 ? post_class( 'halfcolrt alignleft' ) : post_class( 'halfcol clear alignleft' ); ?>>
								<?php $postcount++; ?><!-- Addition of the postcount variable to decide which class to put on the article for easy two column layouts this is not a requirement -->
								<?php the_post_thumbnail( 'post-thumb' ); ?>
								<h3><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								<p class="meta">Posted <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate="pubdate"><?php the_time( 'M n' ); ?></time> &#149; <a href="<?php the_permalink(); ?>#comments" title="<?php the_title_attribute() ?> Comments"><?php comments_number( '0 comments', 'only 1 comment', '% comments' ); ?></a></p>
								<?php if( !get_the_post_thumbnail() ) the_excerpt(); ?>
							</article>

						<?php endwhile; else:
							_e( 'Sorry, no posts matched your criteria.' );
						endif; ?>
						<div class="clear"></div>
					</div><!-- posts -->


					<?php if( $wp_query->max_num_pages > 1 ) { ?>
						<nav id="pagination" class="clear">
							<?php j2theme_paginate(); ?>
							<div class="clear"></div>
						</nav><!-- .pagination -->
					<?php } ?>
		</section>

<?php get_footer(); ?>