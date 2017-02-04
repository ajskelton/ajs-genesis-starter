<?php
/**
 * Menu HTML markup structure
 *
 * @package   AjsGenesisStarter
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace AjsGenesisStarter;

/**
 * Unregister menu callbacks
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_menu_callbacks() {
	// Remove the sub navigation
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );
}