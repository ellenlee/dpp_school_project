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

		<div itemprop="location" itemscope itemtype="http://schema.org/Place" class="container">




			<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" id="contact-info">
				<div class="name-and-fb flex-space-between">
					<?php echo display_images_from_media_library('main-logo-white'); ?>
					<a href="http://www.dpp.org.tw/" target="_blank" id="dpp-logo"><?php echo display_images_from_media_library('dpplogowhite'); ?></a>
				</div>
				<p itemprop="streetAddress">台北巿中正區北平東路30號10樓</p>
				<p>TEL：02-2392-9989 #386</p>
				<p>Email：<?php echo get_bloginfo('admin_email'); ?></p>
				<span class="social-icon-small"><?php get_template_part('social', 'fa'); ?></span>
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
	<meta itemprop="description" content="滴學堂是由民進黨搭建的學習平台，提供權益、生活、文化、語言、歷史等多樣化的課程，老少咸宜，輕鬆好玩。只要你熱愛學習與交流，你就是我們在找的夥伴！">
	<span itemprop="performer" itemscope itemtype="http://schema.org/Person">
	<meta itemprop="name" content="民主進步黨"></span>
	<meta itemprop="url" content="http://www.grass.tw/">
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>