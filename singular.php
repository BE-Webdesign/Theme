<?php
/**
 * The single view template file
 *
 * @package ThemeScaffold
 */

get_header(); ?>

	<?php page_container_start(); ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php page_container_end(); ?>

<?php
get_footer();
