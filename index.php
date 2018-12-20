<?php
/**
 * The main template file
 *
 * @package ThemeScaffold
 */

get_header(); ?>

	<?php page_container_start(); ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'partials/post', 'card' ); ?>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php page_container_end(); ?>

<?php
get_footer();
