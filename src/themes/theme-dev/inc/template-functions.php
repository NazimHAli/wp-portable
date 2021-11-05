<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Theme_Name
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function theme_slug_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'theme_slug_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function theme_slug_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'theme_slug_pingback_header' );

/**
 * Modify the default read more link HTML & text
 *
 * @link https://developer.wordpress.org/reference/hooks/the_content_more_link/
 */
function modify_read_more_link() {
	return '<a class="hoverable waves-effect waves-light btn-large white" href="' . get_permalink() . '">Read More <i class="material-icons right">send</i></a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/**
 * Construct numbered pagination for blog posts
 *
 * @return HTML
 */
function blog_posts_pagination( $totalAvailablePages = '', $range = 2 ) {

	$numItemsPerPage = $range;
	global $paged;
	$currentPage       = $paged;
	$disableLeftArrow  = true;
	$disableRightArrow = true;

	if ( empty( $currentPage ) ) {
		$currentPage = 1;
	}
	if ( $totalAvailablePages == '' ) {
		global $wp_query;
		$totalAvailablePages = $wp_query->max_num_pages;
		if ( ! $totalAvailablePages ) {
			$totalAvailablePages = 1;
		}
	}
	if ( 1 != $totalAvailablePages ) {
		echo "<ul class='pagination'>";

		// Left arrow
		if ( $currentPage > 1 && $totalAvailablePages > 1 ) {
			$disableLeftArrow = false;
		}

		echo "<li class='" . ( $disableLeftArrow === true ? 'disabled' : 'waves-effect' ) . "'>";
		echo '<a href=' . ( $disableLeftArrow === true ? '#' : get_pagenum_link( $currentPage - 1 ) ) . '>';
		echo "<i class='material-icons'>chevron_left</i>";
		echo '</a></li>';

		for ( $i = 1; $i <= $totalAvailablePages; $i++ ) {
			if ( 1 != $totalAvailablePages && ( ! ( $i >= $currentPage + $range + 1 || $i <= $currentPage - $range - 1 ) || $totalAvailablePages <= $numItemsPerPage ) ) {
				echo ( $currentPage == $i ) ? "<li class=\"active\"><a class='waves-effect'>" . $i . '</a></li>' : "<li class='replaceLiClass'> <a href='" . get_pagenum_link( $i ) . "' class=\"waves-effect\">" . $i . '</a></li>';
			}
		}

		// Right arrow
		if ( $currentPage < $totalAvailablePages && $totalAvailablePages > 1 ) {
			$disableRightArrow = false;
		}

		echo "<li class='" . ( $disableRightArrow === true ? 'disabled' : 'waves-effect' ) . "'>";
		echo '<a href=' . ( $disableRightArrow === true ? '#' : get_pagenum_link( $currentPage + 1 ) ) . '>';
		echo "<i class='material-icons'>chevron_right</i>";
		echo '</a></li>';

		echo '</ul>';

		echo '<h4> $currentPage = ' . $currentPage . '</h4>';
		echo '<h4> $totalAvailablePages = ' . $totalAvailablePages . '</h4>';
		echo '<h4> $numItemsPerPage = ' . $numItemsPerPage . '</h4>';
	}
}

