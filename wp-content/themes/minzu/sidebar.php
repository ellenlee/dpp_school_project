<?php 
	$j2theme_options = get_option( 'j2theme_option' ); 
	if( $_POST['newsletter-signup'] ) wp_mail( $j2theme_options['newsletter_email'], 'newsletter signup', $_POST['newsletter-signup'] ); 
?>
			<aside class="narcolrt alignleft">
				<div class="important clearfix">
					<h3 class="osc text-shad txttranup">Subscribe to the Newsletter</h3>
					<form id="newsletter-signup" action="#" method="post">
						<input id="newsletter-signup" name="newsletter-signup" type="text" value="email" class="alignleft italic">
						<input id="submit" name="submit" type="submit" value="submit" class="txttranup alignleft osc-cond text-shad">
					</form><!-- newsletter signup -->
					<nav class="alignright social">
							<ul>
								<li class="alignleft nobull"><a href="http://twitter.com/professor" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter-lg.png" alt="Twitter Icon" title="<?php bloginfo( 'title' ); ?> on Twitter"></a></li>
								<li class="alignleft nobull"><a href="https://www.facebook.com/wordpressandweb" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook-lg.png" alt="Facebook Icon" title="<?php bloginfo( 'title' ); ?> on Facebook"></a></li>
								<li class="alignleft nobull"><a href="<?php bloginfo( 'rss2_url' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/rss-lg.png" alt="<?php bloginfo( 'title' ); ?> RSS Icon" title="Subscribe to <?php bloginfo( 'title' ); ?>"></a></li>

				</ul>
						</nav><!-- .social -->
				</div><!-- .important -->
				<?php dynamic_sidebar ( 'Aside' ); ?>
			</aside><!-- aside (sidebar) -->
				