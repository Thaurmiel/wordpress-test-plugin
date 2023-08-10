<?php

/** 
 * @package testPlugin
 */

defined('WP_UNINSTALL_PLUGIN') or die;


// clear DB

$books = get_posts(array('post_type' => 'book', 'numberposts' => -1));

foreach ($books as $book) {
    wp_delete_post($book->ID, false);
}
