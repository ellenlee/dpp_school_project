<?php get_header(); ?>
	<section id="content" class="widecol alignleft">

					 <?php while ( have_posts() ) : the_post(); ?>
						<div>
							<?php the_post_thumbnail( 'page-featured-image' ); ?>
						</div><!-- featured image -->
						<?php if( function_exists( 'bcn_display' ) ){ ?><!-- The if statement was placed on the outside of the nav (different than book -->
							<nav class="breadcrumb">
								<?php bcn_display(); ?>
							</nav>
						<?php } ?>

						<!-- 主文 -->
						<article id="page-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
							<header>
								<h1 class="text-shad-lt"><?php the_title(); ?></h1>
							</header>
							<div class="content">
								<?php the_content(); ?>
							</div><!-- content -->
						</article>


							<div class="comments">
						<?php comments_template( '', true ); ?>
							</div><!-- comments-->
					<?php endwhile; ?>
		</section>
			<?php get_sidebar(); ?>

<?php get_footer(); ?>
