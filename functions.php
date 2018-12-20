<?php
/**
 * WP Theme constants and setup functions
 *
 * @package ThemeScaffold
 */

// Useful global constants.
define( 'EATS_THEME_VERSION', '0.1.0' );
define( 'EATS_THEME_TEMPLATE_URL', get_template_directory_uri() );
define( 'EATS_THEME_PATH', get_template_directory() . '/' );
define( 'EATS_THEME_INC', EATS_THEME_PATH . 'includes/' );

require_once EATS_THEME_INC . 'core.php';
require_once EATS_THEME_INC . 'template-tags.php';
require_once EATS_THEME_INC . 'svg.php';

// Run the setup functions.
EatsTheme\Core\setup();

// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}
