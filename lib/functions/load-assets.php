<?php
/**
 * Description
 *
 * @package   AnthonySkeltonTheme
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace AnthonySkeltonTheme;

//* Enqueue Scripts and Styles
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue Scripts and Styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_assets() {

//	wp_enqueue_style( CHILD_TEXT_DOMAIN . '-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );
//	wp_enqueue_script( 'font-awesome-css', 'https://use.fontawesome.com/01f5cdf88f.js', array(), '4.6.1' );
	wp_enqueue_script( CHILD_TEXT_DOMAIN . '-prism', CHILD_URL . '/assets/js/prism.js', array(), CHILD_THEME_VERSION, true );
	wp_enqueue_script( CHILD_TEXT_DOMAIN . '-responsive-menu', CHILD_URL . '/assets/js/responsive-menu.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	$localized_script_args = array(
		'mainMenu' => __( 'Menu', CHILD_TEXT_DOMAIN ),
		'subMenu'  => __( 'Menu', CHILD_TEXT_DOMAIN ),
	);
	wp_localize_script( CHILD_TEXT_DOMAIN . '-responsive-menu', 'AjsStarterThemeL10n', $localized_script_args );

}