<?php
/**
 * Single page template for Plugin Projects-Portfolio
 *
 * @package   AnthonySkeltonTheme
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace AnthonySkeltonTheme;

// Remove the header section with title and post info
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_entry_content', 'genesis_do_post_title', 7 );



// Only add featured image to projects with category photography
if( 'photography' == get_page_terms()[0]->slug ) :
	add_action( 'genesis_entry_content', __NAMESPACE__ . '\display_featured_image', 6 );
endif;
/**
 * Print the Featured Image to the Entry Content
 *
 * @since 1.0.0
 *
 * @return void
 */
function display_featured_image() {

	$img = genesis_get_image( array(
		'format'  => 'html',
		'size'    => 'full',
		'context' => 'archive',
		'attr'    => genesis_parse_attr( 'content-image', array( 'alt' => get_the_title() ) ),
	) );

	print( $img );
}

add_action( 'genesis_attr_body', __NAMESPACE__ . '\add_project_taxonomy_class' );
/**
 * Adds the custom taxonomy term to the body class
 *
 * @since 1.0.0
 *
 * @param array $attributes
 *
 * @return array
 */
function add_project_taxonomy_class( array $attributes ) {
	if( is_single() ) {
		$terms = get_page_terms();
			if ( $terms && ! is_wp_error( $terms ) ) {
			foreach( $terms as $term ) {
				$attributes['class'] .= ' ' . $term->slug;
			}
		}
	}
	return $attributes;
}

/**
 * Gets the terms of the current page
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_page_terms() {
	global $post;
	$terms = get_the_terms( $post->ID, 'project-category' );
	return $terms;
}

genesis();

