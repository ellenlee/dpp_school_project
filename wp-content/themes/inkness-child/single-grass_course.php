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
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<?php inkness_posted_on(); ?>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->

				<div class="entry-content">
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
					<?php the_content(); ?>
				</div><!-- .entry-content -->

				<!-- 顯示講師資訊 -->
				<div id="grass_teacher">

					<?php
						$grass_teacher_name = get_post_custom_values( 'teacher' );
						// The Query
						$grass_teacher_param = array(
							'post_type' => 'grass_teacher',
							'title' => $grass_teacher_name[0],
							// 'posts_count' => '1',
							);
						$the_query = new WP_Query( $grass_teacher_param );

						if ( $the_query->have_posts() ) : while( $the_query->have_posts() ) : ($the_query->the_post());
					?>


					<div class="flex">
						<div class="teacher-avatar"><?php the_post_thumbnail(); ?></div>
						<div style="margin-left: 25px">
							<h3 class="teacher-name">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							<?php the_content(); ?>
						</div>
					</div>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div><!-- 課師資訊結束 -->


	<!-- 報名表單 -->
	<footer class="entry-meta">
		<div>
			<h3>立刻報名</h3>
			<?php echo do_shortcode('[contact-form-7 id="75" title="enroll-course" class-name= ]'); ?>

		</div>




		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'inkness' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'inkness' ) );

			if ( ! inkness_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmrk">permalink</a>.', 'inkness' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'inkness' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'inkness' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'inkness' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'inkness' ), '<span class="edit-link">', '</span>' ); ?>
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