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
		<div class="flex-space">
			<div id="contact-info">
				<h3>滴學堂 DDP School</h3>
				<p>台北巿中正區北平東路30號10樓</p>
				<p>TEL：02-2392-9989</p>
				<p>Email：grass.tw@dpp.org.tw</p>
			</div>

			<div id="subscribe">
				<h3>Subscribe & Follow</h3>
				<span><?php get_template_part('social', 'fa'); ?></span>
			</div>
		</div>

	<hr>
		<div id="footertext" class="col-md-12">
        	<?php
			if ( (function_exists( 'of_get_option' ) && (of_get_option('footertext2', true) != 1) ) ) {
			 	echo of_get_option('footertext2', true); } ?>
        </div>
	</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>