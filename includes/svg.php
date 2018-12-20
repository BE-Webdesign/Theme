<?php
/**
 * SVG Icon loading functionality.
 *
 * @package TrialTheme
 */

namespace TrialTheme\SVG;

/**
 * Output SVG icon HTML for use in a page.
 *
 * @param string $name        Name of the icon to display. Must be one of the options from `all_icons`.
 * @param string $color       Optional. Color of the icon. Defaults to black.
 * @param string $description Optional. Description to put in title field.
 * @param array  $classes     Optional. Classes to add to output.
 */
function icon( string $name, string $color = 'black', string $description = null, array $classes = [] ) {
	$all_icons = all_icons();

	// We must be fetching a valid icon.
	if ( ! array_key_exists( $name, $all_icons ) ) {
		return;
	}

	$classes = array_merge(
		[
			'icon',
			'icon--' . $name,
		],
		$classes
	);

	// Only add color class if we're dealing with a b/w icon.
	if ( strpos( $name, '-color' ) === false ) {
		$classes[] = 'icon--' . $color;
	}

	$icon_output = $all_icons[ $name ];

	$view_box = '0 0 20 20';

	if ( 'logo' === $name ) {
		$view_box = '0 0 86 66';
	}

	?>
	<svg class="<?php echo esc_attr( join( ' ', $classes ) ); ?>" aria-hidden="true" viewBox="<?php echo esc_attr( $view_box ); ?>" version="1.1">
		<title><?php echo esc_html( $description ?: $name ); ?></title>
		<?php echo $icon_output; // WPCS: XSS ok. ?>
	</svg>
	<?php
}

/**
 * Get and return output for an SVG icon.
 *
 * @param string $name        Name of the icon to display. Must be one of the options from `all_icons`.
 * @param string $color       Optional. Color of the icon. Defaults to black.
 * @param string $description Optional. Description to put in title field.
 * @param array  $classes     Optional. Classes to add to output.
 * @return false|string
 */
function get_icon( string $name, string $color = 'black', string $description = null, array $classes = [] ) {
	ob_start();
	icon( $name, $color, $description, $classes );
	return ob_get_clean();
}

/**
 * Storage list of all icons available within the theme.
 *
 * @return array
 */
