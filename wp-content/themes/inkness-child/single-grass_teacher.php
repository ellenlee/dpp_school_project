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
					<hr>

					<section id="primary-home" class="course-teacher-frame">
						<?php
							// The Query

							$grass_teacher_param = array(
								'post_type' => array('grass_course', 'grass_unit'),
								'course_teacher' => get_the_title(),
								'posts_count' => '1',
							);

							$the_query = new WP_Query( $grass_teacher_param );

							if ( $the_query->have_posts() ) : ?>

								<?php /* Start the Loop */ $ink_count = 0; $ink_row_count=0 ?>

								<?php while ( $the_query->have_posts() ) : $the_query->the_post();
								?>

							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', 'home' );
							?>

							<?php endwhile;	?>

							<?php inkness_pagination(); ?>

						<?php else : ?>

							<?php get_template_part( 'no-results', 'index' ); ?>

						<?php endif; ?>

						<?php  wp_reset_postdata(); ?>
					</section>

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