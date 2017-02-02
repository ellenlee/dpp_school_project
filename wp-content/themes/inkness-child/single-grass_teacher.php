<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Inkness
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


				<div class="entry-content">
					<div id="teacher-main-frame">
						<?php if (has_post_thumbnail() ) : ?>
						<div class="featured-image-single">
							<?php
								the_post_thumbnail();
								?>
						</div>
						<?php endif; ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'inkness' ),
								'after'  => '</div>',
							) );
						?>
						<div class="teacher-content">
							<header class="entry-header">
								<h1 class="entry-title"><?php the_title(); ?></h1>
							</header><!-- .entry-header -->
							<?php the_content(); ?>
						</div>
					</div>

				</div><!-- .entry-content -->

				<footer class="entry-meta">

					<?php edit_post_link( __( 'Edit', 'inkness' ), '<span class="edit-link">', '</span>' ); ?>
					<br>
				</footer><!-- .entry-meta -->
			</article><!-- #post-## -->

			<?php inkness_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>