<?php

		/*
		Theme Title found on page 77
		*/
		function j2theme_filter_wp_title( $currenttitle, $sep, $seplocal ) {
			//Grab the site name
			$site_name = get_bloginfo( 'name' );
			// Add the site name after the current page title
			$full_title = $site_name . $currenttitle;
			// If we are on the front_page or homepage append the description
			if ( is_front_page() || is_home() ) {
				//Grab the Site Description
				$site_desc = get_bloginfo( 'description' );
				//Append Site Description to title
				$full_title .= ' ' . $sep . ' ' . $site_desc;
			}
			return $full_title;
		}
		// Hook into 'wp_title'
		add_filter( 'wp_title', 'j2theme_filter_wp_title', 10, 3 );

		/**
		 * Menu location registration page 90
		 */
		register_nav_menus(
			array(
				'main-nav-header-top' => 'Main Nav, Top of Header',
				'mobile-main-nav-header-top' => 'MOBILE Main Nav, Top of Header',
				'sub-nav-header-bottom' => 'Sub Nav, Bottom of Header',
				'mobile-sub-nav-header-bottom' => 'MOBILE Sub Nav, Bottom of Header',
				'aside-nav' => 'Widget Sidebar Menu',
				'footer-nav' => 'Footer Menu',
				'mobile-footer-nav' => 'MOBILE Footer Menu'
			)
		);



		/**
		 * Custom walker to put correct classes on <li>'s for main nav header top nav
		 */
		class main_nav_header_top_walker extends Walker_Nav_Menu {
			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
				global $wp_query;
				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$class_names = $value = '';

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;

				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ' alignleft nobull text-shad txttranup"' : '';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= $indent . '<li' . $id . $value . $class_names .'>';

				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= '</a>';
				$item_output .= $args->after;

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}

		}


		/**
		 * Custom walker to put correct classes on <li>'s for sub nav header bottom nav
		 */
		class sub_nav_header_bottom_walker extends Walker_Nav_Menu {
			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
				global $wp_query;
				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$class_names = $value = '';

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;

				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ' alignleft nobull osc-cond text-shad-lt"' : '';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= $indent . '<li' . $id . $value . $class_names .'>';

				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= '</a>';
				$item_output .= $args->after;

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}

		}


		/**
		 * Custom walker to put correct classes on <li>'s for footer nav
		 */
		class footer_nav_walker extends Walker_Nav_Menu {
			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
				global $wp_query;
				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$class_names = $value = '';

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;

				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ' alignleft nobull text-shad txttranup"' : '';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= $indent . '<li' . $id . $value . $class_names .'>';

				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= '</a>';
				$item_output .= $args->after;

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}

		}


		/**
		 * Custom paginate function found on page 227
		 */

		 function j2theme_paginate() {
				global $paged, $wp_query;
				$abignum = 999999999; //we need an unlikely integer
				$args = array(
					'base' => str_replace( $abignum, '%#%', esc_url( get_pagenum_link( $abignum ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var( 'paged' ) ),
					'total' => $wp_query->max_num_pages,
					'show_all' => False,
					'end_size' => 2,
					'mid_size' => 2,
					'prev_next' => True,
					'prev_text' => __( '&lt;' ),
					'next_text' => __( '&gt;' ),
					'type' => 'list'
				);
			echo paginate_links( $args );
		}


		/**
		 * Registering Post Thumbnails found in Chapter 14
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'slider', 530, 215, true );
		add_image_size( 'post-thumb', 260, 175, true );
		add_image_size( 'sm-post-thumb', 65, 50, true );
		add_image_size( 'page-featured-image', 530, 95, true );
		add_image_size( 'fullwidth-featured-image', 820, 95, true );







		/********************************************//**
		 * Registering sidebars
		 ***********************************************/

		/**
		 * Registering the Header "Sidebar"
		 */
		$j2theme_header_sidebar = array(
			'name' => 'Header',
			'id' => 'header',
			'description' => 'Widgets placed here will display in the header to the right of the logo',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		);
		register_sidebar( $j2theme_header_sidebar );

		/**
		 * Registering the Aside "Sidebar"
		 */
		$j2theme_aside_sidebar = array(
			'name' => 'Aside',
			'id' => 'aside',
			'description' => 'Widgets placed here will go in the Right hand sidebar',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div><!-- class: widget -->',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		);
		register_sidebar( $j2theme_aside_sidebar );

		/**
		 * Registering the Upper Footer "Sidebar"
		 */
		$j2theme_upperfooter_sidebar = array(
			'name' => 'Upper Footer',
			'id' => 'upper-footer',
			'description' => 'Widgets placed here will go in the upper footer area ',
			'before_widget' => '<div class="widget thirdcol alignleft">',
			'after_widget' => '</div><!-- class: widget -->',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		);
		register_sidebar( $j2theme_upperfooter_sidebar );

		/**
		 * Registering the Left Footer "Sidebar"
		 */
		$j2theme_footer_lt_sidebar = array(
			'name' => 'Left Footer',
			'id' => 'left-footer',
			'description' => 'Widgets placed here will go in the left column of the footer',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		);
		register_sidebar( $j2theme_footer_lt_sidebar );

		/**
		 * Registering the Left Footer "Sidebar"
		 */
		$j2theme_footer_rt_sidebar = array(
			'name' => 'Right Footer',
			'id' => 'right-footer',
			'description' => 'Widgets placed here will go in the right column of the footer',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		);
		register_sidebar( $j2theme_footer_rt_sidebar );

		/**
		 * Registering the 404 "Sidebar"
		 */
		$j2theme_404 = array(
			'name' => '404 Error Page',
			'id' => 'fourohfour',
			'description' => 'Widgets placed here will go 404 error page',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		);
		register_sidebar( $j2theme_404 );




		/**
		 * Custom Header found on 248
		 */
		$custom_header_args = array(
			'random-default' => false,
			'width' => 350,
			'height' => 160,
			'flex-height' => true,
			'flex-width' => true,
			'default-image' => get_template_directory_uri() . '/images/header.jpg'
		);
		add_theme_support( 'custom-header', $custom_header_args );


/********************************************//**
 * 自訂文章類型 by Ellen Lee
 ***********************************************/

// function create_custom_post_course() {
//   $labels = array(
//     'name'               => __( 'Courses'),
//     'singular_name'      => __( 'Course' ),
//     'menu_name'          => '課程'
//   );
//   $args = array(
//     'labels'        => $labels,
//     'description'   => '',
//     'public'        => true,
//     'menu_position' => 5,
//     "supports" => array( "title", "editor", "thumbnail", "excerpt", "trackbacks", "custom-fields", "comments", "revisions", "author", "page-attributes", "post-formats" ),
// 		"taxonomies" => array( "category", 'course_category' ),
//     'has_archive'   => true,
//   );
//   register_post_type( 'course', $args );
// }
// add_action( 'init', 'create_custom_post_course' );


// function my_taxonomies_course() {
//   $labels = array(
//     'name'              => _x( '課程分類', 'taxonomy 名称' ),
//     'singular_name'     => _x( '課程分類', 'taxonomy 单数名称' ),
//   );
//   $object_type = array('course', 'post');
//   $args = array(
//     'labels' => $labels,
//     'hierarchical' => true,
//     'show_ui' => true,
//     'show_in_nav_menus' => true,
//     'show_admin_column' => true,
//   );
//   register_taxonomy( 'course_category', $object_type, $args );
// }
// add_action( 'init', 'my_taxonomies_course', 0 );


/********************************************//**
 * 測試短程式 by Ellen Lee
 ***********************************************/

// 插入特定的一段文字

function grasstw_legal_disclaimer(){
	return '<small style="color: red;">Test for shortcode disclaimer.</small>';
}

add_shortcode('disclaimer', 'grasstw_legal_disclaimer'); //程式名稱；要呼叫的函式


// 插入影片的內嵌程式碼，測試無效，大括號裡的內容不會被取代⋯⋯

function grasstw_youtube_vid( $atts ){
	return '<iframe src="http://player.vimeo.com/video/{$atts[id]}?title=0&amp;byline=0amp;portrait=0&amp;color=ff3333" width="{$atts[width]}" height="{$atts[height]}" frameborder="0" webkitAllowFullScreen mozallowfullscree allowFullScreen></iframe>';
}

//XBBsVn2EW6s

add_shortcode('youtube', 'grasstw_youtube_vid');

// 解決WordPress樣式修改後沒反應的問題

add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), NULL, filemtime( get_stylesheet_directory() . '/style.css' ) );
}
