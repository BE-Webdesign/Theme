<?php
/**
 * The template for displaying the header.
 *
 * @package ThemeScaffold
 */

use EatsTheme\SVG;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'eats-theme' ); ?></a>

		<?php do_action( 'after_body' ); ?>
		<header id="masthead" class="site-header">
			<div class="site-header__top-bar">
				<div class="site-header__container container">
					<button class="site-header__menu-toggle" id="site-header__menu-toggle">
						<?php SVG\icon( 'menu' ); ?>
						<?php SVG\icon( 'close' ); ?>
						<span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation menu', 'eats-theme' ); ?></span>
					</button>
					<a class="site-header__logo" href="<?php echo esc_url( home_url() ); ?>">
						<?php SVG\icon( 'logo' ); ?>
						<span class="screen-reader-text"><?php esc_html_e( 'Go to homepage', 'eats-theme' ); ?></span>
						<span class="site-header__logo-text"><?php esc_html_e( 'Eats.', 'eats-theme' ); ?></span>
					</a>
					<div class="site-header__search-container">
						<button class="site-header__search-toggle" id="site-header__search-toggle">
							<?php SVG\icon( 'search' ); ?>
							<?php SVG\icon( 'close' ); ?>
							<span class="screen-reader-text"><?php esc_html_e( 'Toggle search field', 'eats-theme' ); ?></span>
						</button>
					</div>
				</div>
			</div>
			<form action="<?php echo esc_url( home_url() ); ?>" class="site-header__search-form" id="site-header__search-form">
				<label class="screen-reader-text" for="site-header__search-input"><?php esc_html_e( 'Enter a search query', 'eats-theme' ); ?></label>
				<input id="site-header__search-input"
					class="site-header__search-input"
					type="search"
					name="s"
					placeholder="<?php esc_attr_e( 'e.g. delicious sandwiches', 'eats-theme' ); ?>"
					value="<?php echo esc_attr( get_search_query() ); ?>" />
				<button id="site-header__search-submit" class="site-header__search-submit">
					<?php SVG\icon( 'search' ); ?>
					<span class="screen-reader-text"><?php esc_html_e( 'Submit search query', 'eats-theme' ); ?></span>
				</button>
			</form>
			<nav id="primary-nav" class="primary-nav" aria-label="Primary Navigation" tabindex="-1">
					<?php
					wp_nav_menu(
						[
							'location'   => 'primary',
							'menu_class' => 'menu container',
						]
					);
					?>
			</nav>
		</header>
