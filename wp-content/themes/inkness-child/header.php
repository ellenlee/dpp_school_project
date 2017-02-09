<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Inkness
 */
?><!DOCTYPE html>
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
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php single_post_title(''); ?>" />
    <meta property="og:description" content="<?php
    $out_excerpt = str_replace(array("\r\n", "\r", "\n"), "", get_the_excerpt());
    echo apply_filters('the_excerpt_rss', $out_excerpt);
    ?>" />
    <meta property="og:url" content="<?php the_permalink(); ?>"/>
    <meta property="og:image" content="<?php if ( $thumb[0] == null ) { echo $default_img; } else { echo $thumb; } ?>" />
<?php  } else { ?>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php bloginfo('name'); ?>" />
    <meta property="og:url" content="<?php bloginfo('url'); ?>"/>
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
    <meta property="og:image" content="<?php  if ( $thumb[0] == null ) { echo $default_img; } else { echo $thumb; } ?>" />
<?php  }  ?>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.8&appId=314902858877210";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="parallax-bg"></div>
<div id="page" class="hfeed site">
	<?php do_action( 'inkness_before' ); ?>
	<div id="header-top">
		<header id="masthead" class="site-header row container" role="banner">

			<div id="masthead-frame">
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

			</div>

				<div>
					<div id="top-search"><?php get_search_form(); ?></div>
				</div>
		</header><!-- #masthead -->
	</div>




	<?php if( is_home() ) : ?>
		<div>
			<?php masterslider(10); ?>
		</div>
	<?php endif; ?>






		<div id="content" class="site-content row clearfix clear">
		<div class="container col-md-12">
