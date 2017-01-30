<?php
/**
 * @package Inkness
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php if (has_post_thumbnail() ) : ?>
		<div class="featured-image-single">
			<?php
				the_post_thumbnail();
				?>
		</div>
		<?php endif; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'inkness' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-meta">

		<?php edit_post_link( __( 'Edit', 'inkness' ), '<span class="edit-link">', '</span>' ); ?>
		<br>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
