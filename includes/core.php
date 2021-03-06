<?php
/**
 * Core setup, site hooks and filters.
 *
 * @package ThemeScaffold\Core
 */

namespace EatsTheme\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme', $n( 'i18n' ) );
	add_action( 'after_setup_theme', $n( 'theme_setup' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );

	add_filter( 'script_loader_tag', $n( 'script_loader_tag' ), 10, 2 );
}

/**
 * Makes Theme available for translation.
 *
 * Translations can be added to the /languages directory.
 * If you're building a theme based on "eats-theme", change the
 * filename of '/languages/EatsTheme.pot' to the name of your project.
 *
 * @return void
 */
function i18n() {
	load_theme_textdomain( 'eats-theme', EATS_THEME_PATH . '/languages' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function theme_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
		)
	);

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'tenup' ),
		)
	);
}

/**
 * Enqueue scripts for front-end.
 *
 * @return void
 */
function scripts() {

	wp_enqueue_script(
		'frontend',
		EATS_THEME_TEMPLATE_URL . '/dist/js/frontend.min.js',
		[ 'jquery' ],
		EATS_THEME_VERSION,
		true
	);

	wp_enqueue_script( 'google-fonts', 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js', false, '1.0', true );
	wp_add_inline_script(
		'google-fonts',
		'WebFont.load({
			google: {
				families: [
					"Raleway:400",
				]
			}
		});'
	);

}

/**
 * Enqueue styles for front-end.
 *
 * @return void
 */
function styles() {

	wp_enqueue_style(
		'styles',
		EATS_THEME_TEMPLATE_URL . '/dist/css/style.min.css',
		[],
		EATS_THEME_VERSION
	);

	if ( is_page_template( 'templates/page-styleguide.php' ) ) {
		wp_enqueue_style(
			'styleguide',
			EATS_THEME_TEMPLATE_URL . '/dist/css/styleguide.min.css',
			[],
			EATS_THEME_VERSION
		);
	}
}

/**
 * Add async/defer attributes to enqueued scripts that have the specified script_execution flag.
 *
 * @link https://core.trac.wordpress.org/ticket/12009
 * @param string $tag    The script tag.
 * @param string $handle The script handle.
 * @return string
 */
function script_loader_tag( $tag, $handle ) {
	$script_execution = wp_scripts()->get_data( $handle, 'script_execution' );

	if ( ! $script_execution ) {
		return $tag;
	}

	if ( 'async' !== $script_execution && 'defer' !== $script_execution ) {
		return $tag; // _doing_it_wrong()?
	}

	// Abort adding async/defer for scripts that have this script as a dependency. _doing_it_wrong()?
	foreach ( wp_scripts()->registered as $script ) {
		if ( in_array( $handle, $script->deps, true ) ) {
			return $tag;
		}
	}

	// Add the attribute if it hasn't already been added.
	if ( ! preg_match( ":\s$script_execution(=|>|\s):", $tag ) ) {
		$tag = preg_replace( ':(?=></script>):', " $script_execution", $tag, 1 );
	}

	return $tag;
}
