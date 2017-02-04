<?php
/**
 * Header HTML markup structure
 *
 * @package   AjsGenesisStarter
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace AjsGenesisStarter;

/**
 * Unregister header callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_header_callbacks() {

}

//add_action( 'genesis_before_header', __NAMESPACE__ . '\render_utility_bar' );
/**
 * Render the Utility Bar out to the browser
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_utility_bar() {
	genesis_widget_area(
		'utility-bar',
		array(
			'before' => '<div class="utility-bar"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}