<?php 
/*
Template Name: Full Width
*/
get_header(); ?>	
	<section id="content" class="width100 alignleft">	
					 <?php while ( have_posts() ) : the_post();  ?>	
						<div>
							<?php the_post_thumbnail( 'page-featured-image' ); ?>
						</div><!-- featured image -->
						<?php if( function_exists( 'bcn_display' ) ){ ?>
							<nav class="breadcrumb">
								<?php bcn_display(); ?>
							</nav>
						<?php } ?>
						<article id="page-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
							<header>
								<h1 class="text-shad-lt"><?php the_title(); ?></h1>
							</header>						
							<div class="content">
								<?php the_content(); ?>
							</div><!-- content -->
						</article>
										
					<?php endwhile; ?>
		</section>
					
<?php get_footer(); ?>
						