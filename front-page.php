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


add_filter( 'genesis_site_title_wrap', __NAMESPACE__ . '\filter_front_page_site_title_wrap');
/**
 * Wrap the site title on the front page in h1 tags
 *
 * @return string
 */
function filter_front_page_site_title_wrap() {
	return 'h1';
}

add_filter( 'genesis_attr_site-header', __NAMESPACE__ . '\change_site_header_classes' );
/**
 * Add the class 'front-page' to the site-header class list
 *
 * @param $attributes
 *
 * @return mixed
 */
function change_site_header_classes( $attributes ) {
	$attributes['class'] .= ' front-page';
	return $attributes;
}


add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );
/**
 * Add front page body class to the head
 * @param $classes
 *
 * @return array
 */
function add_body_class( $classes ) {

	$classes[] = 'front-page';
	return $classes;

}

// Add the site description
add_action( 'genesis_site_description', 'genesis_seo_site_description' );

add_filter( 'genesis_seo_description', __NAMESPACE__ . '\change_site_description_markup' );
/**
 * Take the site description and break into three list items in an unordered list to be displayed beneath the title
 *
 * @return string
 */
function change_site_description_markup() {
	$site_description = get_bloginfo( 'description' );
	$description_array = explode( ', ', $site_description );
	$html .= '<ul class="site-description" itemprop="description">';
	foreach($description_array as $description) {
		$html .= '<li>' . $description . '</li>';
	}
	$html .= '</ul>';
	return $html;
}

// Remove the post title
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

//remove_action( 'genesis_header', 'genesis_do_nav', 12 );
//add_action( 'genesis_after_header', 'genesis_do_nav' );

genesis();