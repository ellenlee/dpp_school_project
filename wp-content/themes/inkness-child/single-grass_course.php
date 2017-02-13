<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Inkness
 */

?>

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
				$course_place = get_post_custom_values( 'course_place' )[0];
				$admission_period = get_post_custom_values( 'admission_period' )[0];

				// 課表與內容
				$class_info = get_post_custom_values( 'class_info' );
				$class_num = count( $class_info );

				// price
				$course_price = get_post_custom_values( 'course_price' )[0];
			?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php
    $thumb = get_post_meta($post->ID,'_thumbnail_id',false);
    $thumb = wp_get_attachment_image_src($thumb[0], false);
    $thumb = $thumb[0];
    $default_img = get_bloginfo('stylesheet_directory').'/images/default_icon.jpg';
    ?>

<?php if(is_single() || is_page()) { ?>
	<meta property="fb:app_id" content="1931607947073761">
  <meta property="og:type" content="article" />
  <meta property="og:title" content="<?php single_post_title(''); ?>｜<?php bloginfo('name'); ?>" />
  <meta property="og:description" content="<?php
  $out_excerpt = str_replace(array("\r\n", "\r", "\n"), "", get_the_excerpt());
  echo apply_filters('the_excerpt_rss', $out_excerpt);
  ?>" />
  <meta property="og:url" content="<?php the_permalink(); ?>"/>
  <meta property="og:image" content="<?php if ( $thumb[0] == null ) { echo $default_img; } else { echo $thumb; } ?>" />
<?php  } ?>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1931607947073761',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/zh_TW/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div id="parallax-bg"></div>
<div id="page" class="hfeed site">
	<?php do_action( 'inkness_before' ); ?>
	<div id="header-top">
		<header id="masthead" class="site-header row container" role="banner">
			<div class="site-branding">

			<?php if((of_get_option('logo', true) != "") && (of_get_option('logo', true) != 1) ) { ?>
				<h1 class="site-title logo-container"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php
				echo "<img class='main_logo' src='".of_get_option('logo', true)."' title='".esc_attr(get_bloginfo( 'name','display' ) )."'></a></h1>";
				}
			else { ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
			}
			?>
			</div>

			<nav>
				<div id="header-2">
					<div class="container">
						<div class="default-nav-wrapper">
					    <nav id="site-navigation" class="main-navigation" role="navigation">
				        <div id="nav-container">
									<h1 class="menu-toggle"></h1>
									<div class="screen-reader-text skip-link">
										<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'inkness' ); ?>"><?php _e( 'Skip to content', 'inkness' ); ?></a>
									</div>

									<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			          </div>
							</nav><!-- #site-navigation -->
					  </div>


					</div>
				</div><!-- #header-2 -->

				<div id="header-3">
					<div class="container">
					    <nav id="site-navigation" class="main-navigation" role="navigation">
				        <div id="nav-container">
									<?php wp_nav_menu( array( 'theme_location' => 'sub-nav-header' ) ); ?>
			          </div>
							</nav><!-- #site-navigation -->
					</div>
				</div><!-- #header-3 -->
			</nav>
			<div>
				<div id="top-search"><?php get_search_form(); ?></div>
			</div>
		</header><!-- #masthead -->
	</div>



<?php while ( have_posts() ) : the_post(); ?>

	<!-- course-entry-section -->
	<section id="course-entry-section" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
		<div style="text-align: center">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php	if( $video_embed_link ){ ?>
				<iframe id="course-video" src="<?php echo $video_embed_link; ?>" frameborder="0" allowfullscreen></iframe>
			<?php	}	?>
		</div>
	</section>

		<div id="content" class="site-content row clearfix clear">
		<div class="container col-md-12"><!-- header end -->

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
								<div id="course-copy">
									<?php the_content(); ?>
								</div>
								<?php if( $course_price ){ ?>
									<div class="course-price price-big">
										<h2><small>報名費</small>$<?php echo $course_price; ?></h2>
										<p class="small">* 黨員全程參與可退報名費</p>
										<a href="#enroll-area" class="btn btn-warning btn-lg">立刻報名</a>
										<br>
										<!-- FB share button -->
										<div class="fb-like"
											data-href="<?php the_permalink(); ?>"
											data-layout="button"
											data-action="like"
										  data-width="450"
											data-size="small"
											data-show-faces="true"
											data-share="true">
										</div>
									</div>


								<?php } ?>
							</div>
							<div id="course-entry-content-right">
								<hr class="visible-in-small">
								<div id="course-info">
									<?php
										if( $course_goal_list[0] ){
											echo "
												<div>
													<h4>課程目標</h4>
													<ul>";
														foreach( $course_goal_list as $key => $value){
															echo "<li>$value</li>";
														}
											echo "</ul></div>";
										}

										if( $course_target ){
											echo "
												<div>
													<h4>誰適合來</h4>
													<p>$course_target</p>
												</div>
											";
										}

										if( $course_prepare ){
											echo "
												<div>
													<h4>課前準備</h4>
													<p>$course_prepare</p>
												</div>
											";
										}

										if( $course_arrangment ){
											echo "
												<div>
													<h4>授課時間</h4>
													<p>$course_arrangment</p>
												</div>
											";
										}

										if( $course_place ){
											echo "
												<div>
													<h4>上課地點</h4>
													<p>$course_place</p>
												</div>
											";
										}

										if( $admission_period ){
											echo "
												<div>
													<h4>報名時間</h4>
													<p>$admission_period</p>
												</div>
											";
										}

										if( $course_price ){ ?>
											<div class='course-price price-xs'>
												<h2><small>報名費</small>$<?php echo $course_price; ?></h2>
												<p class="small">* 黨員全程參與可退報名費</p>
												<a href="#enroll-area" class="btn btn-warning btn-sm">立刻報名</a>
												<!-- FB share button -->
												<div class="fb-like"
													data-href="<?php the_permalink(); ?>"
													data-layout="button"
													data-action="like"
												  data-width="450"
													data-size="small"
													data-show-faces="true"
													data-share="true">
												</div>
											</div>
									<?php }	?>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div id="teacher_and_schedule">

						<?php
							$teacher_list = wp_get_post_terms($post->ID, 'course_teacher', array("fields" => "names"));

							if( $teacher_list ){ ?>
								<!-- 講師資訊 -->
								<div id="grass_teacher">
									<div class="teacher-mainframe">
										<?php
										  foreach ( $teacher_list as $key => $value ) {

										  	// The Query
												$grass_teacher_param = array(
													'post_type' => 'grass_teacher',
													'title' => $value,
													'posts_count' => '1',
												);

												$the_query = new WP_Query( $grass_teacher_param );

												if ( $the_query->have_posts() ) : while( $the_query->have_posts() ) : ($the_query->the_post()); ?>

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

												<?php	endwhile;
													elseif( $teacher_list ): ?>
														<div class="teacher-box"><h4><?php echo $value; ?></h4></div>
												<?php endif; wp_reset_postdata(); // Query end
											} // foreach end
										?>
									</div><!-- div.teacher-mainframe-->
								</div><!-- div#grass_teacher -->
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
			<div class="enroll-area-title">
				<h3><br><br>立刻報名<br><small><?php the_title(); ?></small></h3>
			</div>
			<?php echo do_shortcode('[contact-form-7 id="75" title="form-course-enrollment" html_class="form-course-enrollment"]'); ?>
		</div>
	</div>

	<hr>
	<footer class="entry-meta">
		<?php the_taxonomies(); ?>
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