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


			<!-- 宣告課程相關變數 -->
			<?php
				//Master Slider
				$slider_id = get_post_custom_values( 'slider_id' )[0];

				// 課程
				$course_goal_list = explode( ",", get_post_custom_values( 'course_goal' )[0] );
				$course_target = get_post_custom_values( 'course_target' )[0];
				$course_arrangment = get_post_custom_values( 'course_arrangment' )[0];
				$course_price = get_post_custom_values( 'course_price' )[0];

				// teacher
				$teacher_name = get_post_custom_values( 'teacher_name' );

				// 課表與內容
				$class_info = get_post_custom_values( 'class_info' );
				$class_num = count( $class_info );
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<?php inkness_posted_on(); ?>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php if (has_post_thumbnail() ) : ?>
					<div class="featured-image-single hidden">
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

					<!-- 自訂課程內容開始 -->
					<div id="course-main-content">
						<div id="course-slider">
							<?php
								if( $slider_id ){
									masterslider( $slider_id );
								} else {
									the_post_thumbnail();
								}
							?>
						</div>

						<div id="course-info">
							<div id="course-goal">
								<h3>課程目標</h3>
								<ul>
									<?php
										foreach( $course_goal_list as $key => $value){
											echo "<li>$value</li>";
										}
									?>
								</ul>
							</div>

							<div id="course-target">
								<h3>誰適合來</h3>
								<p><?php echo $course_target; ?></p>
							</div>

							<div id="course-arrangment">
								<h3>授課方式</h3>
								<p><?php echo $course_arrangment; ?></p>
							</div>

							<div id="course-price">
								<h2>$<?php echo $course_price; ?></h2>
							</div>
						</div>
					</div>
					<hr>

					<!-- 講師資訊 -->
					<div id="grass_teacher">
						<div class="teacher-mainframe">
							<?php
							  foreach ( $teacher_name as $key => $value ) {

						  	// The Query
								$grass_teacher_param = array(
									'post_type' => 'grass_teacher',
									'title' => $value,
									'posts_count' => '1',
								);

								$the_query = new WP_Query( $grass_teacher_param );

								if ( $the_query->have_posts() ) : while( $the_query->have_posts() ) : ($the_query->the_post());
							?>


								<a class="teacher-box flex-space-center" href="<?php the_permalink(); ?>">
									<div class="teacher-avatar-xs"><?php the_post_thumbnail(); ?>
									</div>
									<h4 class="teacher-name"><?php echo the_title(); ?></h4>
									<?php echo the_content(); ?>
								</a>

							<?php
								endwhile; endif; wp_reset_postdata();
						   	}
						  ?>

						</div>
					</div><!-- 課師資訊結束 -->
					<hr>

					<div id="course-schedule">
						<h3>時程表</h3>

						<div id="course-schedule-mainframe">
							<?php
							  foreach ( $class_info as $key => $value ) {
							  	$the_info = explode( ",", $value );
							?>

								<div class="class-box">
									<div class="h1"><?php echo $key+1; ?></div>
									<div class="class-info">
										<h5 class="class-date"><?php echo $the_info[1]; ?></h5>
										<h4><?php echo $the_info[2]; ?></h4>
										<p><?php echo $the_info[3]; ?></p>
									</div>
								</div>

						  <?php } ?>
						</div>
						<hr>
					</div><!-- .entry-content -->


	<footer class="entry-meta">

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

		<!-- 報名表單 -->
		<footer>
			<h3>立刻報名</h3>
			<?php echo do_shortcode('[contact-form-7 id="75" title="enroll-course" class-name= ]'); ?>
		</footer>
	</div><!-- #primary -->

<?php get_footer(); ?>