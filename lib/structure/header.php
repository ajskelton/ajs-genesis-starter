<?php
/**
 * Header HTML markup structure
 *
 * @package   AnthonySkeltonTheme
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace AnthonySkeltonTheme;

/**
 * Unregister header callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_header_callbacks() {
	remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
}

add_filter( 'genesis_seo_title', __NAMESPACE__ . '\filter_front_page_site_title_html');
/**
 * Adds a site-logo span before the site title
 *
 * @param $html
 *
 * @return mixed
 */
function filter_front_page_site_title_html( $html ) {
	$site_name = get_bloginfo( 'name' );
	$new_html = 'Anthony<span>Skelton</span>';
	$html = str_replace( $site_name, $new_html, $html );

	return $html;
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