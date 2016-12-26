<?php $j2theme_options = get_option( 'j2theme_option' ); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<title><?php wp_title( '|' ); ?></title>
	    <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>">
	    <meta name="viewport" content="width=device-width" />

	    <!-- custom web fonts -->
	    	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
	    	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,600' rel='stylesheet' type='text/css'>
	    <!-- custom web fonts -->


	    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	    <link rel="apple-touch-icon" href="images/apple-icon-file.png">
		<link rel="icon" type="image/x-icon" href="images/favicon.ico" />

	    <?php wp_enqueue_script( 'jquery' ); ?><!-- not heavily covered in the book for more info go to http://wdgwp.com/enqueue -->
	    <?php wp_head(); ?>

	   	<!-- HTML 5 Shiv for IE -->
	    	<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	    <!-- HTML 5 Shiv -->

	    <!-- jQuery -->
	        <script src="<?php echo get_template_directory_uri(); ?>/scripts/selectnav.js"></script>
	        <script src="<?php echo get_template_directory_uri(); ?>/scripts/functions.js" type="text/javascript"></script>
	    <!-- jQuery -->

	    <?php
	    /* Only call the nivo slider funcitons and css if we are on the homepage  */
	    if( is_home() ) : ?>
	    <!-- Nivo Slider -->
	        <script src="<?php echo get_template_directory_uri(); ?>/scripts/jquery.nivo.slider.js" type="text/javascript"></script>
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/nivo/nivo-slider.css" >
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/nivo/nivo.css" >
		<!-- Nivo Slider -->
		<?php endif; ?>


	</head>

	<body <?php body_class( $class ); ?>>
		<div class="width100">
			<header id="header" class="width100 clearfix">
				<!-- LOGO 與 主選單 -->
				<div class="navbar width100pad clearfix" style="border: 1px solid red;">
					<a href="/"><img src="http://placehold.it/150x80"></a>

					<?php
					$main_menu_header_top = array(
						'theme_location' => 'main-nav-header-top',
						'container' => 'nav',
						'container_class' => 'alignleft widecol',
						'container_id' => 'header-main-nav',
						'menu_id' => 'main-nav-header-top',
						'depth' => 1,
						'walker' => new main_nav_header_top_walker
					);
					?><!-- This walker was added to the theme and is not covered in the book. For more info on this go to http://wdgwp.com/walker_class -->

					<nav class="social">
						<?php wp_nav_menu( $main_menu_header_top ); ?>
					</nav><!-- .social -->
				</div>
			</header>


			<nav class="clearfix subnav">
				<?php
				$sub_menu_header_bottom = array(
					'theme_location' => 'sub-nav-header-bottom',
					'container' => 'div',
					'container_class' => 'width100pad widthfull mar0auto',
					'menu_id' => 'sub-nav-header-bottom',
					'menu_class' => '',
					'depth' => 3,
					'walker' => new sub_nav_header_bottom_walker

				);
				?><!-- This walker was added to the theme and is not covered in the book. For more info on this go to http://wdgwp.com/walker_class -->

				<?php wp_nav_menu( $sub_menu_header_bottom ); ?>
			</nav>
			<div id="container" class="width100pad clearfix">
				<div class="widthfull mar0auto">
