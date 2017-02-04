<?php
/**
 * Post HTML markup structure
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
function unregister_post_callbacks() {
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
}

add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\setup_author_box_gravatar_size' );
/**
 * Modify size of the Gravatar in the author box.
 *
 * @since 1.0.0
 *
 * @param $size
 *
 * @return int
 */
function setup_author_box_gravatar_size( $size ) {

	return 90;

}