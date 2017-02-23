<?php
/**
 * Content HTML markup structure
 *
 * @package   AnthonySkeltonTheme
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace AnthonySkeltonTheme;

/**
 * Unregister content callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_content_callbacks() {
}

function load_before_genesis() {
	add_action( 'genesis_attr_body', __NAMESPACE__ . '\add_page_slug_class' );
}
/**
 * Adds the custom taxonomy term to the body class
 *
 * @since 1.0.0
 *
 * @param array $attributes
 *
 * @return array
 */
function add_page_slug_class( array $attributes ) {
	global $post;
	$post_slug = $post->post_name;
	$attributes['class'] .= ' ' . $post_slug;

	return $attributes;
}