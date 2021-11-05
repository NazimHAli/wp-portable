<?php
/**
 * Functions which enhance security
 *
 * @package Theme_Name
 */

/**
 * Enforce REST API authentication
 */
add_filter(
	'rest_authentication_errors',
	function ( $result ) {
		if ( ! empty( $result ) ) {
			return $result;
		}
		if ( ! is_user_logged_in() ) {
			return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
		}
		return $result;
	}
);
