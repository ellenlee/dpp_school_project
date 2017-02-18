<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Inkness
 */
?><!DOCTYPE html>
<!-- 由 Google 結構化資料標記協助工具新增的微資料標記。 -->
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
    $thumb = get_post_meta($post->ID,'_thumbnail_id',false);
    $thumb = wp_get_attachment_image_src($thumb[0], false);
    $thumb = $thumb[0];
    $default_img = 'http://grass.tw/wp-content/uploads/dppschool-logo.png';
    ?>

<?php if(is_single() || is_page()) { ?>
  <meta property="fb:app_id" content="1931607947073761">
  <meta property="og:type" content="article" />
  <meta property="og:title" content="<?php single_post_title(''); ?>" />
  <meta property="og:description" content="<?php
  $out_excerpt = str_replace(array("\r\n", "\r", "\n"), "", get_the_excerpt());
  echo apply_filters('the_excerpt_rss', $out_excerpt);
  ?>" />
  <meta property="og:url" content="<?php the_permalink(); ?>"/>
  <meta property="og:image" content="<?php if ( $thumb[0] == null ) { echo $default_img; } else { echo $thumb; } ?>" />
<?php  } else if(is_home()) { ?>
  <meta property="fb:app_id" content="1931607947073761">
  <meta property="og:type" content="article" />
  <meta property="og:title" content="<?php bloginfo('name'); ?>｜<?php bloginfo('description'); ?>" />
  <meta property="og:url" content="<?php bloginfo('url'); ?>"/>
  <meta property="og:description" content="滴學堂是由民進黨搭建的學習平台，提供權益、生活、文化、語言、歷史等多樣化的課程，老少咸宜，輕鬆好玩。只要你熱愛學習與交流，你就是我們在找的夥伴！" />
  <meta property="og:image" content="<?php echo $default_img; ?>" />
<?php  }  ?>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-92101085-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>
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
<div itemscope itemtype="http://schema.org/Event" id="page" class="hfeed site">
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
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><meta itemprop="name" content="滴學堂 DPP SCHOOL"></a></h1>
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
		<div id="home_slider">
			<?php masterslider(10); ?>
		</div>
	<?php endif; ?>

<script>
  // add a class on the body ie IE 10/11
  var uA = navigator.userAgent;
  if(uA.indexOf('Trident') != -1 && uA.indexOf('rv:11') != -1){
      document.body.className = document.body.className+' ie11';
      document.body.className = document.body.className+' iex';
      document.getElementById("home_slider").style.display="none";
      document.getElementById("top-search").style.display="none";
      var x = document.getElementsByClassName("sub-menu");
      var i;
      for (i = 0; i < x.length; i++) {
        console.log('ss');
        x[i].style.display="none";
      }
      alert("不建議使用 ie 瀏覽器閱讀本網站");
  }
  if(uA.indexOf('Trident') != -1 && uA.indexOf('MSIE 10.0') != -1){
      document.body.className = document.body.className+' ie10';
      document.body.className = document.body.className+' iex';
      document.getElementById("home_slider").style.display="none";
      document.getElementById("top-search").style.display="none";
      var x = document.getElementsByClassName("sub-menu");
      var i;
      for (i = 0; i < x.length; i++) {
        console.log('ss');
        x[i].style.display="none";
      }
      alert("不建議使用 ie 瀏覽器閱讀本網站");
  }

  if(navigator.appName=="Microsoft Internet Explorer"){
    document.body.className = document.body.className+' iex';
    document.getElementById("home_slider").style.display="none";
    document.getElementById("top-search").style.display="none";
    var x = document.getElementsByClassName("sub-menu");
    var i;
    for (i = 0; i < x.length; i++) {
      console.log('ss');
      x[i].style.display="none";
    }
    alert("不建議使用 ie 瀏覽器閱讀本網站");
  }
</script>

<!--[IF IE]>
    <script type="text/javascript">

      document.getElementById("home_slider").style.display="none";
      document.getElementById("top-search").style.display="none";
      var x = document.getElementsByClassName("sub-menu");
      var i;
      for (i = 0; i < x.length; i++) {
        console.log('ss');
        x[i].style.display="none";
      }
      alert("不建議使用 ie 瀏覽器閱讀本網站");
    </script>
<![endif]-->

		<div id="content" class="site-content row clearfix clear">
		<div class="container col-md-12">
