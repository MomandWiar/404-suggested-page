<?php
/*
Plugin Name: 404 Suggested Page
Plugin URI: https://github.com/MomandWiar/not-found-plugin
description: This plugin gives you a published page suggestion when matches are not found.
Version: 1.0
Author: Momand Wiar
Author URI: https://github.com/momandwiar
License: GPL
*/

function get_the_suggested_page() {
    $publishedPages = get_pages( 'post_status=publish' );
    $currentUri = $_SERVER['REQUEST_URI'];

    $shortestOffset = -1;

    foreach ($publishedPages as $page) {
        $offset = levenshtein($currentUri, $page->post_name);

        if ($offset == 0) {
            $suggestedPage = $page;
            break;
        }

        if ($offset <= $shortestOffset || $shortestOffset < 0) {
            $suggestedPage = $page;
            $shortestOffset = $offset;
        }
    }

    return $suggestedPage;
}

?>