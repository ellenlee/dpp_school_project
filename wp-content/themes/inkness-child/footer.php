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
		<span><?php get_template_part('social', 'fa'); ?></span>
		<div>
			<div id="subscribe">
				<h3>訂閱我們</h3>
				<form action="">
					<label for="email">Email
						<input type="text">
					</label>
				</form>
			</div>

			<div id="contact-info">
				<h3>滴學堂 DDP School</h3>
				<p>台北巿中正區北平東路30號10樓</p>
				<p>TEL：02-2392-9989</p>
				<p>Email：grass.tw@dpp.org.tw</p>
				<br>
				<span><small class="text-muted">&copy; 2017 DDP School. All Rights Reserved.</small></span>
			</div>


		</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>