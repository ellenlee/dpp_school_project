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


			<!-- 確認所有變數 -->
			<?php
				$course_goal_list = get_post_custom_values( 'course_goal' );
			?>

			<div>
				<h2>The Meta</h2>
				<?php the_meta(); ?>
			</div>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<?php inkness_posted_on(); ?>
						<p class="text-muted">（預計2017年3月份開班）</p>
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

					<!-- 課程內容開始 -->
					<div id="course-main-content">
						<div id="course-slider">
							<?php masterslider(5); ?>
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
								<h3>誰適合？</h3>
								<p>在台北流浪的上班族、各種吃貨</p>
							</div>

							<div id="course-operation">
								<h3>授課方式</h3>
								<p>4堂課，毛奇2堂 + 裴英姬2堂，每堂2小時</p>
							</div>

							<div id="course-price">
								<h2>$<?php echo get_post_custom_values( 'course_price' )[0]; ?></h2>
							</div>
						</div>
					</div>
					<hr>

					<!-- 講師資訊 -->
					<div id="grass_teacher">
						<div class="teacher-mainframe">
							<div class="teacher-box flex-space-center">
								<div class="teacher-avatar-xs">
									<img src="http://localhost/wp-content/uploads/2016/12/mokki.jpg" alt="">
								</div>
								<p class="teacher-info">蕭琮容（毛奇），深夜女子料理習作粉絲團主，著有《深夜女子的公寓料理》。</p>
							</div>
							<div class="teacher-box flex-space-center">
								<div class="teacher-avatar-xs">
									<img src="http://placehold.it/100x100" alt="">
								</div>
								<p class="teacher-info">裴英姬，韓國媽媽，著有《英姬好料理》。</p>
							</div>
						</div>


						<div class="hidden">
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
						</div>
					</div><!-- 課師資訊結束 -->
					<hr>

					<div id="course-schedule">
						<h3>時程表</h3>
						<div id="course-schedule-mainframe">
							<div class="class-box">
								<div class="h1">1</div>
								<div class="class-info">
									<h5 class="class-date">2017/3/14</h5>
									<h4>燉出好心情，認識台灣米</h4>
									<p>介紹台灣米，完成一道燉飯</p>
								</div>
							</div>
							<div class="class-box">
								<div class="h1">2</div>
								<div class="class-info">
									<h5 class="class-date">2017/3/14</h5>
									<h4>嘿咻嘿咻，來廟會囉</h4>
									<p>米粉炒+魷魚螺肉蒜</p>
								</div>
							</div>
							<div class="class-box">
								<div class="h1">3</div>
								<div class="class-info">
									<h5 class="class-date">2017/3/14</h5>
									<h4>파삭 파삭！</h4>
									<p>海鮮泡菜煎餅+辣炒年糕</p>
								</div>
							</div>
							<div class="class-box">
								<div class="h1">4</div>
								<div class="class-info">
									<h5 class="class-date">2017/3/14</h5>
									<h4>飯桌菜</h4>
									<p>韓式味增豆腐鍋+烤豬肉</p>
								</div>
							</div>

						</div>


					</div>


					<hr>





					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'inkness' ),
							'after'  => '</div>',
						) );
					?>
					<?php the_content(); ?>
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