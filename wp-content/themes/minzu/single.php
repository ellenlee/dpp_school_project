<?php get_header(); ?>

<section id="content" class="widecol alignleft">
	 <?php while ( have_posts() ) : the_post(); ?>
	 		<div>
				<?php the_post_thumbnail( 'page-featured-image' ); ?>
			</div><!-- featured image -->

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
				<header>
					<h1 class="text-shad-lt"><?php the_title(); ?></h1>
					<p class="meta">Posted <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate="pubdate"><?php the_time( 'M n' ); ?></time> &#149; <a href="<?php the_permalink(); ?>#comments" title="<?php the_title_attribute() ?> Comments"><?php comments_number( '0 comments', 'only 1 comment', '% comments' ); ?></a></p>
				</header>
				<div class="content">
					<?php the_content(); ?>
				</div><!-- content -->


				<footer><!-- 顯示老師資訊 -->
					<?php
						$grasstw_teacher_name = get_post_custom_values( 'teacher' );
						$grasstw_teacher_info = get_post_custom_values( 'teacher_info' );
						$grasstw_teacher_avatar = get_post_custom_values( 'teacher_avatar' );
					?>

					<?php echo '<h2>'. $grasstw_teacher_name[0] .'</h2>'; ?>
					<?php echo '<p>'. $grasstw_teacher_info[0] .'</p>'; ?>
				</footer>

			</article>

	<?php endwhile; ?>


</section>


<?php get_footer(); ?>
