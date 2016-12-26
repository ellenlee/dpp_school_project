<?php 
/*
Template Name: Full Width
*/
get_header(); ?>	
	<section id="content" class="width100 alignleft">	
					<h1 class="error">Whoops, 404!</h2>
					<h2 class="tagline">We're sorry, we can't find what you're looking for. It's probably our fault. Please use the navigation above or below and try again!</h2>
					<?php get_search_form(); ?>
					
					<?php dynamic_sidebar( '404 Error Page' ); ?>
	</section>
					
<?php get_footer(); ?>
						