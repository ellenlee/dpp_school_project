<?php
/**
 * @package Inkness
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("homa archive col-md-4"); ?>>
<div class="article-wrapper">
	<?php if (has_post_thumbnail()) : ?>
	<div class="featured-thumb col-md-12 col-xs-12">
	<a href="<?php the_permalink(); ?>">
	<?php
		the_post_thumbnail('homepage-banner');
	?>
	</a>
	</div>
	<?php endif; ?>
	<div class="article-rest col-md-12">
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php inkness_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>
	</div>
	<?php
		$term_list = wp_get_post_terms($post->ID, 'course_status', array("fields" => "names"));
		if ( $term_list[0] ) { ?>
		<div class="course_status">
			<span class="btn btn-warning btn-xs"><?php echo $term_list[0]; ?></span>
		</div>
	<?php	}	?>
</div>

</article><!-- #post-## -->