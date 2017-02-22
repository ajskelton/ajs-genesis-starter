<?php
/**
 * The Single Post Page Template
 *
 * @package   AnthonySkeltonTheme
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace AnthonySkeltonTheme;

//add_action( 'genesis_entry_content', 'genesis_do_post_image', 11 );

add_action( 'genesis_entry_header', __NAMESPACE__ . '\featured_post_image', 8 );
function featured_post_image() {
	if ( ! is_singular( 'post' ) )  return;
	the_post_thumbnail('full');
}

//* Add the post info below the entry title
add_action( 'genesis_entry_header', 'genesis_post_info', 12 );

//* Customize the entry meta in the entry header
add_filter( 'genesis_post_info', __NAMESPACE__ . '\post_info_filter' );
function post_info_filter( $post_info ) {
	$post_info = '[post_date] by [post_author_posts_link] [post_edit]';
	return $post_info;
}
add_action( 'genesis_after_entry', 'genesis_prev_next_post_nav', 8 );
add_action( 'genesis_after_entry', 'genesis_adjacent_entry_nav', 10 );

//add_action( 'genesis_after_entry', __NAMESPACE__ . '\do_genesis_prev_next_post_nav', 10 );
//function do_genesis_prev_next_post_nav(){
//	genesis_prev_next_post_nav();
//}

//remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

// Start the Engine
genesis();