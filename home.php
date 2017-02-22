<?php
/**
 * Page Layout for the Blog Index
 *
 * @package   AnthonySkeltonTheme
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace AnthonySkeltonTheme;

//* Add a class to the paragraph holding the Genesis post content limit
add_filter( 'the_content_limit', __NAMESPACE__ . '\add_class_to_the_content_limit' );
function add_class_to_the_content_limit( $the_content_limit ) {
	return str_replace('<p', '<p class="excerpt"', $the_content_limit);
}

//* Modify the Genesis content limit read more link
add_filter( 'get_the_content_more_link', __NAMESPACE__ . '\read_more_link' );
function read_more_link() {
	return '... <a class="more-link" href="' . get_permalink() . '">[Continue Reading]</a>';
}

//* Move the posts navigation outside of the main
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
add_action( 'genesis_after_content', 'genesis_posts_nav' );

//* Add the post info below the entry title
add_action( 'genesis_entry_header', 'genesis_post_info', 12 );

//* Customize the entry meta in the entry header
add_filter( 'genesis_post_info', __NAMESPACE__ . '\post_info_filter' );
function post_info_filter( $post_info ) {
	$post_info = '[post_date] by [post_author_posts_link] [post_edit]';
	return $post_info;
}

// Start the Engine
genesis();