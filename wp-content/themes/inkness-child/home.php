<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Inkness
 */

get_header(); ?>

	<div id="primary-home" class="content-area col-md-12">
		<main id="main" class="site-main row container" role="main">
			<div id="frontpage-course">
				<div class="frontpage-titlebox">
					<h1>近期課程</h1>
					<a href="grass_course/" class="btn btn-default btn-xs">more</a>
				</div>
					<?php
				  	// The Query
						$course_category = array(
							'post_type' => array('grass_unit', 'grass_course'),
							'title' => $value,
							'posts_count' => '1',
						);

						$the_query = new WP_Query( $course_category );

						if ( $the_query->have_posts() ) :
					?>

					<?php /* Start the Loop */ $ink_count = 0; $ink_row_count=0; $i = 1; ?>
					<?php while ( $the_query->have_posts() && $i <= 3 ) : $the_query->the_post();
						if ($ink_count == 0 ) {echo "<div class='row-".$ink_row_count." row'>";}
					?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', 'home' );
						?>

					<?php
						if ($ink_count == 2 )
							{
								echo "</div>";
								$ink_count=0;
								$ink_row_count++;
							}
						else {
							$ink_count++;
						}
						 $i++; endwhile;
					?>

					<?php inkness_pagination(); ?>

				<?php else : ?>

					<?php get_template_part( 'no-results', 'index' ); ?>

				<?php endif; wp_reset_postdata(); ?>
			</div>
			<hr class="line">

			<div id="frontpage-teacher">
				<div class="frontpage-titlebox">
					<h1>師資陣容</h1>
					<a href="grass_teacher/" class="btn btn-default btn-xs">more</a>
				</div>

				<?php
					$arg_teacher = array(
						'post_type' => 'grass_teacher',
						'course_category' => 'star',
					);
					$the_query = new WP_Query( $arg_teacher );

				  if ( $the_query->have_posts() ) :

					/* Start the Loop */
						$ink_count = 0; $ink_row_count=0; $i = 1;

					while ( $the_query->have_posts() && $i <= 3 ) : $the_query->the_post();

						if ($ink_count == 0 ) {
							echo "<div class='row-".$ink_row_count." row'>";
						}

						get_template_part( 'content', 'home' );

						if ($ink_count == 2 ){
								echo "</div>";
								$ink_count=0;
								$ink_row_count++;
						} else {
							$ink_count++;
						}

						$i++;
						endwhile;

					  inkness_pagination();

				  else :
					 get_template_part( 'no-results', 'index' );

					endif;
					wp_reset_postdata();
				?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>