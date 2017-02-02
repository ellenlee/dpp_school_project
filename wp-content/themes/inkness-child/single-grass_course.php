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
				//video and slider
				$video_embed_link = get_post_custom_values( 'video_embed_link' )[0];
				$slider_id = get_post_custom_values( 'slider_id' )[0];

				// 課程
				$course_copy = get_the_content();
				$course_goal_list = explode( ",", get_post_custom_values( 'course_goal' )[0] );
				$course_target = get_post_custom_values( 'course_target' )[0];
				$course_prepare = get_post_custom_values( 'course_prepare' )[0];
				$course_arrangment = get_post_custom_values( 'course_arrangment' )[0];

				// teacher
				$teacher_name = get_post_custom_values( 'course_teacher_name' );

				// 課表與內容
				$class_info = get_post_custom_values( 'class_info' );
				$class_num = count( $class_info );

				// price
				$course_price = get_post_custom_values( 'course_price' )[0];
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta tax-name">

					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->

				<div class="entry-content">

					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'inkness' ),
							'after'  => '</div>',
						) );
					?>

					<!-- 自訂課程內容開始 -->
					<div id="course-main-content">
						<div id="course-entry-content">
							<div id="course-entry-content-left">
								<div id="course-slider">
									<?php	if( $video_embed_link ){ ?>
										<iframe width="400" height="225" src="<?php echo $video_embed_link; ?>" frameborder="0" allowfullscreen></iframe>
									<?php	}	?>

									<?php
										if( $slider_id ){
											masterslider( $slider_id );
										} else {
											the_post_thumbnail();
										}
									?>
								</div>
								<?php if( $course_price ){ ?>
									<div class="course-price price-big">
										<h2>$<?php echo $course_price; ?></h2>
										<br>
										<a href="#enroll-area" class="btn btn-warning btn-lg">立刻報名</a>
									</div>
								<?php } ?>
							</div>

							<div id="course-entry-content-right">
								<div id="course-info">
									<?php
										if( $course_copy ){
										  echo '<div id="course-copy">', the_content(),'</div><hr>';
									  }

										if( $course_goal_list[0] ){
											echo "
												<div>
													<h3>課程目標</h3>
													<ul>";
														foreach( $course_goal_list as $key => $value){
															echo "<li>$value</li>";
														}
											echo "</ul></div>";
										}

										if( $course_target ){
											echo "
												<div>
													<h3>誰適合來</h3>
													<p>$course_target</p>
												</div>
											";
										}

										if( $course_prepare ){
											echo "
												<div>
													<h3>課前準備</h3>
													<p>$course_prepare</p>
												</div>
											";
										}

										if( $course_arrangment ){
											echo "
												<div>
													<h3>授課時間</h3>
													<p>$course_arrangment</p>
												</div>
											";
										}

										if( $course_price ){
											echo "
												<div class='course-price price-xs'>
													<h2>$$course_price</h2>
												</div>
											";
										}
									?>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div id="teacher_and_schedule">
						<!-- 講師資訊 -->
						<?php if( $teacher_name ){ ?>
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
											<?php if( has_post_thumbnail() ){ ?>
												<div class="teacher-avatar-xs"><?php the_post_thumbnail(); ?>
											</div>
											<?php } ?>
											<div class="teacher-info">
												<h4 class="teacher-name"><?php echo the_title(); ?></h4>
												<?php echo the_excerpt(); ?>
											</div>
										</a>

									<?php
											endwhile;

										elseif( $teacher_name ): ?>
											<div class="teacher-box">
												<h4><?php echo $value; ?></h4>
											</div>
									<?php
										endif; wp_reset_postdata(); } ?>
								</div>
							</div>
						<?php	} ?><!-- 講師資訊結束 -->
						<?php if( $class_num > 0 ): ?>
							<div id="course-schedule">
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
												<p class="class-content">
													<?php
														if( count($the_info) > 4 ){
															for($i = 3; $i <= count($the_info); $i++){
															  echo $the_info[$i]."<br>";
														  }
														} else{
															echo $the_info[3];
														}
													?>
												</p>
											</div>
										</div>
								  <?php } ?>
								</div>
							</div><!-- .entry-content -->
						<?php endif; ?>
					</div><!-- 課程資訊結束 -->
				</div>


	<div id="enroll-area" class="flex-center">
		<div class="enroll-area-frame">
			<h3><br><br>立刻報名<br><small><?php the_title(); ?></small></h3>

			<?php echo do_shortcode('[contact-form-7 id="75" title="form-course-enrollment" html_class="form-course-enrollment"]'); ?>
		</div>
	</div>

	<hr>
	<footer class="entry-meta">
		<?php the_taxonomies( ); ?>
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

	</div><!-- #primary -->

<?php get_footer(); ?>