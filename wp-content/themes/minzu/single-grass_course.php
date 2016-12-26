<?php get_header(); ?>
<?php
	$grasstw_teacher_name = get_post_custom_values( 'teacher' );
	$grasstw_teacher_info = get_post_custom_values( 'teacher_info' );
?>
<section id="content" class="widecol alignleft">
	 <?php while ( have_posts() ) : the_post(); ?>
	 		<div>
				<?php the_post_thumbnail( 'page-featured-image' ); ?>
			</div><!-- featured image -->

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
				<header>
					<h1 class="text-shad-lt"><?php the_title(); ?></h1>
				</header>

				<div class="content">
					<?php the_content(); ?>
				</div><!-- content -->


			</article>


			<!-- 顯示講師資訊 -->
			<div id="grass_teacher" style="width: 600px; height: 200px; background-color: #ccc">
				<?php
					// The Query
					$grass_teacher_param = array(
						'post_type' => 'grass_teacher',
						'title' => $grasstw_teacher_name[0],
						);
					$the_query = new WP_Query( $grass_teacher_param );

					if ( $the_query->have_posts() ) : while( $the_query->have_posts() ) : ($the_query->the_post());
				?>

				<h3 class="teacher-name">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
				<div class="teacher-avatar"><?php the_post_thumbnail(); ?></div>
				<div>
					<?php the_content(); ?>
				</div>

				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div><!-- posts -->


	<?php endwhile; ?>


</section>


<?php get_footer(); ?>