function all_icons() {
	return [
		'menu' => '<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>',
		'chevron-right' => '<path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/>',
		'close' => '<path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>',
		'logo' => '<g><path d="M7.167 29.432h71.666a4.345 4.345 0 0 0 3.225-1.427c.807-.891 1.165-2.14.986-3.389C80.714 10.792 63.514.356 43 .356 22.485.357 5.285 10.793 3.046 24.528c-.18 1.249.179 2.408.985 3.39.717.98 1.881 1.515 3.136 1.515zm-.627-4.28C8.51 13.021 24.188 3.923 43 3.923c18.813 0 34.49 9.098 36.46 21.227 0 .268-.09.446-.179.535 0 0-.179.179-.448.179H7.167c-.27 0-.359-.09-.448-.179-.09-.089-.18-.267-.18-.535zM79.64 49.41c.716-.891 1.164-2.05 1.164-3.21v-2.051c0-2.944-2.329-5.263-5.285-5.263H10.302c-2.956 0-5.285 2.32-5.285 5.263V46.2c0 1.249.448 2.319 1.164 3.21-1.97 1.517-3.314 3.925-3.314 6.6v1.428c0 4.46 3.583 8.116 7.883 8.116h64.32c4.39 0 7.884-3.657 7.884-8.116V56.01c0-2.676-1.344-5.084-3.314-6.6zm-69.338-1.515A1.697 1.697 0 0 1 8.6 46.2v-2.051c0-.981.806-1.695 1.702-1.695H75.52c.985 0 1.702.803 1.702 1.695V46.2c0 .981-.806 1.695-1.702 1.695h-.359-30.547a4.997 4.997 0 0 0-5.017 4.994v4.103a.801.801 0 0 1-.806.803.801.801 0 0 1-.807-.803v-4.103a4.997 4.997 0 0 0-5.016-4.994h-1.165c-2.419 0-4.39 1.962-4.39 4.37v.98c0 1.339-1.164 2.498-2.508 2.498s-2.508-1.16-2.508-2.497v-.981c0-2.408-1.971-4.37-4.39-4.37H10.84h-.538zm69.069 9.543c0 2.497-1.971 4.548-4.3 4.548H10.75c-2.419 0-4.3-2.05-4.3-4.548V56.01c0-2.497 1.881-4.549 4.3-4.549h7.167c.448 0 .806.357.806.803v.98c0 3.3 2.687 6.066 6.092 6.066 3.404 0 6.091-2.676 6.091-6.065v-.981c0-.446.359-.803.806-.803h1.165c.806 0 1.433.624 1.433 1.427v4.103c0 2.408 1.971 4.37 4.39 4.37 2.419 0 4.39-1.962 4.39-4.37v-4.103c0-.803.627-1.427 1.433-1.427H75.07c2.329 0 4.3 2.052 4.3 4.549v1.427zM84.835 31.573c-1.075-1.07-2.418-1.605-3.852-1.605-1.433 0-2.866.535-3.852 1.605l-2.598 2.586c-.716.714-1.97.714-2.687 0l-2.688-2.675c-1.075-1.07-2.418-1.606-3.852-1.606-1.433 0-2.866.536-3.852 1.606l-2.508 2.497c-.717.714-1.971.714-2.688 0l-2.508-2.408c-2.15-2.14-5.644-2.14-7.704 0l-2.598 2.586c-.717.714-1.97.714-2.688 0l-2.597-2.586c-2.15-2.14-5.644-2.14-7.705 0l-2.329 2.319c-.716.713-1.97.713-2.687 0L23.47 31.93c-1.075-1.07-2.419-1.606-3.852-1.606-1.434 0-2.867.535-3.852 1.606l-1.971 1.962c-.717.713-1.971.713-2.688 0l-2.15-1.962c-2.15-2.14-5.643-2.14-7.704 0-.717.713-.717 1.784 0 2.497.717.714 1.792.714 2.509 0 .716-.713 1.97-.713 2.687 0l2.06 2.051c1.075 1.07 2.42 1.606 3.853 1.606 1.433 0 2.866-.535 3.852-1.606l1.97-1.962c.717-.713 1.971-.713 2.688 0l1.97 1.962c1.076 1.07 2.42 1.606 3.853 1.606 1.433 0 2.866-.535 3.852-1.606l2.33-2.319c.716-.713 1.97-.713 2.687 0l2.598 2.587c1.075 1.07 2.418 1.605 3.852 1.605 1.433 0 2.866-.535 3.852-1.605l2.598-2.587c.716-.713 1.97-.713 2.687 0l2.508 2.498c1.075 1.07 2.42 1.605 3.853 1.605 1.433 0 2.866-.535 3.852-1.605l2.508-2.498c.717-.713 1.97-.713 2.687 0l2.688 2.676a5.52 5.52 0 0 0 3.852 1.606c1.433 0 2.777-.536 3.852-1.606l2.598-2.586c.717-.714 1.97-.714 2.688 0 .716.713 1.791.713 2.508 0 .717-.714.717-1.963.09-2.676z"/><path d="M17.38 19.443c.537 0 1.074-.267 1.343-.624l1.254-1.516c.627-.803.538-1.873-.269-2.498-.806-.624-1.88-.535-2.508.268l-1.254 1.516c-.627.803-.538 1.873.269 2.497.358.268.716.357 1.164.357zM26.785 22.119c.359.446.896.624 1.344.624.448 0 .806-.178 1.165-.446.716-.624.896-1.783.268-2.497l-.895-1.07c-.627-.714-1.792-.892-2.509-.268-.716.624-.896 1.784-.268 2.497l.895 1.16zM28.756 12.486c.359.536.896.892 1.523.892.269 0 .627-.089.896-.267.896-.535 1.165-1.606.627-2.408l-.896-1.606c-.537-.892-1.612-1.16-2.418-.624-.896.535-1.165 1.605-.628 2.408l.896 1.605zM38.88 20.157c.357.446.895.713 1.432.713.359 0 .717-.089 1.076-.356.806-.625.985-1.695.358-2.498L40.67 16.59c-.627-.803-1.702-.98-2.508-.357-.807.625-.986 1.695-.359 2.498l1.075 1.427zM40.223 11.416c.18.09.448.09.627.09.717 0 1.433-.447 1.702-1.16l.717-1.784c.358-.892-.09-1.962-1.075-2.319-.896-.357-1.971.09-2.33 1.07l-.716 1.784c-.269.981.18 1.962 1.075 2.32zM50.435 23.724c.359 0 .627-.089.986-.267l1.523-.981c.806-.535 1.075-1.606.537-2.498-.537-.802-1.612-1.07-2.508-.535l-1.523.981c-.806.535-1.075 1.606-.538 2.498.359.446.986.802 1.523.802zM50.883 12.665c.27.09.448.178.717.178.717 0 1.344-.357 1.612-1.07l.896-1.873c.448-.892 0-1.962-.895-2.319-.896-.446-1.971 0-2.33.892l-.896 1.873c-.447.803 0 1.873.896 2.319zM60.11 17.927c.359.446.896.714 1.434.714.358 0 .716-.09 1.075-.357.806-.625.985-1.695.358-2.498l-1.075-1.427c-.627-.802-1.702-.98-2.508-.356s-.986 1.694-.359 2.497l1.075 1.427zM70.054 21.94c.18.09.358.09.538.09.806 0 1.523-.535 1.702-1.249l.716-2.408c.27-.981-.268-1.962-1.254-2.23-.985-.267-1.97.268-2.24 1.249L68.8 19.8c-.269.892.269 1.873 1.254 2.14z"/></g>',
		'search' => '<path d="M12.9 14.32a7.947 7.947 0 0 1-4.908 1.682 8 8 0 1 1 6.305-3.075l.013-.018 5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 1 0 0 12z"/>',
	];
}

/**
 * Testing/pattern lab quick output.
 */
function test_icon_display() {
	$all_icons = all_icons();

	$color_options = [ 'black', 'grey', 'white', 'blue', 'pink' ];
	$random_color  = $color_options[ rand( 0, ( count( $color_options ) - 1 ) ) ];

	?>
	<table class="test-icons">
		<thead>
		<tr>
			<th>Name</th>
			<th>Icon</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ( $all_icons as $name => $output ) : ?>
			<tr>
				<td><?php echo $name; ?></td>
				<td><?php echo icon( $name, $random_color ); ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php
}
