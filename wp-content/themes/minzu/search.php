<?php get_header(); ?>	
	<section id="content" class="widecol alignleft">
					<?php get_search_form(); ?>
						<h2 class="osc-cond txttranup"><?php _e ( 'You are searching for "' . get_search_query() . '"' ); ?></h2>
					 <div id="posts">
						<?php global $postcount;
						$postcount = 0; ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							
							<article id="post-<?php the_ID(); post_class(); ?>>
								<header> <h3><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								<p class="meta">Posted <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate="pubdate"><?php the_time( 'M n' ); ?></time> &#149; <a href="<?php the_permalink(); ?>#comments" title="<?php the_title_attribute() ?> Comments"><?php comments_number( '0 comments', 'only 1 comment', '% comments' ); ?></a></p></header>
								<?php the_excerpt(); ?>
							</article>
						<?php endwhile; else: 
							_e( 'Sorry, no posts matched your search criteria.' ); 
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
			<?php get_sidebar(); ?>
<?php get_footer(); ?>