<?php
/*
Plugin Name: 404 Suggested Page
Plugin URI: https://github.com/MomandWiar/404-suggested-page
description: This plugin gives you a published page suggestion when matches with permalinks are not found.
Version: 1.0
Author: Momand Wiar
Author URI: https://github.com/momandwiar
License: GPLv2 or later
*/

/*
404 Suggested Page is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

404 Suggested Page is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with 404 Suggested Page. If not, see https://www.gnu.org/licenses/gpl-3.0.html.
*/

/**
 * Method get_the_suggested_page
 *
 * Returns a suggested published page object
 * for the current request URI.
 *
 * @return WP_Post
 */
function get_the_suggested_page(): WP_Post {
    $publishedPages = get_pages( 'post_status=publish' );
    $currentUri = filter_input( INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL );

    if ( !$currentUri || !preg_match( "/^[a-z0-9\-\/]+$/i", $currentUri ) ) {
        return $publishedPages[0];
    }

    $shortestOffset = -1;
    foreach ( $publishedPages as $page ) {
        $offset = levenshtein( $currentUri, sanitize_title( $page->post_name ) );

        if ( $offset == 0 ) {
            return $page;
        }

        if ( $offset <= $shortestOffset || $shortestOffset < 0 ) {
            $suggestedPage = $page;
            $shortestOffset = $offset;
        }
    }

    return $suggestedPage;
}

?>
