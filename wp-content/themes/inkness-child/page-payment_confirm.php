<?php
/*
Template Name: For Payment Confirm
*/

get_header(); ?>

	<div id="primary" class="content-area col-md-12 flex-center">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<br>

						<?php
							$course_id = $_GET['course-id'];
							if ($course_id):

								$course_param = array(
									'post_type' => 'grass_course',
									'meta_key' => 'course_id',
									'meta_value' => $course_id,
									'posts_count' => '1',
									);

								$the_course = new WP_Query( $course_param );

									if ( $the_course->have_posts() ) :
										while( $the_course->have_posts() ) :
											($the_course->the_post());
						?>
												<h4 class="entry-title">感謝您報名「<?php the_title(); ?>」</h4>
						<?php
										endwhile; else:
										  echo "<h4 class='entry-title' style='color: red;'>課程代碼有誤！<br>請您回到匯款通知信件，重新網址，或連繫工作人員。</h4>";
									endif;
								wp_reset_postdata(); else :
								echo "<h4 class='entry-title' style='color: red;'>請您回到匯款通知信件，重新確認您的網址，或連繫工作人員。</h4>";
							endif;
						?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php	if ( $course_id ){ the_content(); } ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'inkness' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
					<?php edit_post_link( __( 'Edit', 'inkness' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
				</article><!-- #post-## -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>
