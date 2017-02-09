<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Inkness
 */
?>
	</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer row" role="contentinfo">

		<div class="container">




			<div id="contact-info">
				<div class="name-and-fb flex-space-between">
					<?php echo display_images_from_media_library('main-logo-white'); ?><?php echo display_images_from_media_library('dpplogowhite'); ?>
				</div>
				<p>台北巿中正區北平東路30號10樓</p>
				<p>TEL：02-2392-9989 #386</p>
				<p>Email：<?php echo get_bloginfo('admin_email'); ?></p>
				<span class="social-icon-small "><?php get_template_part('social', 'fa'); ?></span>
				<div class="clearfix"></div>
			</div>
			<hr class="line-small">
			<div id="subscribe">
				<h3>訂閱最新消息</h3>
				<?php echo do_shortcode('[contact-form-7 id="218" title="form-subscribe" html_class="form-subscribe" ]'); ?>
			</div>
		</div>
		<br>
		<div class="flex-center"><small class="text-muted">
			<?php
				if ( (function_exists( 'of_get_option' ) && (of_get_option('footertext2', true) != 1) ) ) {
				 	echo of_get_option('footertext2', true); } ?>
		</small></div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>