				</div><!-- widthfull mar0auto -->
			</div><!-- #container -->
			<section class="upper-footer clearfix">
				<div class="width100pad widthfull mar0auto">
					<?php get_sidebar( 'upper-footer' ); ?>
				</div><!-- width100pad -->
			</section><!-- .upper-footer -->
			<footer class="main">
				<div class="width100pad clearfix widthfull mar0auto">
					<div class="widecol alignleft">
						<?php
						$footer_nav = array(
							'theme_location' => 'footer-nav',
							'container' => 'nav',
							'container_id' => 'footer-main',
							'menu_id' => 'footer-nav',
							'depth' => 1,
							'walker' => new footer_nav_walker
						);
						?>
						<!-- This walker was added to the theme and is not covered in the book. For more info on this go to http://wdgwp.com/walker_class -->
						<?php wp_nav_menu( $footer_nav ); ?>
						<div class="clear widget">
							<?php get_sidebar( 'lt-footer' ); ?>
						</div><!-- .widget -->	
					</div><!-- widecol -->	
					<div class="narcolrt alignright">
						
						<nav class="alignright social">
							<ul>
								<li class="alignleft nobull"><a href="http://twitter.com/professor" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter-lg.png" alt="Twitter Icon" title="<?php bloginfo( 'title' ); ?> on Twitter"></a></li>
								<li class="alignleft nobull"><a href="https://www.facebook.com/wordpressandweb" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook-lg.png" alt="Facebook Icon" title="<?php bloginfo( 'title' ); ?> on Facebook"></a></li>
								<li class="alignleft nobull"><a href="<?php bloginfo( 'rss2_url' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/rss-lg.png" alt="<?php bloginfo( 'title' ); ?> RSS Icon" title="Subscribe to <?php bloginfo( 'title' ); ?>"></a></li>

				</ul>
						</nav><!-- .social -->
						<form class="alignright">
							<input id="s" name="s" type="text" value="search" class="osc italic txttranup">
							<input id="submit" name="submit" type="submit" value="" class="alignleft">
						</form><!-- form (search box) -->
						<div class="clear vcard copyright alignright">
							<?php get_sidebar( 'rt-footer' ); ?>
					    </div><!-- .vcard .copyright -->
					</div>
				</div><!-- width100pad -->
			</footer>
		</div><!-- width100pad -->
		<?php wp_footer(); ?>
	</body>
</html>