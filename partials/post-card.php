<?php
/**
 * Post card template.
 *
 * @package EatsTheme
 */

use EatsTheme\SVG;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<a href="<?php the_permalink(); ?>" class="post-card__image-link" tabindex="-1" aria-hidden="true">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} else {
			?>
			<div class="post-card__image-fallback">
				<?php SVG\icon( 'logo' ); ?>
			</div>
			<?php
		}
		?>
	</a>

	<div class="post-card__content">
		<time class="post-card__date"><?php the_date( 'F j, Y' ); ?></time>

		<h2 class="post-card__title">
			<a href="<?php the_permalink(); ?>" class="post-card__title-link" rel="bookmark">
				<span class="screen-reader-text"><?php esc_html_e( 'Read More on: ', 'eats-theme' ); ?></span>
				<?php the_title(); ?>
			</a>
		</h2>

		<p class="post-card__excerpt">
			<?php post_excerpt(); ?>
		</p>

		<a href="<?php the_permalink(); ?>" class="post-card__more-link" tabindex="-1" aria-hidden="true">
			<?php esc_html_e( 'Read More', 'eats-theme' ); ?>
			<?php SVG\icon( 'chevron-right' ); ?>
		</a>
	</div>

</article>
