<?php
/**
 * Setup the child theme
 *
 * @package   AnthonySkeltonTheme
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace AnthonySkeltonTheme;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme' );
/**
 * Setup Child Theme
 *
 * @since   1.0.0
 *
 * @return  void
 */
function setup_child_theme() {
	load_child_theme_textdomain( CHILD_TEXT_DOMAIN, apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/languages', CHILD_TEXT_DOMAIN ) );

	unregister_genesis_callbacks();

	adds_theme_supports();
	adds_new_image_sizes();

}

/**
 * Unregister Genesis callbacks. We do this here because the child theme loads before Genesis
 *
 * @since   1.0.0
 *
 * @return  void
 */
function unregister_genesis_callbacks() {
	unregister_menu_callbacks();
	unregister_header_callbacks();
	unregister_post_callbacks();
}

/**
 * Add theme supports to the site
 *
 * @since   1.0.0
 *
 * @return  null
 */
function adds_theme_supports() {

	//* Add HTML5 markup structure
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );

	//* Add support for genesis accessibility
	add_theme_support( 'genesis-accessibility', array(
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links'
	) );

	//* Add viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );

	//* Add support for custom header
	add_theme_support( 'custom-header', array(
		'width'           => 600,
		'height'          => 114,
		'header-selector' => '.site-title a',
		'header-text'     => false,
		'flex-height'     => true,
	) );

	//* Add support for custom background
	add_theme_support( 'custom-background' );

	//* Add support for after content widget area
	add_theme_support( 'genesis-after-content-widget-area' );

	//* Add support for 3-column footer widgets
	add_theme_support( 'genesis-footer-widgets', 3 );

	add_theme_support( 'genesis-menus', array(
		'primary'   => __( 'After Header Menu', CHILD_TEXT_DOMAIN ),
		'secondary' => __( 'Footer Menu', CHILD_TEXT_DOMAIN )
	) );

	return;
}

/**
 * Adds new image sizes.
 *
 * @since   1.0.0
 *
 * @return  void;
 */
function adds_new_image_sizes() {
	$config = array(
		'featured-image' => array(
			'width' => 720,
			'height' => 400,
			'crop' => true,
		)
	);

	foreach( $config as $name => $args) {
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;

		add_image_size( $name, $args['width'], $args['height'], $args['crop'] );
	}
}
