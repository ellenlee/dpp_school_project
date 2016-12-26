<?php get_header(); ?>
	<section id="content" class="widecol alignleft">

					 <div id="posts">
						<h2 class="osc-cond txttranup"><?php
						if( is_day() ) _e( 'You are viewing the ' .  get_the_date() . ' daily archives' );
						elseif ( is_month() ) _e( 'You are viewing the ' . get_the_date( 'F Y' ) . ' monthly archives' );
						elseif ( is_year() ) _e( 'You are viewing the ' . get_the_date( 'Y' ) . ' yearly archives' );
						elseif ( is_author() ) _e( 'You are viewing author archives' );
						else _e( single_cat_title( '[課程] ', false ) ); // 課程分類標題
					?></h2>
						<?php global $postcount;
						$postcount = 0; ?>


						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<!-- 以下輸出課程清單 -->
							<article id="post-<?php the_ID(); ?>" <?php $postcount&1 ? post_class( 'halfcolrt alignleft' ) : post_class( 'halfcol clear alignleft' ); ?>>
								<?php $postcount++; ?><!-- Addition of the postcount variable to decide which class to put on the article for easy two column layouts this is not a requirement -->

								<!-- 縮圖、標題與摘要 -->
								<div style="border: 1px solid #ccc">
									<?php the_post_thumbnail( 'post-thumb' ); ?>
									<h3><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<?php the_excerpt(); ?>
								</div>

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